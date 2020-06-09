<x-master>
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">

                @if (Auth::check())
                <div class="lg:w-32">

                    {{-- Side bar of the page --}}
                    @include('_sidebar-links')
                </div>
                @endif
                <div class="lg:flex-1 lg:mx-10" style="max-width:700px">
                    {{-- news feeds contents --}}

                    {{$slot}}
                </div>
                @if (Auth::check())
                <div class="lg:w-1/6">
                    {{-- friends list --}}
                    @include('_friends-list')
                </div>
                @endif

            </div>
        </main>
    </section>

</x-master>