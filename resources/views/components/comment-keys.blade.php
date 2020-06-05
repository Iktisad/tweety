<div class="w-12  h-12 flex justify-between items-center p-2">
    <form action="{{ route('comment.like', $comment) }}" method="POST">
        @csrf
        <button name="like" type="submit">

            <i class="far fa-thumbs-up"></i>
        </button>
    </form>
    {{-- comment likes --}}
    <span class="text-gray-700">{{$comment->likes}}</span>

</div>
<div class="w-12  h-12 flex justify-between items-center p-2">
    <form action="{{ route('comment.dislike', $comment) }}" method="POST">
        @csrf
        @method('PATCH')
        <button name="dislike" type="submit">
            <i class="far fa-thumbs-down"></i>
        </button>

    </form>
    {{-- comment dislikes --}}
    <span class="text-gray-700">{{ $comment->dislikes }}</span>
</div>
<div class="w-12  h-12 flex justify-between items-center p-2">
    <button>
        <i class="fas fa-reply"></i>
    </button>
</div>