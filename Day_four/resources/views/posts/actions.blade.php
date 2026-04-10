 <div class="ml-auto flex flex-col gap-2">
     <a href="{{ route('posts.edit', $post) }}"
         class="w-10 h-10 text-center inline-block shadow-md hover:shadow-indigo-400 p-2 text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring transition-colors">
         {{-- Edit Icon --}}
         ✏️
     </a>

     <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
         onsubmit="return confirm('Are you sure you want to delete this post?');">
         @csrf
         @method('DELETE')
         <button type="submit"
             class="w-10 h-10 text-center inline-block shadow-md hover:shadow-indigo-400 py-1 px-2  text-white hover:bg-transparent hover:text-red-600 focus:outline-none hover: focus:ring transition-colors">
             🗑️
         </button>
     </form>

     @if ($post->deleted_at)
         <form action="{{ route('posts.restore', ['id' => $post->id]) }}" method="POST"
             onsubmit="return confirm('Are you sure you want to restore this post?');">
             @csrf
             <button type="submit"
                 class="inline-block p-2 shadow-md hover:shadow-indigo-400 focus:outline-none focus:ring transition-colors">
                 <span class="text-gray-700"> ❮❮ </span>
             </button>
         </form>
     @endif
 </div>
