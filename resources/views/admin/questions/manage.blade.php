<x-app-layout>
    <x-slot name="title">
            {{ __('Create Quiz') }}
    </x-slot>
    <x-slot name="header">
           {{ $message->title }}
    </x-slot>

    <x-slot name='body'>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-4"><i class="bi bi-cassette opacity-10 pe-2"></i>{{ $message->title }}</h1>
        <div class="container">
            <h4>Manage questions</h4>

                <div id="questions-manager" data-quiz-id="{{ $quiz->id }}"
                     data-initial-questions="{{ json_encode($quiz->questions) }}">
                </div>

        @section('scripts')
                @viteReactRefresh
                @vite('resources/js/question-manager.jsx')
            @endsection
        </div>
    </x-slot>
</x-app-layout>
