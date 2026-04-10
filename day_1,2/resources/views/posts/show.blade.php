@extends('layouts.app')

@section('content')
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            <a href="{{ route('posts.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 hover:bg-slate-50">Back</a>
        </div>
        <p class="whitespace-pre-line text-slate-700">{{ $post->body }}</p>
    </div>
@endsection
