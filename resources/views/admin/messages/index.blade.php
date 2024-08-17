<x-app-layout>
    <x-slot name="title">
        {{ __('Messages') }}
    </x-slot>
    <x-slot name="header">
        <h6 class="font-weight-bolder mb-0 text-white">
            {{ __('Messages') }}
        </h6>
    </x-slot>

    <x-slot name="body">
        <div class="">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-4">Message Index</h1>

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('admin.messages.index') }}" class="mb-6">
                <div class="d-flex justify-items-start gap-2 space-x-4">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="search" placeholder="Search by title or code..." value="{{ request('search') }}">
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
            <div class="table-responsive ">
                <table class="table align-items-center mb-0">
                    <thead >
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Code</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Preached</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Duration</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Has Quiz?</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                    @foreach ($messages as $message)
                        <tr>
                            <td >
                                <h6 class="mb-0 text-sm py-1">
                                    {{ $message->code }}
                                </h6>
                            </td>
                            <td >
                                <p class="text-sm text-secondary mb-0">
                                    {{ $message->title }}
                                </p>
                            </td>
                            <td >
                                <p class="text-sm text-secondary mb-0">

                            @if ($message->date_preached instanceof \DateTime)
                                    {{ $message->date_preached->format('M d, Y') }}
                                @else
                                    {{ gettype($message->date_preached) }}
                                @endif
                                </p>
                            </td>
                            <td >
                                <p class="text-sm text-secondary mb-0">
                                {{ $message->location }}
                                </p>
                            </td>
                            <td >
                                <p class="text-sm text-secondary mb-0">
                                    {{ $message->duration }} minutes
                                </p>
                            </td>
                            <td >
                                <p class="text-sm text-secondary mb-0">
                                {{ $message->quizzes->isEmpty() ? 'No' : 'Yes' }}
                                </p>
                            </td>
                            <td >
                                <a href="{{ route('admin.messages.quiz.create', $message->id) }}" class="btn btn-xs btn-primary m-1">
                                    Create&nbsp;quiz
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            <div class="p-2">
                {{ $messages->links() }}
            </div>
        </div>
    </x-slot>
</x-app-layout>
