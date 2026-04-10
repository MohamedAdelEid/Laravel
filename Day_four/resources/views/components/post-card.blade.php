<article class="rounded-xl bg-white p-4 ring-1 ring-gray-100 sm:p-6 lg:p-8 shadow-sm transition hover:shadow-md">
    <div class="flex flex-col gap-4">
        <!-- Image -->
        @if($post->image_url)
            <div class="overflow-hidden rounded-lg">
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="h-48 w-full object-cover">
            </div>
        @endif

        <div class="flex items-start sm:gap-8">
            <div class="hidden sm:grid sm:size-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-indigo-500"
                aria-hidden="true">
                <div class="flex items-center gap-1">
                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                    <span class="h-4 w-0.5 rounded-full bg-indigo-500"></span>
                    <span class="h-6 w-0.5 rounded-full bg-indigo-500"></span>
                    <span class="h-8 w-0.5 rounded-full bg-indigo-500"></span>
                </div>
            </div>

            <div class="w-full">
                <strong
                    class="rounded-sm border border-indigo-500 bg-indigo-500 px-3 py-1.5 text-[10px] font-medium text-white">
                    Post #{{ $post->id }}
                </strong>

                <h3 class="mt-4 text-lg font-medium sm:text-xl">
                    <a href="{{ route('posts.show', $post) }}" class="hover:underline text-indigo-600">
                        {{ $post->title }} </a>
                </h3>

                <p class="mt-1 text-sm text-gray-700">
                    {{ Str::limit($post->body, 150) }}
                </p>

                <div class="mt-4 sm:flex sm:items-center sm:gap-2">
                    <x-post-author :user="$post->user" />

                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                    <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
                        {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</article>