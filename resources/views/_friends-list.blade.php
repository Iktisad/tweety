<div class="bg-gray-200 border border-gray-300 w-full rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>


        @forelse (Auth::user()->follows as $user)
        <li class="{{$loop->last ? '' :'mb-4'}} flex-auto">

            {{-- image of person --}}
            <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                <img src="{{$user->getAvatar()}}" alt="" class="rounded-full h-10 mr-2">

                {{-- name of person --}}
                <span class="text-sm font-bold">
                    {{'@' . $user->username}}
                    <div class="text-xs text-gray-600">
                        {{$user->name}}
                    </div>
                </span>

            </a>

        </li>
        @empty
        <p class="p-4">Your Not Following Anyone Yet</p>
        @endforelse


    </ul>
</div>