<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the comments.
     */
    public function index(): Response
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return response()->view('dashboard.comments.listComments', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $gallery_id): RedirectResponse
    {
        $validatedData = $request->validate([
            // 'gallery_id' => 'required|exists:gallery,id',
            'body' => 'required|string',
        ]);

        $comment = new Comment;
        $comment->gallery_id = $gallery_id;
        $comment->user_id = auth()->user()->id;
        $comment->body = $validatedData['body'];
        $comment->save();

        // return redirect()->route('home', compact('test', 'gallery_id'));
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->back()->with('status', 'Комментарий удален.');
    }
}
