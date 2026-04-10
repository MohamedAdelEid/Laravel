@extends('layouts.app')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">All Posts</h1>
        <a href="{{ route('posts.create') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Create Post</a>
    </div>

    @if ($posts->count())
        <div class="space-y-4">
            @foreach ($posts as $post)
                <div class="rounded-xl bg-white p-5 shadow-sm">
                    <h2 class="mb-2 text-lg font-semibold text-slate-900">{{ $post->title }}</h2>
                    <p class="mb-4 text-slate-600">{{ \Illuminate\Support\Str::limit($post->body, 120) }}</p>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('posts.show', $post) }}" class="rounded-md bg-slate-800 px-3 py-1.5 text-sm text-white hover:bg-slate-900">View</a>
                        <a href="{{ route('posts.edit', $post) }}" class="rounded-md bg-amber-500 px-3 py-1.5 text-sm text-white hover:bg-amber-600">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-md bg-red-600 px-3 py-1.5 text-sm text-white hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @else
        <div class="rounded-xl bg-white p-8 text-center shadow-sm">
            <p class="text-slate-600">No posts found. Create your first post.</p>
        </div>
    @endif
@endsection
