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
            <h4>Edit Quiz</h4>

            <form id="quiz-form" method="POST" action="{{ route('admin.quiz.update', $quiz->id) }}">
                @csrf
                @method('PUT')

                <!-- Message ID (already selected) -->
                <input type="hidden" name="message_id" value="{{ $quiz->message_id }}">

                <!-- Scheduled Toggle -->
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="scheduledToggle" name="scheduled" {{ old('scheduled', $quiz->start_date ? 'checked' : '') }}>
                    <label class="form-check-label" for="scheduledToggle">Schedule this quiz</label>
                </div>

                <!-- Start Date (Hidden by default, shown if scheduled) -->
                <div id="startDateGroup" class="mb-3" style="{{ old('scheduled', $quiz->start_date) ? '' : 'display:none;' }}">
                    <label for="startDate" class="form-label">Start Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="startDate" name="start_date" value="{{ old('start_date', $quiz->start_date) }}">
                        @error('start_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- Deadline (Hidden by default, shown if scheduled) -->
                <div id="deadlineGroup" class="mb-3" style="{{ old('scheduled', $quiz->deadline) ? '' : 'display:none;' }}">
                    <label for="deadline" class="form-label">Deadline</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline', $quiz->deadline) }}">
                        @error('deadline')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- Max Questions -->
                <div class="mb-3">
                    <label for="maxQuestions" class="form-label">Maximum Questions</label>
                    <input type="number" class="form-control @error('max_questions') is-invalid @enderror" id="maxQuestions" name="max_questions" value="{{ old('max_questions', $quiz->max_questions) }}" min="1">
                    @error('max_questions')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Published -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="published" name="published" value="1" {{ old('published', $quiz->published) ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">
                        Publish
                    </label>
                </div>

                <!-- Questions List -->
                <div class="mb-4">
                    <h5>Quiz Questions</h5>
                    <ul class="list-group mb-3">
                        @foreach ($quiz->questions as $question)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $question->question_text }}
                                <div>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('admin.quiz.questions.manage', $quiz->id) }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Add New Question
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Update Quiz
                </button>
            </form>

            <!-- Optional: Add some JS to handle the toggle functionality -->
            <script>
                document.getElementById('scheduledToggle').addEventListener('change', function() {
                    const isScheduled = this.checked;
                    document.getElementById('startDateGroup').style.display = isScheduled ? 'block' : 'none';
                    document.getElementById('deadlineGroup').style.display = isScheduled ? 'block' : 'none';
                });
            </script>

        </div>
    </x-slot>
</x-app-layout>
