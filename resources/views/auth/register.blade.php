<x-master>


    @section('content')

    <div class="container mx-auto flex justify-center  ">
        <div class="py-4 bg-gray-200 rounded-lg lg:w-1/3 sm:w-5/6 md:w-1/4 pt-8 shadow-xl ">
        <div class="text-center -mt-16" style=" color: rgb(78, 114, 231);">  
                      <i class="fas fa-feather fa-4x "></i>
              </div>
            <div class="font-bold text-lg  mb-4 text-center" >{{ __('Tweety') }}</div>
              
                    <form method="POST" action="{{ route('register') }}">

                            @csrf
                            {{-- Username --}}
                          

                                <div class="mb-6 mt-8 ">
                                    <input id="username" type="text"
                                        class="mx-6 border border-gray-400 p-2 w-4/5 rounded-lg shadow-md form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        
                            {{-- name --}}

                           

                                <div class="mb-6 mt-8 ">
                                    <input id="name" type="text"
                                        class="mx-6 border border-gray-400 p-2 w-4/5 rounded-lg shadow-md form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                          

                            {{-- Email --}}
                           

                                <div class="mb-6 mt-8 ">
                                    <input id="email" type="email"
                                        class="mx-6 border border-gray-400 p-2 w-4/5 rounded-lg shadow-md form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required placeholder="Email" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                         

                            {{-- Password --}}
                         

                                <div class="mb-6 mt-8">
                                    <input id="password" type="password"
                                        class="mx-6 border border-gray-400 p-2 w-4/5 rounded-lg shadow-md form-control @error('password') is-invalid @enderror" name="password"
                                        required placeholder="Password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                         

                            {{-- Retype Password --}}
                          

                                <div class="mb-6 mt-8">
                                    <input id="password-confirm" type="password" class="mx-6 border border-gray-400 p-2 w-4/5 rounded-lg shadow-md form-control"
                                        name="password_confirmation" required placeholder="Confirm password" autocomplete="new-password">
                                </div>
                         
                            {{-- buttons --}}
                        
                                <div class="mb-6 pr-6">
                                    <button type="submit"
                                        class="float-right p-2 w-1/4 rounded-lg text-sm  bg-pink-600 text-black shadow-md">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                         
                        </form>
                   
                
            
        </div>
    </div>

</x-master>