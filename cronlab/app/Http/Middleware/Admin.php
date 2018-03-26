<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()){


            if (Auth::user()->admin){


                return $next($request);


            }

            session()->flash('message', 'Vous n\'avez pas la permission de voir ceci.');
            Session::flash('type', 'error');
            Session::flash('title', 'Autorisation non accordée');


            return redirect()->route('userDashboard');


        }


        return abort(404);


    }
}
