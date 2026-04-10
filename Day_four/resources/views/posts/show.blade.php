@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="mb-6">
        <a href="{{ route('posts.index') }}"
            class="inline-flex items-center font-medium text-indigo-600 hover:text-indigo-500">
            <svg class="mr-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Posts
        </a>
    </div>

    <article class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-100">
        <div class="p-6 sm:p-8">
            <strong
                class="rounded-sm border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
                Post #{{ $post->id }}
            </strong>

            <h1 class="mt-4 text-3xl font-bold text-gray-900 sm:text-4xl">
                {{ $post->title }}
            </h1>

            <div class="mt-4 flex items-center gap-4 text-sm text-gray-500">
                <div class="flex items-center gap-1">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <p class="font-medium">{{ $post->user->name ?? 'Unknown User' }}</p>
                </div>
                <span>&middot;</span>
                <p>Created {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y g:i A') }}</p>
                @if ($post->updated_at->ne($post->created_at))
                    <span>&middot;</span>
                    <p>Updated {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</p>
                @endif
            </div>

            @if ($post->image_url)
                <div class="mt-8 overflow-hidden rounded-lg">
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="h-96 w-full object-cover">
                </div>
            @endif

            <div class="mt-8 prose prose-indigo max-w-none text-gray-700 whitespace-pre-wrap">
                {{ $post->body }}
            </div>
        </div>

        <div class="flex items-center gap-4 bg-gray-50 p-6 sm:px-8 border-t border-gray-100">
            <a href="{{ route('posts.edit', $post) }}"
                class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:ring-offset-2">
                Edit Post
            </a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center justify-center rounded-lg border border-red-600 bg-transparent px-5 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-600 hover:text-white focus:outline-none focus:ring-1 focus:ring-red-600 focus:ring-offset-2">
                    Delete
                </button>
            </form>
        </div>
    </article>
@endsection
