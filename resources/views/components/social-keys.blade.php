{{-- Like --}}
<div class="w-12  h-12 flex justify-between items-center p-2">

    <form id="like-{{ $tweet->id}}-{{$tweet->isRetweet ? 'retweet': 'tweet'}}"
        onsubmit="event.preventDefault(); likeComment(this);"
        action=" {{ $tweet->isRetweet ? route('retweet.like', $tweet) : route('tweet.like', $tweet) }}" method="POST">

        @csrf

        <button name="like" type="submit">

            <i class="{{ $tweet->isAlreadyLiked(auth()->user()->id,true) ? 'fas fa-thumbs-up':'far fa-thumbs-up'}}"></i>

        </button>

    </form>

    <span id="count-like-{{$tweet->id}}-{{$tweet->isRetweet ? 'retweet':'tweet'}}"
        class="text-gray-700">{{$tweet->likes}}</span>

</div>



{{-- dislike --}}
<div class="w-12  h-12 flex justify-between items-center p-2">


    <form id="dislike-{{ $tweet->id }}-{{$tweet->isRetweet ? 'retweet':'tweet'}}"
        onsubmit="event.preventDefault(); disLikeComment(this);"
        action="{{ $tweet->isRetweet ? route('retweet.dislike', $tweet) : route('tweet.dislike', $tweet) }}"
        method="POST">

        @csrf

        @method('PATCH')

        <button name="dislike" type="submit">
            <i
                class="{{$tweet->isAlreadyDisliked(auth()->user()->id,false)? 'fas fa-thumbs-down' : 'far fa-thumbs-down'}}"></i>
        </button>


    </form>

    <span id="count-dislike-{{ $tweet->id}}-{{$tweet->isRetweet ? 'retweet':'tweet'}}"
        class="text-gray-700">{{$tweet->dislikes}}</span>

</div>

{{-- comment focus --}}
<div class="w-12  h-12 flex justify-between items-center p-2">


    <button
        onclick={{ $tweet->isRetweet ? 'focusOnRetweetComment('.auth()->user()->id.','.$tweet->id.')' :'focusOn('.$tweet->id.')'}}>
        <i class="far fa-comment"></i>
    </button>


    <span class="ml-2 text-xs">2k</span>


</div>

{{-- retweet --}}
@if (!$tweet->isRetweet)

<div class="w-12 h-12 flex items-center p-2">

    <form id="{{ $tweet->id}}-tweet" action="{{ route('retweet', $tweet) }}" method="post"
        onsubmit="event.preventDefault(); retweetCurrent(this);">
        @csrf

        <button name="retweet" type="submit" class="ml-2">

            <i class="fas fa-retweet"></i>
            {{-- <i class="far fa-share-square"></i> --}}
        </button>

    </form>
</div>
@endif