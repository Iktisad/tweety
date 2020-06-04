<div class="w-12  h-12 flex justify-between items-center p-2">
    <form action=" #{{-- route('like', $tweet) --}}" method="POST">
        @csrf
        <button name="like" type="submit">

            <i class="far fa-thumbs-up"></i>
        </button>
    </form>
    {{-- comment likes --}}
    <span class="text-gray-700">{{'2'}}</span>

</div>
<div class="w-12  h-12 flex justify-between items-center p-2">
    <form action="#{{-- route('dislike', $tweet) --}}" method="POST">
        @csrf
        @method('PATCH')
        <button name="dislike" type="submit">
            <i class="far fa-thumbs-down"></i>
        </button>

    </form>
    {{-- comment dislikes --}}
    <span class="text-gray-700">{{'0'}}</span>
</div>
<div class="w-12  h-12 flex justify-between items-center p-2">
    <button>
        <i class="fas fa-reply"></i>
    </button>
</div>