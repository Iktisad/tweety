{{-- like dislike helper --}}
<input type="hidden" id="likeDislikeHelper-{{$tweet->id}}"
    data-like="{{ $tweet->isAlreadyLiked(auth()->user()->id,true)== true ? 'true':'false' }}"
    data-dislike="{{ $tweet->isAlreadyDisliked(auth()->user()->id,false)== true ? 'true':'false' }}">

{{-- Like --}}
<div class="w-12  h-12 flex justify-between items-center p-2">

    <form id="like-{{ $tweet->id }}" onsubmit="event.preventDefault(); likeComment({{ $tweet->id }});"
        action=" {{ route('tweet.like', $tweet) }}" method="POST">
        @csrf

        <button name="like" type="submit">

            <i class="{{ $tweet->isAlreadyLiked(auth()->user()->id,true) ? 'fas fa-thumbs-up':'far fa-thumbs-up'}}"></i>

        </button>

    </form>

    <span id="count-like-{{$tweet->id}}" class="text-gray-700">{{$tweet->likes}}</span>

</div>

{{-- dislike --}}
<div class="w-12  h-12 flex justify-between items-center p-2">
    <form id="dislike-{{ $tweet->id }}" onsubmit="event.preventDefault(); disLikeComment({{ $tweet->id }});"
        action="{{ route('tweet.dislike', $tweet) }}" method="POST">
        @csrf

        @method('PATCH')

        <button name="dislike" type="submit">
            <i
                class="{{$tweet->isAlreadyDisliked(auth()->user()->id,false)? 'fas fa-thumbs-down' : 'far fa-thumbs-down'}}"></i>
        </button>


    </form>

    <span id="count-dislike-{{ $tweet->id}}" class="text-gray-700">{{$tweet->dislikes}}</span>

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