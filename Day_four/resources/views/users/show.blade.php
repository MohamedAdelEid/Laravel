@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <div class="mb-6">
        <a href="{{ route('users.index') }}"
            class="inline-flex items-center font-medium text-indigo-600 hover:text-indigo-500">
            <svg class="mr-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Users
        </a>
    </div>

    <div class="overflow-hidden bg-white shadow-sm ring-1 ring-gray-100 sm:rounded-xl mb-8">
        <div class="px-4 py-6 sm:px-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div
                    class="flex size-16 items-center justify-center rounded-full bg-indigo-100 text-2xl font-bold text-indigo-700">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-xl font-semibold leading-7 text-gray-900">{{ $user->name }}</h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{ $user->email }}</p>
                    <p class="text-xs text-gray-400 mt-1">Joined
                        {{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</p>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('users.edit', $user) }}"
                    class="inline-flex px-4 py-2 font-medium text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg text-sm">Edit
                    User</a>
            </div>
        </div>
    </div>

    <h2 class="text-2xl font-bold mb-4">Posts by {{ $user->name }}</h2>
    <div class="space-y-4">
        @forelse($user->posts as $post)
            <div class="rounded-xl bg-white p-4 ring-1 ring-gray-100 sm:p-6 shadow-sm transition hover:shadow-md">
                <strong
                    class="rounded-sm border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
                    Post #{{ $post->id }}
                </strong>
                <h3 class="mt-4 text-lg font-medium">
                    <a href="{{ route('posts.show', $post) }}" class="hover:underline text-indigo-600"> {{ $post->title }}
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-700">{{ Str::limit($post->body, 100) }}</p>
                <p class="mt-2 text-xs text-gray-400">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
            </div>
        @empty
            <div class="rounded-xl border border-dashed border-gray-300 p-8 text-center bg-gray-50">
                <p class="text-gray-500">This user hasn't created any posts yet.</p>
            </div>
        @endforelse
    </div>

    <h2 class="text-2xl font-bold mb-4">Trashed Posts by {{ $user->name }}</h2>
    <div class="space-y-4">
        @forelse($user->trashed_posts as $post)
            <div class="relative rounded-xl bg-white p-4 ring-1 ring-gray-100 sm:p-6 shadow-sm transition hover:shadow-md">
                <strong class="rounded-sm border border-red-500 bg-red-500 px-3 py-1.5 text-[10px] font-medium text-white">
                    Post #{{ $post->id }}
                </strong>
                <h3 class="mt-4 text-lg font-medium">
                    <a href="{{ route('posts.show', $post) }}" class="hover:underline text-indigo-600">
                        {{ $post->title }} </a>
                </h3>
                <p class="mt-1 text-sm text-gray-700">{{ Str::limit($post->body, 100) }}</p>
                <p class="mt-2 text-xs text-gray-400">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                <div class="absolute top-0 right-0 flex items-start sm:gap-8 ">
                    @include('posts.actions', ['post' => $post])
                </div>
            </div>

        @empty
            <div class="rounded-xl border border-dashed border-gray-300 p-8 text-center bg-gray-50">
                <p class="text-gray-500">This user hasn't any trashed posts yet.</p>
            </div>
        @endforelse
    </div>
@endsection
