<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">

        @csrf
        <textarea name="body" id="body" required
            class="w-full p-2 mb-2 @error('body')shadow appearance-none border border-red-500 rounded  text-gray-700 leading-tight focus:outline-none focus:shadow-outline @enderror"
            placeholder="Share a story!"></textarea>
        @error('body')

        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p class="font-bold">Ohh No!!</p>
            <p>
                {{ $message }}
                {{-- You forgot to write the tweet --}}
            </p>
        </div>
        @enderror

        <hr class="py-4">

        <footer class="flex justify-between">
            <img src="{{ Auth::user()->getAvatar() }}" alt="" class="rounded-full h-10">

            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">
                Tweet-a-roo
            </button>
        </footer>


    </form>
</div>