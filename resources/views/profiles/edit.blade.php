<x-app>
    <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        {{-- Username --}}
        <div class="mb-6">

            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Username
            </label>
            <input type="text" class="border border-gray-400 p-2 w-full" type="text" name="username" id="username"
                required value="{{$user->username}}">

            @error('username')
            <p class=" text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        {{-- Name --}}
        <div class="mb-6">

            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>
            <input type="text" class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" required
                value="{{$user->name}}">

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        {{-- avatar --}}
        <div class="mb-6">

            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Avatar
            </label>
            <input type="file" class="border border-gray-400 p-2 w-full" type="text" name="avatar" id="avatar">

            @error('avatar')
            <p class=" text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        {{-- cover image --}}

        <div class="mb-6">

            <label for="cover" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Cover Image
            </label>
            <input type="file" class="border border-gray-400 p-2 w-full" type="text" name="cover" id="cover">

            @error('cover')
            <p class=" text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        {{-- Email --}}
        <div class="mb-6">

            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                E-mail
            </label>
            <input type="email" class="border border-gray-400 p-2 w-full" type="text" name="email" id="email" required
                value="{{$user->email}}">

            @error('name')
            <p class=" text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>
        {{-- Password --}}
        <div class="mb-6">

            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>
            <input type="password" class="border border-gray-400 p-2 w-full" type="password" name="password"
                id="password" required>

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        {{-- Password Confirmation --}}
        <div class="mb-6">

            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Confirm Password
            </label>
            <input type="password" class="border border-gray-400 p-2 w-full" type="text" name="password_confirmation"
                id="password_confirmation" required>

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </div>

        {{-- Button --}}
        <div class="flex mb-6 justify-between">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                submit
            </button>

            <button type="reset" class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500">
                reset
            </button>

        </div>


    </form>
</x-app>