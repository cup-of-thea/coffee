<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="max-w-xl p-4 w-full text-gray-800 text-justify">
            <h1> {{ __('home.title') }} </h1>
            <p> {{ __('home.description') }} </p>
            <p> {{ __('home.about') }} </p>
            <p> {{ __('home.navigation') }} </p>

            <nav class="flex justify-between space-x-4 my-4">
                <a href="#">{{ __('home.open_space') }}</a>
                <a href="#">{{ __('home.closed_space') }}</a>
            </nav>

            <div class="mt-8">
                <a class="flex justify-between border-b-0 border-t py-4" href="https://google.fr">
                    <div>Wireless is a trap</div>
                    <div>August 1, 2022</div>
                </a>
                <a class="flex justify-between border-b-0 border-t py-4" href="https://google.fr">
                    <div>Wireless is a trap</div>
                    <div>August 1, 2022</div>
                </a>
                <a class="flex justify-between border-b-0 border-t py-4" href="https://google.fr">
                    <div>Wireless is a trap</div>
                    <div>August 1, 2022</div>
                </a>
            </div>

        </div>
    </div>
</x-guest-layout>
