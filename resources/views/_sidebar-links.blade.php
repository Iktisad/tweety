<ul>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">
            Home
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('explore')}}">
            Explore
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">
            Notifications
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">
            Messages
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">
            Bookmarks
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">
            Lists
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('profile', Auth::user()) }}">
            Profile
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="#">
            More
        </a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="font-bold text-lg mb-4 block" type="submit">
                Logout
            </button>
        </form>
    </li>
</ul>