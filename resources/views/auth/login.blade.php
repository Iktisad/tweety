<x-master>

    @section('content')
    <div class="container mx-auto flex justify-center ">
        <div class="px-6 py-4 bg-gray-100 rounded-lg">


            <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('E-Mail Address') }}</label>


                    <input id="email" type="email"
                        class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Password') }}</label>


                    <input id="password" type="password"
                        class="border border-gray-400 p-2 w-full @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="mb-6">

                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>

                </div>

                <div class="mb-6">

                    <button type="submit" class="px-3 py-3 rounded text-sm uppercase bg-blue-400 text-white">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif

                </div>
            </form>



        </div>
    </div>
</x-master>