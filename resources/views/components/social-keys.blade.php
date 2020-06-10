{{-- Like --}}
<div class="w-12  h-12 flex justify-between items-center p-2">
    <form action=" {{ route('tweet.like', $tweet) }}" method="POST">
        @csrf
        {{-- ajax request helper --}}
        <input type="hidden" id="like" url="{{ route('tweet.like', $tweet) }}">

        <button name="like" type="submit">

            <i class="far fa-thumbs-up"></i>
        </button>
    </form>
    <span class="text-gray-700">{{$tweet->likes}}</span>

</div>

{{-- dislike --}}
<div class="w-12  h-12 flex justify-between items-center p-2">
    <form action="{{ route('tweet.dislike', $tweet) }}" method="POST">
        @csrf
        {{-- ajax request helper --}}
        <input type="hidden" id="dislike" url="{{ route('tweet.dislike', $tweet) }}">
        @method('PATCH')
        <button name="dislike" type="submit">
            <i class="far fa-thumbs-down"></i>
        </button>

    </form>
    <span class="text-gray-700">{{$tweet->dislikes}}</span>
</div>

{{-- comment focus --}}
<div class="w-12  h-12 flex justify-between items-center p-2">

    <button onclick="focusOn({{ $tweet->id }})">
        <i class="far fa-comment"></i>
    </button>

    <span class="ml-2 text-xs">2k</span>
</div>

{{-- retweet --}}
<div class="w-12 h-12 flex items-center p-2">

    {{-- ajax request helper --}}
    <input type="hidden" id="">
    <button class="ml-2">
        <i class="fas fa-retweet"></i>
        {{-- <i class="far fa-share-square"></i> --}}
    </button>
</div>