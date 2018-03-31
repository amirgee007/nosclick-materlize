<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>{{$settings->site_name}} - {{$settings->site_title}}</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="{{asset('css/base.css')}}">
   <link rel="stylesheet" href="{{asset('css/main.css')}}">
   <link rel="stylesheet" href="{{asset('css/vendor.css')}}">

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">

</head>

<body>

	<!-- header 
   ================================================== -->
   <header class="main-header">
   	<div class="row">
   		<div class="logo">
	         <a href="{{config('app.url')}}">{{config('app.name')}}</a>
	      </div>   		
   	</div>   

   	
   </header> <!-- /header -->

   <!-- navigation 
   ================================================== -->
   
	<!-- main content
   ================================================== -->
   <main id="main-404-content" class="main-content-particle-js">

   	<div class="content-wrap">

		   <div class="shadow-overlay"></div>

		   <div class="main-content">
		   	<div class="row">
		   		<div class="col-twelve">
			  		
			  			<h1 class="kern-this">Erreur 404.</h1>
			  			<p>
						Oooooops! On dirait que rien n'a été trouvé à cet endroit.
                        Peut-être essayer sur les liens ci-dessous, cliquez sur le menu principal
                        ou essayez une recherche?
			  			</p>

			  				   			

			   	</div> <!-- /twelve --> 		   			
		   	</div> <!-- /row -->    		 		
		   </div> <!-- /main-content --> 

		   <footer>
		   	<div class="row">

		   		<div class="col-seven tab-full social-links pull-right">
			   		<ul>
				   		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					      			
				   	</ul>
			   	</div>
		   			
		  			<div class="col-five tab-full bottom-links">
			   		<ul class="links">

                            <li><a href="{{config('app.url')}}" title="">Accueil</a></li>
                         

				   	</ul>

				   	<!--<div class="credits">
				   		<p>Design by <a href="http://www.styleshout.com/" title="styleshout">styleshout</a></p>
				   	</div>-->
			   	</div>   		   		

		   	</div> <!-- /row -->    		  		
		   </footer>

		</div> <!-- /content-wrap -->
   
   </main> <!-- /main-404-content -->

   <!-- Java Script
   ================================================== --> 
   <script src="{{asset('js/main.min.js')}}"></script>
   <script src="{{asset('js/main2.js')}}"></script>
   <script src="{{asset('js/main.js')}}"></script>

</body>

</html>