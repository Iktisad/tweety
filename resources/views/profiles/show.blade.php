<x-app>

    <header class="mb-6 relative">
        <div class="relative mb-4">
            {{-- object-cover h-48 w-full border border-l-8 border-gray-400 rounded-lg --}}
            <img class="mb-2 h-48 w-full rounded-lg"
                src="https://i.pinimg.com/originals/3b/d2/1d/3bd21d6ba5ec2cb0a9f12a928b6bee4e.jpg" alt="">


            <img src="{{$user->getAvatar()}}" alt=""
                class="rounded-full shadow-xl absolute  bottom-0 transform -translate-x-1/2 translate-y-1/2" width="150"
                style="left:50%">

        </div>


        <div class="flex justify-between items-center mb-4">
            <div style="max-width: 270px;">
                <h2 class="font-bold text-2xl">
                    {{$user->username}}
                    <div class="text-lg text-gray-800">

                        {{$user->name}}

                    </div>

                </h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                <a href="{{ route('profile.edit', $user) }}"
                    class="bg-gray-200 rounded-full border-gray-300 py-2 px-4  text-xs mr-2">Edit Profile</a>
                @endcan


                {{-- inside componenest directory follow-button // this is anonymous blade component --}}
                <x-follow-button :user='$user'></x-follow-button>

            </div>
        </div>
        <p class="text-sm">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero pariatur voluptas aspernatur totam veritatis
            nostrum. Autem dolorum repudiandae distinctio, tenetur necessitatibus est dignissimos ullam, animi non
            tempore
            eveniet nostrum exercitationem.Molestias officia doloribus quia aut maxime, quis odit animi ad
            necessitatibus?
            At, rerum necessitatibus. Nemo, praesentium placeat dolore aspernatur labore, a inventore nam corrupti
            facilis
            quasi aliquid numquam saepe aperiam.
        </p>


    </header>


    {{-- Tweet Box --}}

    @include('_timeline',['tweets'=> $tweets])
</x-app>