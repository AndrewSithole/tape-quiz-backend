<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Quiz for ') }} <u>{{ $message->title }}</u>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ $message->title }}</p>
                    <form method="POST" action="{{ route('admin.quiz.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-5 rounded shadow-lg">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Title:</label>
                            <input type="hidden" name="message_id" id="message_id" value="{{ $message->id }}">
                            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="code" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Code:</label>
                            <input type="text" name="code" id="code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="date_preached" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Date Preached:</label>
                            <input type="date" name="date_preached" id="date_preached" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Location:</label>
                            <input type="text" name="location" id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Image:</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="duration" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Duration (minutes):</label>
                            <input type="number" name="duration" id="duration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
