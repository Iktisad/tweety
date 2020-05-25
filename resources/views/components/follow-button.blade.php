@if (auth()->user()->isNot($user))
<form action="{{ route('follow.store', $user)}}" method="POST">
    @csrf
    <button class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">

        {{ auth()->user()->isfollowing($user) ? 'Unfollow' : 'Follow'}}

    </button>
</form>
@endif