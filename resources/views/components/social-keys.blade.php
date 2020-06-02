<div class="flex justify-content items-center mt-2 p-2">

    <div class="flex-1/2  h-12 flex justify-between items-center p-2">
        <form action=" {{ route('like', $tweet) }}" method="POST" class="mr-2">
            @csrf
            <button name="like" type="submit">

                <i class="far fa-thumbs-up"></i>
            </button>
        </form>
        <span class="text-gray-700">{{$tweet->likes}}</span>

    </div>
    <div class="flex-1/2  h-12 flex justify-between items-center p-2">
        <form action="{{ route('dislike', $tweet) }}" method="POST" class="mr-2">
            @csrf
            @method('PATCH')
            <button name="dislike" type="submit">
                <i class="far fa-thumbs-down"></i>
            </button>

        </form>
        <span class="text-gray-700">{{$tweet->dislikes}}</span>
    </div>
    <div class="flex-1/2  h-12 flex justify-between items-center p-2">
        <button class="">
            <i class="far fa-comment"></i>
        </button>

        <span class="ml-1 text-xs">2k</span>
    </div>

    <div class="flex-1/2 h-12 flex items-center p-2">
        <button class=""><i class="far fa-share-square"></i></button>
    </div>
</div>