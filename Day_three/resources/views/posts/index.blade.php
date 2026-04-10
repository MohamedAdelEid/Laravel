<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">
        <h2>All Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Add Post</a>
    </div>

    @foreach($posts as $post)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">

                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>

                <div class="d-flex gap-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                            Edit
                    </a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    @endforeach

</div>

</body>
</html>