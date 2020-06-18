<div class="border border-gray-300 rounded-lg">
    {{-- tweets --}}
    @forelse($tweets as $tweet)

    @if ($tweet->isRetweet)
    @include('_retweet')
    @else

    @include('_tweet')

    @endif

    @empty
    <p class="p-4">No Tweets Yet</p>
    @endforelse

</div>
{{-- {{ $tweets->links() }} --}}