<div class="w-12  h-12 flex justify-between items-center p-2">
    <form id="like-{{ $comment->id}}-comment" action="{{ route('comment.like', $comment) }}" method="POST"
        onsubmit="event.preventDefault(); likeComment(this);">
        @csrf
        <button name="like" type="submit">

            <i
                class="{{$comment->isAlreadyLiked(auth()->user()->id,true)? 'fas fa-thumbs-up' :'far fa-thumbs-up'}}"></i>
        </button>
    </form>
    {{-- comment likes --}}
    <span id="count-like-{{$comment->id}}-comment" class=" text-gray-700">{{$comment->likes}}</span>

</div>
<div class="w-12  h-12 flex justify-between items-center p-2">
    <form id="dislike-{{ $comment->id}}-comment" action="{{ route('comment.dislike', $comment) }}" method="POST"
        onsubmit="event.preventDefault(); likeComment(this);">
        @csrf
        @method('PATCH')
        <button name="dislike" type="submit">
            <i
                class="{{$comment->isAlreadyDisliked(auth()->user()->id,false)? 'fas fa-thumbs-down' :'far fa-thumbs-down'}}"></i>
        </button>

    </form>
    {{-- comment dislikes --}}
    <span id="count-dislike-{{$comment->id}}-comment" class="text-gray-700">{{ $comment->dislikes }}</span>
</div>
<div class="w-12  h-12 flex justify-between items-center p-2">
    <button>
        <i class="fas fa-reply"></i>
    </button>
</div>