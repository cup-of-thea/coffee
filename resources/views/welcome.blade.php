<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-xl p-4 w-full text-gray-800 text-justify">
            <h1> {{ __('home.title') }} </h1>
            <p> {{ __('home.description') }} </p>
            <p> {{ __('home.about') }} </p>
            <p> {{ __('home.navigation') }} </p>

            <div class="mt-8">
                @foreach($posts as $post)
                <a class="flex justify-between border-b-0 border-t py-4" href="/posts/{{ $post->slug }}">
                    <div>{{ $post->title }}</div>
                    <div>{{ $post->date->toFormattedDateString() }}</div>
                </a>
                @endforeach
            </div>

        </div>
    </div>
</x-guest-layout>
