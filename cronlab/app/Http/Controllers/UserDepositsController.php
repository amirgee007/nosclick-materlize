<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Gateway;
use App\Offline;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Stripe\Charge;
use Stripe\Stripe;
use App\Kyc;
use App\Kyc2;

class UserDepositsController extends Controller
{
    private $_api_context;
    public $user;
    public $result1;
    public $result2;

    public function __construct()
    {
         $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            
            $this->result1= Kyc::whereUser_id($this->user->id)->first();
            $this->result2= Kyc2::whereUser_id($this->user->id)->first();
            
            \View::share([ 'result1' => $this->result1 ,'result2'=> $this->result2]);
            
            return $next($request);
            });
        
        
        $paypal=Gateway::find(1);
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal->val1, $paypal->val2));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }





    public function index()
    {
        $user=Auth::user();

        $deposits= Deposit::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(15);


        return view('user.deposit.index',compact('deposits'));
    }

    public function create()
    {

        $gateways= Gateway::whereStatus(1)->get();

        $local_gateways= Offline::whereStatus(1)->get();

        $user = Auth::user();

        $settings = Settings::first();

        return view('user.deposit.create',compact('gateways','user','settings','local_gateways'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function instantPreview(Request $request)
    {
        $this->validate($request, [

            'gateway' => 'required|numeric|max:200',
            'amount' => 'required|numeric',

        ]);

        $settings = Settings::first();

        if ($settings->minimum_deposit > $request->amount) {

            session()->flash('message', 'Le minimum est de € ' . $settings->minimum_deposit . '  ');
            Session::flash('type', 'error');
            Session::flash('title', 'Minimum Deposit');
            return redirect(route('userDeposit.create'));
        }

        $gateway = Gateway::find($request->gateway);

        $percentage = $gateway->percent;

        $fixed = $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $user = Auth::user();

        $deposit = (object)array(

            'amount' => $request->amount,
            'charge' => $charge,
            'net_amount' => $new_amount,
            'code' => str_random(10),
        );

        $user->d_code = $deposit->code;
        $user->save;


        if ($gateway->name=='Payeer'){
            $payeer = $this->makeParamForPayeer($gateway,$user,$deposit);
            return view('user.deposit.instant_payeer',compact('gateway','user','deposit' ,'payeer'));
        }

        return view('user.deposit.instant', compact('gateway', 'user', 'deposit'));

    }

    public function makeParamForPayeer($gateway,$user,$deposit){

        $payeer = [];
        $payeer['m_shop']   =   config('payeer.m_shop');   //   merchant   ID
        $payeer['m_orderid']   =   $user->d_code;   //   invoice   number   in   the   merchant's   invoicing   system
        $payeer['m_amount']   =   number_format($deposit->amount,   2,   '.',   '');   //   invoice   amount   with   two   decimal   places following   a   period
        $payeer['m_curr']   =   'EUR';   //   invoice   currency
        $payeer['m_desc']   =   base64_encode($user->d_code);   //   invoice   description   encoded   using   a   base64 algorithm
        $m_key   =   config('payeer.m_key');

        //   Forming   an   array   for   signature   generation
        $arHash   =   array( $payeer['m_shop'], $payeer['m_orderid'], $payeer['m_amount'], $payeer['m_curr'], $payeer['m_desc']  );

        //   Adding   the   secret   key   to   the   signature-formation   array
        $arHash[]   =   $m_key;

        //   Forming   a   signature
        $payeer['sign']=   strtoupper(hash('sha256',   implode(':',   $arHash)));

        return $payeer;
    }

    public function paymentPreview(Request $request)
    {
        $this->validate($request, [

            'gateway'=> 'required|numeric|max:200',
            'amount' => 'required|numeric',

        ]);

        $settings = Settings::first();

        if ($settings->minimum_deposit > $request->amount){

            session()->flash('message', 'Le minimum est de  € '.$settings->minimum_deposit.'  ');
            Session::flash('type', 'error');
            Session::flash('title', 'Dépôt minimum');

            return redirect(route('userDeposit.create'));


        }

        $gateway= Offline::find($request->gateway);

        $percentage =  $gateway->percent;

        $fixed =  $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $user=Auth::user();


        $deposit = (object) array(

            'amount'=> $request->amount,
            'charge'=> $charge,
            'net_amount'=> $new_amount,
            'code'=> str_random(10),
        );

        $user->d_code = $deposit->code;
        $user->save;


        return view('user.deposit.preview',compact('gateway','user','deposit'));

    }


    public static function payeerConfirm($data ,$user)
    {

        $gateway = Gateway::find(5);

        $percentage = $gateway->percent;
        $fixed = $gateway->fixed;

        $charge = (($percentage / 100) * $data['m_amount']) + $fixed;

        $new_amount = $data['m_amount'] - $charge;
       $already_done =  Deposit::where('transaction_id' ,$data['m_operation_id'])->first();

        if($already_done){
            return 0;
        }


        $deposit = Deposit::create([
            'transaction_id' => $data['m_operation_id'],
            'user_id' => $user->id,
            'gateway_name' => $gateway->name,
            'amount' => $data['m_amount'],
            'charge' => $charge,
            'net_amount' => $new_amount,
            'status' => 1,
            'details' => 'Dépôt avec Payeer',
        ]);


        $user->profile->deposit_balance = $user->profile->deposit_balance + $new_amount;
        $user->profile->save();

        return $new_amount;

    }


    public function stripeConfirm(Request $request)
    {
        $gateway = Gateway::find(2);

        Stripe::setApiKey($gateway->val2);
        $charge = Charge::create(array(
            "amount" => $request->amount * 100,
            "currency" => 'EUR',
            "description" => "Dépôt par carte TrX ID: ".$request->code."",
            "source" => $request->stripeToken,
        ));

        $user = User::find($request->user_id);

        $percentage = $gateway->percent;
        $fixed = $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $deposit = Deposit::create([

            'transaction_id' => str_random(6) . $user->id . str_random(6),
            'user_id' => $user->id,
            'gateway_name' => $gateway->name,
            'amount' => $request->amount,
            'charge' => $charge,
            'net_amount' => $new_amount,
            'status' => 1,
            'details' => 'Dépôt avec Stripe',

        ]);

        $user->profile->deposit_balance = $user->profile->deposit_balance + $new_amount;
        $user->profile->save();

        session()->flash('message', 'Après déduction des frais de transaction, le montant total de dépôt de € ' . $new_amount . ' a été transférer avec succès. Les fonds sont automatiquement créditer à votre solde. Arpès une vérification de sécurité');
        Session::flash('type', 'success');
        Session::flash('title', 'Votre dépôt');

        return redirect(route('userDashboard'));

    }

    public function postPayment(Request $request)
    {
        $this->validate($request, [

            'gateway'=> 'required|numeric|max:30',
            'amount' => 'required|numeric|',

        ]);

        $settings = Settings::first();

        if ($settings->minimum_deposit > $request->amount){

            session()->flash('message', 'Le minimum est de  € '.$settings->minimum_deposit.' ');
            Session::flash('type', 'error');
            Session::flash('title', 'Dépôt minimum');

            return redirect(route('userDeposit.create'));

        }

        $gateway= Gateway::find($request->gateway);

        if ($gateway->id == 1){

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();
            $item_1->setName('Compte de dépôt')
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setPrice($request->amount);


            // add item to list
            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('EUR')
                ->setTotal($request->amount);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Dépôt du membre');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(route('userDepositPayPal.status'))
                ->setCancelUrl(route('userDeposit.create'));

            $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($this->_api_context);
            } catch (PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    $err_data = json_decode($ex->getData(), true);
                    exit;
                } else {
                    die('Une erreur est apparu. Veuillez essayez à nouveau.');
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            // add payment ID to session
            Session::put('paypal_payment_id', $payment->getId());
            Session::put('total_amount', $request->amount);

            if(isset($redirect_url)) {
                // redirect to paypal
                return Redirect::away($redirect_url);
            }

            session()->flash('message', 'Une erreur inconnue s\'est produite. Veuillez réessayer.');
            Session::flash('type', 'error');
            Session::flash('title', 'Dépôt échoué');
            return redirect()->route('userDeposit.create');

        }

    }

    public function offline(Request $request)
    {

        $this->validate($request, [

            'gateway'=> 'required|numeric|max:30',
            'amount' => 'required|numeric',
            'reference' => 'required|max:50',
        ]);

        $user = Auth::user();
        $gateway= Offline::whereId($request->gateway)->first();

        $percentage =  $gateway->percent;
        $fixed =  $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $deposit= Deposit::create([

            'transaction_id' => $request->reference,
            'user_id'=> $user->id,
            'gateway_name'=> $gateway->name,
            'amount'=> $request->amount,
            'charge'=> $charge,
            'net_amount'=> $new_amount,
            'status'=> 0,
            'details'=>'Aucun détail n\'est fourni',

        ]);


        session()->flash('message', 'Après déduction des frais de transaction, le montant total de dépôt de €'.$new_amount.' a été transférer avec succès. Les fonds sont automatiquement créditer à votre solde. Arpès une vérification de sécurité');
        Session::flash('type', 'success');
        Session::flash('title', 'Demande de dépôt');

        return redirect()->route('userDeposits');

    }

    public function getPaypalStatuscopy(Request $request)
    {

        session()->flash('message', 'Après déduction des frais de transaction, le montant total du dépôt a été transférer avec succès. Les fonds sont automatiquement créditer à votre solde. Après une vérification de sécurité');
        Session::flash('type', 'success');
        Session::flash('title', 'Demande de dépôt');

        return redirect()->route('userDashboard');

    }

    public function getPaypalStatus()
    {

        $user = Auth::user();
        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');
        $amount = Session::get('total_amount');
        // clear the session payment ID
        Session::forget('paypal_payment_id');
        Session::forget('total_amount');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            session()->flash('message', 'Paiement échoué! Vous avez annuler le paiement. Si vous avez un problème, contactez-nous.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Paiement Annuler');
            return redirect()->route('userDeposit.create');

        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approuvé') { // payment made

            $gateway= Gateway::first();

            $percentage =  $gateway->percent;
            $fixed =  $gateway->fixed;

            $charge = (($percentage / 100) * $amount) + $fixed;

            $new_amount = $amount - $charge;

            $deposit= Deposit::create([

                'transaction_id' => str_random(6).$user->id.str_random(6),
                'user_id'=> $user->id,
                'gateway_name'=> $gateway->name,
                'amount'=> $amount,
                'charge'=> $charge,
                'net_amount'=> $new_amount,
                'status'=> 1,
                'details'=> 'Dépôt instantané',

            ]);

            $user->profile->deposit_balance = $user->profile->deposit_balance +  $new_amount;
            $user->profile->save();

            session()->flash('message', 'Avant facturation des frais du processeur, le solde de votre compte était de € '.$amount.'. Après facturation des frais de processeur, le montant total de votre dépôt de €'.$new_amount.' à été crédité avec succès sur votre compte.');
            Session::flash('type', 'success');
            Session::flash('title', 'Dépôt réussi');

            return redirect(route('userDashboard'));
        }
        session()->flash('message', ' Votre dépôt de € '.$amount.' à échoué.');
        Session::flash('type', 'error');
        Session::flash('title', 'Dépôt échoué');

        return redirect(route('userDeposit.create'));
    }
}
