<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.messages.update', ["message"=>$message->id]) }}" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-5 rounded shadow-lg">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $message->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="code" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Code:</label>
                            <input type="text" name="code" id="code" value="{{ old('code', $message->code) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="date_preached" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Date Preached:</label>
                            <input type="date" name="date_preached" id="date_preached" value="{{ old('date_preached', $message->date_preached ? $message->date_preached->format('Y-m-d') : '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Location:</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $message->location) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Image:</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline">
                            @if($message->image)
                                <img src="{{ asset('storage/' . $message->image) }}" alt="Current Image" class="mt-2 rounded shadow" style="max-width: 200px;">
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="duration" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Duration (minutes):</label>
                            <input type="number" name="duration" id="duration" value="{{ old('duration', $message->duration) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-white dark:bg-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
