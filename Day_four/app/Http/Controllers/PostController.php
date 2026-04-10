<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image_url'] = Storage::url($imagePath);
        }

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'تم إضافة مقالة جديدة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd(['all' => $request->all(), 'v' => $request->validated()]);

        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($post->image_url) {
                $oldImagePath = str_replace('/storage/', '', $post->image_url);
                Storage::disk('public')->delete($oldImagePath);
            }
            
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image_url'] = Storage::url($imagePath);
        }

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'تم تحديث المقالة!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete image if it exists
        if ($post->image_url) {
            $imagePath = str_replace('/storage/', '', $post->image_url);
            Storage::disk('public')->delete($imagePath);
        }

        $post->delete();
        return redirect()->back()->with('success', 'تم حذف المقالة');
    }

    // public function restore(Post $post) when soft deleted, cannot receive by id in direct
    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back()->with('success', 'المقالة تم إسترجاعها من جديد!');
    }
}
