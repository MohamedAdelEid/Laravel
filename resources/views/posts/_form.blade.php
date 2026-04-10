@csrf
<div class="space-y-5">
    <div>
        <label for="title" class="mb-1 block text-sm font-medium text-slate-700">Title</label>
        <input
            id="title"
            name="title"
            type="text"
            value="{{ old('title', $post->title ?? '') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-blue-500 focus:outline-none"
        >
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="body" class="mb-1 block text-sm font-medium text-slate-700">Body</label>
        <textarea
            id="body"
            name="body"
            rows="6"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-blue-500 focus:outline-none"
        >{{ old('body', $post->body ?? '') }}</textarea>
        @error('body')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            {{ $buttonText }}
        </button>
        <a href="{{ route('posts.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 hover:bg-slate-50">Cancel</a>
    </div>
</div>
