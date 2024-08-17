<x-app-layout>
    <x-slot name="title">
        {{ __('Quiz') }}
    </x-slot>
    <x-slot name="header">
        <h6 class="font-weight-bolder mb-0 text-white">
            {{ __('Quiz') }}
        </h6>
    </x-slot>

    <x-slot name="body">
        <div class="">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-4">Quiz Index</h1>

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('admin.quiz.index') }}" class="mb-6">
                <div class="d-flex justify-items-start gap-2 space-x-4">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="search" placeholder="Search by Message title or code..."
                               value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="btn bg-gradient-primary btn-sm mb-0">
                        Filter
                    </button>
                </div>
            </form>
            <div class="table-responsive ">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tape</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date
                            Preached
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Duration
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Has Quiz?
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                    @foreach ($quiz as $quiz_object)
                        <tr>
                            <td>
                                <h6 class="mb-0 text-sm py-1">
                                    {{ $quiz_object->message->code }} - {{ $quiz_object->message->title }}
                                </h6>
                            </td>
                            <td>
                                <p class="text-sm text-secondary mb-0">

                                    @if ($quiz_object->date_preached instanceof \DateTime)
                                        {{ $quiz_object->date_preached->format('M d, Y') }}
                                    @else
                                        {{ gettype($quiz_object->date_preached) }}
                                    @endif
                                </p>
                            </td>
                            <td>
                                <p class="text-sm text-secondary mb-0">
                                    {{ $quiz_object->location }}
                                </p>
                            </td>
                            <td>
                                <p class="text-sm text-secondary mb-0">
                                    {{ $quiz_object->duration }} minutes
                                </p>
                            </td>
                            <td>
                                <p class="text-sm text-secondary mb-0">
                                    {{ $quiz_object->quizzes->isEmpty() ? 'No' : 'Yes' }}
                                </p>
                            </td>
                            <td>
                                <a href="{{ route('admin.messages.quiz.create', $quiz_object->id) }}"
                                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Create&nbsp;quiz
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination links -->
            {{ $quiz->links() }}
        </div>
    </x-slot>
</x-app-layout>
