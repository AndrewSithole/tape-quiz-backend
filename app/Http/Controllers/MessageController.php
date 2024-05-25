<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Contracts\View\View;
class MessageController extends Controller
{
    public function index(Request $request): View
    {
        $query = Message::query();

        if (!empty($request->input('search'))) {
            $query->where('title', 'like', '%' . $request->input('search') . '%')
                ->orWhere('code', 'like', '%' . $request->input('search') . '%');
        }

        if (!empty($request->input('has_quiz'))) {
            $hasQuiz = $request->input('has_quiz') == '1' ? true : false;
            $query->whereHas('quizzes', function ($q) use ($hasQuiz) {
                if ($hasQuiz) {
                    $q->whereNotNull('id');
                } else {
                    $q->whereNull('id');
                }
            });
        }

        $messages = $query->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }
    public function create(): View
    {
        return view('admin.messages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:sermons',
            'date_preached' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Max 2MB file
            'duration' => 'required|integer',
        ]);

        $data = $request->only(['title', 'code', 'date_preached', 'location', 'duration']);
        $data['date_preached'] = date('Y-m-d', strtotime($data['date_preached']));

        $sermon = new Message($data);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sermons', 's3');
            $sermon->image_url = Storage::disk('s3')->url($path);
        }

        $sermon->save();

        return redirect()->route('admin.messages.index')->with('success', 'Sermon created successfully.');
    }
    public function edit(Message $message): View
    {
        return view('admin.messages.edit', compact('message'));
    }
}
