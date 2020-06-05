{{-- comment section --}}


<div class="flex pr-4 pt-4 pb-4 border-t border-b-gray-400">
    <div class="mr-4 flex-shrink-0">

        <a href="#">
            <img src="{{ $comment->user->getAvatar()}}" alt="" class="rounded-full h-10">
        </a>

    </div>

    <div class="full">
        <div class="flex items-center pt-2 pb-2">

            {{-- user name --}}
            <h6 class="font-bold text-base">
                {{ $comment->user->name }}
            </h6>

            {{-- user username --}}
            <a class="hover:underline" href="{{ route('profile', $comment->user)}}">
                <span class="ml-1 text-sm text-gray-800">
                    {{ '@'. $comment->user->username ?? 'nothing yet' }}
                </span>
            </a>
        </div>

        <div class="w-full">
            <p class="text-sm mb-2"> {{$comment->body}} </p>

            <small class="text-xs text-gray-600">
                {{ $comment->created_at->diffForHumans() }}
            </small>
        </div>


        <div class="w-full flex">
            <x-comment-keys :comment='$comment'>
                </x->
        </div>
    </div>
</div>