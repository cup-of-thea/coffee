<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-50 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-xl p-4 w-full text-gray-900 text-justify">
            <nav class="flex justify-between space-x-4 my-4">
                <a href="/">{{ __('home.back') }}</a>
            </nav>

            <div class="prose">
                {!! $post !!}
            </div>
        </div>
    </div>
</x-guest-layout>
