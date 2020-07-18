<x-master >

    @section('content')
    
    <div class="container mx-auto flex justify-center   ">
  
        <div class="py-4 bg-gray-200 rounded-lg lg:w-1/4 sm:w-5/6 md:w-1/4 pt-8 shadow-xl ">
              <div class="text-center -mt-16" style=" color: rgb(78, 114, 231);">  
                      <i class="fas fa-feather fa-4x "></i>
              </div>
            <div class="font-bold text-lg  mb-4 text-center" >{{ __('Tweety') }}</div>


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6 mt-8 ">
                    <input id="email" type="email"
                        class="mx-6 border border-gray-400 p-2 w-4/5 rounded-lg shadow-md @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="mb-6">
                  


                    <input id="password" type="password"
                        class=" mx-6 border border-gray-400 p-2 w-4/5 rounded-lg shadow-md @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="mb-6 pl-6">

                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>

                </div>


                <div class="mb-6 pr-6 ">

                    <button type="submit" class="float-right p-2 w-1/4 rounded-lg text-sm  bg-pink-600 text-black shadow-md">
                        {{ __('Log In') }}
                    </button>
           
                    <br>
                    <br>
                    <br>

                    @if (Route::has('password.request'))
                    <a class=" float-right btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    </div>
                
            </form>



        </div>
    </div>
</x-master>