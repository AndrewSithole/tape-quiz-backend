<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <x-slot name="body">
        <div class="">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-4">Message Index</h1>

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('admin.messages.index') }}" class="mb-6">
                <div class="d-flex justify-items-start gap-2 space-x-4">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Search by title or code..." value="{{ request('search') }}">
                    </div>
                    <select name="has_quiz" class="px-4 py-2 text-gray-900 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-300">
                        <option value="">All</option>
                        <option value="1" {{ request('has_quiz') == '1' ? 'selected' : '' }}>Has Quiz</option>
                        <option value="0" {{ request('has_quiz') == '0' ? 'selected' : '' }}>No Quiz</option>
                    </select>

                    <button type="submit" class="btn bg-gradient-primary btn-sm mb-0">
                        Filter
                    </button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-flush dataTable-table">
                    <thead class="thead-light">
                    <tr>
                        <th class="px-4 py-2">Code</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Date Preached</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Duration</th>
                        <th class="px-4 py-2">Has Quiz?</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                    @foreach ($messages as $message)
                        <tr>
                            <td class="border border-slate-700 px-4 py-2">{{ $message->code }}</td>
                            <td class="border border-slate-700 px-4 py-2">{{ $message->title }}</td>
                            <td class="border border-slate-700 px-4 py-2">
                                @if ($message->date_preached instanceof \DateTime)
                                    {{ $message->date_preached->format('M d, Y') }}
                                @else
                                    {{ gettype($message->date_preached) }}
                                @endif
                            </td>
                            <td class="border border-slate-700 px-4 py-2">{{ $message->location }}</td>
                            <td class="border border-slate-700 px-4 py-2">{{ $message->duration }} minutes</td>
                            <td class="border border-slate-700 px-4 py-2">{{ $message->quizzes->isEmpty() ? 'No' : 'Yes' }}</td>
                            <td class="border border-slate-700 px-4 py-2">
                                <a href="{{ route('admin.messages.quiz.create', $message->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Create&nbsp;quiz
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            {{ $messages->links() }}
        </div>
    </x-slot>
</x-app-layout>
