<x-app-layout>
    <x-slot name="title">
            {{ __('Create Quiz') }}
    </x-slot>
    <x-slot name="header">
           {{ $message->title }}
    </x-slot>

    <x-slot name='body'>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-4">{{ $message->title }}</h1>
        <div class="container">
            <h4>Create Quiz</h4>

            <form id="quiz-form" method="POST" action="{{ route('admin.quiz.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" required>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="published" name="published">
                    <label class="form-check-label" for="published">Published</label>
                </div>

                <!-- React Component for Adding/Removing Questions -->
                <div id="quiz-questions">
                    <QuizQuestions />
                </div>

                <button type="submit" class="btn btn-primary">Save Quiz</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
