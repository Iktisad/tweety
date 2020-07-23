<x-master>
    {{-- <script>
        document.getElementsByTagName('body')[0].style.backgroundColor = 'antiquewhite';
    </script> --}}

    {{-- @section('style')
    <style>
        body {
            background-color: antiquewhite;
        }
    </style>
    lg:w-1/3 sm:w-5/6 md:w-1/4
    @endsection --}}


    <div class="container mx-auto flex justify-center">
        <div class="py-4 bg-gray-200 rounded-lg px-8 pt-6 pb-8 mb-4 w-full mx-auto max-w-sm shadow-xl ">
            <div class="text-center -mt-16" style=" color: rgb(78, 114, 231);">
                <i class="fas fa-feather fa-4x "></i>
            </div>
            <div class="font-bold text-lg  mb-4 text-center">{{ __('Tweety') }}</div>

            <form method="POST" action="{{ route('register') }}">

                @csrf
                {{-- Username --}}

                {{-- --}}
                <div class="mb-6 mt-8 container">
                    {{-- w-4/5  --}}
                    <input id="username" type="text"
                        class="border border-gray-400 px-3 py-2 w-full rounded-lg shadow-md form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" required autocomplete="username"
                        placeholder="Username" autofocus>

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- name --}}



                <div class="mb-6 mt-8 ">
                    <input id="name" type="text"
                        class="border border-gray-400 px-3 py-2 w-full rounded-lg shadow-md form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                {{-- Email --}}


                <div class="mb-6 mt-8 ">
                    <input id="email" type="email"
                        class="border border-gray-400 px-3 py-2 w-full rounded-lg shadow-md form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required placeholder="Email" autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                {{-- Password --}}


                <div class="mb-6 mt-8">
                    <input id="password" type="password"
                        class="border border-gray-400 px-3 py-2 w-full rounded-lg shadow-md form-control @error('password') is-invalid @enderror"
                        name="password" required placeholder="Password" autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                {{-- Retype Password --}}


                <div class="mb-6 mt-8">
                    <input id="password-confirm" type="password"
                        class="border border-gray-400 px-3 py-2 w-full rounded-lg shadow-md form-control"
                        name="password_confirmation" required placeholder="Confirm password"
                        autocomplete="new-password">
                </div>

                {{-- buttons --}}

                <div class="mb-6 mt-8">
                    <button type="submit"
                        class="float-right  py-3 px-5 rounded-lg text-sm  bg-pink-600 hover:bg-pink-700 text-black shadow-md focus:outline-none focus:shadow-outline">
                        <span class="font-bold text-white text-sm">Register</span>
                    </button>
                </div>

            </form>



        </div>
    </div>
</x-master>