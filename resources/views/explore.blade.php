<x-app>
    <div>
        @foreach ($users as $user)
        <div class="">

            <a href="{{ route('profile', $user) }}" class="flex items-center mb-4">
                <img src="{{$user->getAvatar()}}" alt="{{$user->username}}'s avatar'" width="60" class="rounded mr-4">

                <div>
                    <h4 class="font-bold">{{'@'.$user->username}}</h4>
                </div>
            </a>
        </div>
        @endforeach

        {{$users->links('pagination::semantic-ui')}}

    </div>

</x-app>