<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-collapse navbar-light bg-light">
     <!-- Container wrapper -->
     <div class="container">
       <!-- Navbar brand -->
       <a class="navbar-brand me-2" href="/">
          IA
       </a>
   
       <!-- Toggle button -->
       <button
         class="navbar-toggler"
         type="button"
         data-mdb-toggle="collapse"
         data-mdb-target="#navbarButtonsExample"
         aria-controls="navbarButtonsExample"
         aria-expanded="false"
         aria-label="Toggle navigation"
       >
         <i class="bi bi-list"></i>
       </button>
   
       <!-- Collapsible wrapper -->
       <div class="collapse navbar-collapse" id="navbarButtonsExample">
         <!-- Left links -->
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
             <a class="nav-link" href="/">Individual</a>
           </li>
         </ul>
         <!-- Left links -->
   
         <div class="d-flex align-items-center">
          @guest
               @if (Route::has('login'))
                    <li class="nav-item">
                         <a class="btn btn-text px-3 me-2 hover" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
               @endif

               @if (Route::has('register'))
                    <li class="nav-item">
                         <a class="btn btn-primary me-3" href="{{ route('register') }}">{{ __('Sign up for free') }}</a>
                    </li>
               @endif
               @else
                    <li class="li">
                         <a href="/home" class="btn btn-text me-3 px-3">Home</a>
                    </li>  
          @endguest

           <a
             class="btn btn-dark px-3"
             href="https://github.com/blackshadowzz"
             role="button"
             ><i class="bi bi-github"></i
           ></a>
         </div>
       </div>
       <!-- Collapsible wrapper -->
     </div>
     <!-- Container wrapper -->
   </nav>
   <!-- Navbar -->

