<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-50 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-xl p-4 w-full text-gray-900 dark:text-gray-300 text-justify">
            <h1> {{ __('poems.title') }} </h1>
            <p> {{ __('poems.description') }} </p>

            <div class="mt-8">
                @foreach($posts as $post)
                <a class="flex justify-between border-b-0 border-t py-4" href="/poems/{{ $post->slug }}">
                    <div>{{ $post->title }}</div>
                    <div>{{ $post->date->toFormattedDateString() }}</div>
                </a>
                @endforeach
            </div>


        </div>
    </div>
</x-guest-layout>
