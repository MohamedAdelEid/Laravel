@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <header class="mb-10">
        <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Create Post</h1>
        <p class="mt-1.5 text-sm text-gray-500">Add a new post to the system.</p>
    </header>

    <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
        <form action="{{ route('posts.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    placeholder="Enter post title" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border">
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">Author</label>
                <select name="user_id" id="user_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border bg-white">
                    <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>Select an author</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                <textarea name="body" id="body" rows="6" placeholder="Write your post here..." required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-3">Post Image (Optional)</label>
                <x-image-upload name="image" />
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <button type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:ring-offset-2">
                    Save Post
                </button>
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300 focus:ring-offset-2">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
