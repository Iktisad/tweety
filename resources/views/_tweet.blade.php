<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400'}}">
    {{-- avatar --}}
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{$tweet->user->getAvatar()}}" alt="" class="rounded-full h-10 mr-2">
        </a>


    </div>
    {{-- users --}}
    <div>
        <a href="{{ route('profile', $tweet->user) }}">
            <h5 class="font-bold mb-4">
                {{'@'. $tweet->user->username}}
                <div class="text-xs text-gray-800">

                    {{ $tweet->user->name }}

                </div>
            </h5>
        </a>
        <p class="text-sm">
            {{$tweet->body}}
        </p>
        {{-- <small>tweeted on {{ date('d-m-Y', strtotime($tweet->created_at))}} </small> --}}
        {{-- <small>tweeted on {{ $tweet->getDateTimeOfTweet() }} </small> --}}
        <small>
            {{ $tweet->created_at->diffForHumans() }}
        </small>

        <div class="flex mt-2">
            <form action="{{ route('like', $tweet->user) }}" method="POST" class="mr-2">
                @csrf
                <button name="like" type="submit">
                    <i class="far fa-thumbs-up"></i>
                    {{$tweet->likes}}
                </button>
            </form>
            <form action="{{ route('dislike', $tweet->user) }}" method="POST">
                @csrf
                @method('PATCH')
                <button name="dislike" type="submit">
                    <i class="far fa-thumbs-down"></i>
                    {{$tweet->dislikes}}
                </button>
            </form>
        </div>
    </div>

</div>