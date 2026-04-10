@extends('layouts.app')

@section('title', 'Users')

@section('content')
<header class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">Users</h1>
        <p class="mt-1.5 text-sm text-gray-500">Manage people in the system.</p>
    </div>

    <a href="{{ route('users.create') }}"
        class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:ring-offset-2">
        Create User
    </a>
</header>

<div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
    <table class="min-w-full divide-y divide-gray-200 whitespace-nowrap text-left text-sm">
        <thead class="bg-gray-50 text-gray-800">
            <tr>
                <th class="px-6 py-4 font-medium uppercase tracking-wider text-xs">Name</th>
                <th class="px-6 py-4 font-medium uppercase tracking-wider text-xs">Email</th>
                <th class="px-6 py-4 font-medium uppercase tracking-wider text-xs text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($users as $user)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-700">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div class="font-medium text-gray-900">{{ $user->name }}</div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('users.show', $user) }}" class="inline-block text-indigo-600 hover:text-indigo-800 font-medium">View</a>
                    <a href="{{ route('users.edit', $user) }}" class="inline-block text-gray-600 hover:text-gray-800 font-medium">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium focus:outline-none">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                    No users found. <a href="{{ route('users.create') }}" class="text-indigo-600 hover:underline">Create one</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
