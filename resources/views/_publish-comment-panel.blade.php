<form action="{{ route('comment', $tweet) }}" method="post">
    <div class="flex content-center">

        @csrf


        <textarea name="comment-{{$tweet->id}}" id="comment-{{$tweet->id}}" type="text"
            class="w-full resize-none overflow-hidden" placeholder=" Reply To This Thread "></textarea>


        <div class="flex-shrink-0 p-2">
            <button class="bg-blue-500 py-2 px-4 font-semibold text-sm text-white rounded-lg border border-blue-600">
                reply
            </button>
        </div>


    </div>

    @error('comment-'.$tweet->id)
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">

        <p class="font-semibold">{{ $message }}</p>

    </div>

    @enderror
</form>


{{-- <div class="flex flex-wrap items-stretch w-full mb-4 relative">

    <div class="flex -mr-px">
        <span
            class="flex items-center leading-normal bg-grey-lighter rounded rounded-l-none border border-l-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">@example.com</span>
    </div>
</div> --}}