<x-app-layout>
    <x-slot name="title">
        {{ __('Create Message') }}
    </x-slot>
    <x-slot name="header">
        {{ __('Create Message') }} <span class="font-weight-light font-italic">[page most likely not needed]</span>
    </x-slot>

    <x-slot name='body'>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-4">{{ __('Create Message') }} </h1>
        <form method="POST" action="{{ route('admin.quiz.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="code" class="form-label">Code:</label>
                <input type="text" name="code" id="code" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_preached" class="form-label">Date Preached:</label>
                <input type="date" name="date_preached" id="date_preached" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (minutes):</label>
                <input type="number" name="duration" id="duration" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Message</button>
        </form>
    </x-slot>
</x-app-layout>
