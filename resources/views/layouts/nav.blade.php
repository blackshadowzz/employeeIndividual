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
           <li class="nav-item">
           
           </li>
         </ul>

         {{-- login Form --}}
         <!-- Button trigger modal -->


          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">

                  
                  <div class="modal-content">
                    <!-- Modal body -->
                      <div class="modal-body">
                        <ul class="nav nav-pills nav-justified" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a class="nav-link show active" data-mdb-toggle="pill" href="#navbarLogin-login" role="tab" aria-selected="true">Login</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a class="nav-link" data-mdb-toggle="pill" href="#navbarLogin-signup" role="tab" aria-selected="false" tabindex="-1">Register</a>
                          </li>
                        </ul>
                      </div>
              
                      <!-- Pills navs -->
                      
              
                      <!-- Pills panels -->
                      <div class="tab-content p-3">
              
                        <!--Panel 1-->
                        <div class="tab-pane fade in active show" id="navbarLogin-login" role="tabpanel">
              
                          <!-- Default form login -->
                          <form id="login" class="text-center needs-validation" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                              <input value="{{ old('email') }}" required autocomplete="email" autofocus type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                     id="floatingInput" placeholder="name@example.com">
                              <label for="floatingInput">Email</label>
                              @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <div class="form-floating">
                              <input class="form-control @error('password') is-invalid @enderror" type="password" required autocomplete="current-password" name="password" id="floatingPassword" placeholder="Password">
                              <label for="floatingPassword">Password</label>
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                              <div class="">
                                <input class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Remember Me
                                </label>
                              </div>
                              <div>
                                <div class="fp">
                                  @if(Route::has('password.request'))
                                      <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                  @endif
                                </div>
                              </div>
                            </div>
                          <div class="mt-4">
                              <button type="submit" class="btn btn-primary form-control">LOG IN</button>
                          </div>
              

              
                          </form>
                          <!-- Default form login -->
              
                        </div>
                        <!--/.Panel 1-->
              
                        <!--Panel 2-->
                        <div class="tab-pane fade px-6" id="navbarLogin-signup">
              
                          <!-- Default form register  -->
                          <form id="register" class="text-center needs-validation" method="POST" action="{{ route('register') }}" >
                            @csrf
                            <div class="form-floating mb-3">
                              <input id="floatingInput" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              <label for="floatingInput">Name</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <input id="floatingInput" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                              <label for="floatingInput">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <input id="floatingInput" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                              <label for="floatingPassword" >Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                              <input id="floatingInput" placeholder="password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              <label for="floatingPassword" >Repeat password</label>

                            </div>
                           
                            
                            <button class="btn btn-primary btn-block mt-3" id="AJAXAuthRegisterBtn" type="submit" value="SIGNUP">
                              Sign up
                            </button>
              
                          </form>
                          <!-- Default form register  -->
              
                        </div>
                        <!--/.Panel 2-->
              
                      </div>
                      <!-- Pills panels -->
              
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>

                  {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                
            </div>
          </div>
         <!-- Left links -->
   
         <div class="d-flex align-items-center">
          @guest
               @if (Route::has('login'))

                    <button type="button" class="btn btn-text px-3 me-2 hover" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      Login
                    </button>
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

