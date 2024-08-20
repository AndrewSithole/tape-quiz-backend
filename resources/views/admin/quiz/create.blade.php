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
                    <label for="is_scheduled" class="form-label">Schedule Quiz</label>
                    <select class="form-select" id="is_scheduled" name="is_scheduled" required>
                        <option value="1">Scheduled</option>
                        <option value="0">Unscheduled</option>
                    </select>
                </div>

                <div id="schedule-fields">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>

                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control" id="deadline" name="deadline">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="min_questions" class="form-label">Minimum Questions Required to Publish</label>
                    <input type="number" class="form-control" id="min_questions" name="min_questions" value="1" min="1">
                </div>

                <div id="quiz-questions">
                    <QuizQuestions minQuestions={document.getElementById('min_questions').value} />
                </div>

                <div class="form-check form-switch mb-3" id="publish-btn">
                    <input class="form-check-input" type="checkbox" id="published" name="published">
                    <label class="form-check-label" for="published">Published</label>
                </div>
            </form>
        </div>

        @section('scripts')
            <script>
                // Toggle schedule fields visibility based on schedule option
                document.getElementById('is_scheduled').addEventListener('change', function() {
                    const isScheduled = this.value == '1';
                    document.getElementById('schedule-fields').style.display = isScheduled ? 'block' : 'none';
                });

                // Initially hide schedule fields if unscheduled
                document.getElementById('schedule-fields').style.display = document.getElementById('is_scheduled').value == '1' ? 'block' : 'none';
            </script>
        @endsection

    </x-slot>
</x-app-layout>
