@extends('layouts.app')

@section('content')
    <div class="rounded-xl bg-white p-6 shadow-sm">
        <h1 class="mb-5 text-2xl font-bold">Edit Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @method('PUT')
            @include('posts._form', ['buttonText' => 'Update Post'])
        </form>
    </div>
@endsection
