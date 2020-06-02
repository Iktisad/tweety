<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-gray-400'}}">
    {{-- avatar --}}
    <div class="mr-4 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->getAvatar() }}" alt="" class="rounded-full h-12">
        </a>


    </div>
    {{-- users --}}
    <div class="w-full">

        <h5 class="font-bold mb-4">
            {{ $tweet->user->name }}

            <a class="hover:underline" href="{{ route('profile', $tweet->user) }}">

                <span class="ml-1 text-xs text-gray-800">

                    {{ '@'. $tweet->user->username }}

                </span>
            </a>
        </h5>


        <p class="text-sm"> {{$tweet->body}} </p>

        {{-- <small>tweeted on {{ date('d-m-Y', strtotime($tweet->created_at))}} </small> --}}
        {{-- <small>tweeted on {{ $tweet->getDateTimeOfTweet() }} </small> --}}
        <small>
            {{ $tweet->created_at->diffForHumans() }}
        </small>
        {{-- anonymous blade compnonent.. this is inside components/social-keys.blade.php --}}
        <x-social-keys :tweet='$tweet'>
            </x->
    </div>
    <div>
        <p> comments are here and unstyled</p>
        {{-- ?? simply means if it doesnt exist then print nothing --}}
        {{ $tweet->comments  ?? ''}}
    </div>
</div>