@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<header class="mb-10">
    <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Create User</h1>
    <p class="mt-1.5 text-sm text-gray-500">Add a new user to the system.</p>
</header>

<div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
    <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border">
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border">
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border">
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
            <button type="submit"
                class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:ring-offset-2">
                Save User
            </button>
            <a href="{{ route('users.index') }}"
                class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300 focus:ring-offset-2">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
