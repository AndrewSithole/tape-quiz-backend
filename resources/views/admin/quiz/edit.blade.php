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

            <form id="quiz-form" method="POST" action="{{ route('admin.quiz.update', $quiz->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control @error('max_questions') is-invalid @enderror" id="maxQuestions" name="max_questions" value="{{ old('max_questions', $quiz->max_questions)??20 }}">
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <h4>Edit Quiz</h4>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-check form-switch mb-3 d-flex justify-content-end">
                            <input class="form-check-input" type="checkbox" id="scheduledToggle" name="published" {{ old('published', $quiz->published ? 'checked' : '') }}>
                            <label class="form-check-label" for="scheduledToggle">Publish Quiz</label>
                        </div>
                    </div>
                </div>
                <!-- Message ID (already selected) -->
                <input type="hidden" name="message_id" value="{{ $quiz->message_id }}">

                <div class="row">
                    <div id="startDateGroup" class="col-12 col-lg-6 mb-3">
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
                    <div id="deadlineGroup" class="col-12 col-lg-6 mb-3">
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
                </div>


                <div class="my-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h5>Quiz Questions</h5>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-check form-switch d-flex justify-content-end">
                                <a href="{{ route('admin.quiz.questions.manage', $quiz->id) }}" class="btn btn-primary">
                                    <i class="bi bi-plus-lg"></i> Edit Questions
                                </a>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group mb-3">
                        @foreach ($quiz->questions as $question)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $question->question_text }}
                                <div>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Save
                </button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
