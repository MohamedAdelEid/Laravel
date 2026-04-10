@extends('layouts.app')

@section('content')
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <h1 class="mb-5 text-2xl font-bold">Create Post</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @include('posts._form', ['buttonText' => 'Save Post'])
        </form>
    </div>
@endsection
