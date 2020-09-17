 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-lg fixed-top">
   <div class="container">
     <a class="navbar-brand" href="{{ url('/') }}">
       Mama Mboga
     </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <!-- Left Side Of Navbar -->
       <ul class="navbar-nav mr-auto">
         <li class="nav-item">
           <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ route('shop') }}">{{ __('Shop') }}</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="{{ route('home') }}">{{ __('Checkout') }}</a>
         </li>
       </ul>

       <!-- Right Side Of Navbar -->
       <ul class="navbar-nav ml-auto">
         <li class="nav-item">
           <!-- <a class="nav-link" href="{{ route('home') }}">{{ __('Cart') }}</a> -->
           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
             <span class="badge badge-pill badge-dark">
               <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
             </span>
           </a>

           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                style="width: 450px; padding: 0px; border-color: #9DA0A2">
             <ul class="list-group" style="margin: 20px;">

             </ul>

         </li>

         @guest
         <li class="nav-item">
           <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
         </li>
         @if (Route::has('register'))
         <li class="nav-item">
           <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
         </li>
         @endif
         @else
         <li class="nav-item dropdown">
           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
             {{ Auth::user()->name }} <span class="caret"></span>
           </a>

           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
             </form>
           </div>
         </li>
         @endguest
       </ul>
     </div>
   </div>
 </nav>
