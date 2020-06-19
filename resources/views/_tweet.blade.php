<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400'}}">
    {{-- avatar --}}
    <div class="mr-4 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->getAvatar() }}" alt="" class="rounded-full h-12">
        </a>
    </div>




    {{-- users post --}}
    <div class="w-full">

        <div class="flex items-center pt-2 pb-2">

            {{-- user name --}}
            <h5 class="font-bold text-base">
                {{ $tweet->user->name }}
            </h5>

            {{-- user username --}}
            <a class="hover:underline" href="{{ route('profile', $tweet->user->username) }}">

                <span class="ml-1 text-sm text-gray-800">

                    {{ '@'. $tweet->user->username }}

                </span>
            </a>
        </div>


        <div class="w-full">
            <p class="text-sm mb-2"> {{$tweet->body}} </p>

            <small class="text-xs text-gray-600">
                {{ $tweet->created_at->diffForHumans() }}
            </small>
        </div>
        {{-- <small>tweeted on {{ date('d-m-Y', strtotime($tweet->created_at))}} </small> --}}
        {{-- <small>tweeted on {{ $tweet->getDateTimeOfTweet() }} </small> --}}

        {{-- anonymous blade compnonent.. this is inside components/social-keys.blade.php --}}
        <div class="w-full flex"> {{-- flex --}}
            <x-social-keys :tweet='$tweet'>
                </x->
        </div>

        <div class="p-2 w-full flex items-center h-auto">
            @include('_publish-comment-panel')
        </div>


        @foreach ($tweet->comments as $comment)
        {{-- include comments  --}}
        @include('_tweet-comment')

        @endforeach

    </div>
</div>