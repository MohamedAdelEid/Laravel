@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <header class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Posts</h1>
            <p class="mt-1.5 text-sm text-gray-500">Manage your insightful content.</p>
        </div>

        <a href="{{ route('posts.create') }}"
            class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:ring-offset-2">
            Create Post
        </a>
    </header>

    <div class="space-y-4">
        @forelse ($posts as $post)
            <div class="relative">
                <x-post-card :post="$post" />
                <div class="absolute top-4 -right-0 sm:top-6 bottom-0 bg-gray-200">
                    @include('posts.actions')
                </div>
            </div>

        @empty
            <div class="rounded-xl border border-gray-200 bg-white px-8 py-16 text-center shadow-sm">
                <svg class="mx-auto size-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <h2 class="mt-4 text-lg font-medium text-gray-900">No posts.</h2>
                <p class="mt-2 text-sm text-gray-500">Get started by creating a new post.</p>
                <a href="{{ route('posts.create') }}"
                    class="mt-6 inline-flex items-center rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700">
                    <svg class="mr-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Create Post
                </a>
            </div>
        @endforelse
        {{ $posts->links() }}

    </div>
@endsection
