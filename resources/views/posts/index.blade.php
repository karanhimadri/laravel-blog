<x-app-layout>
  <div class="container mx-auto px-4 py-6">
    <x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
      {{ __('Blogs') }}
    </h2>
    </x-slot>

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

    <div class="flex justify-end mb-6">
      <a href="{{ route('posts.create') }}"
         class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
        + New Blog
      </a>
    </div>

    @forelse ($posts as $post)
      <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5 mb-6 flex flex-col md:flex-row gap-5 group transition duration-300 hover:shadow-md">
        
        {{-- Image --}}
        @if ($post->cover_image)
          <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $post->cover_image) }}"
                 alt="Cover image"
                 class="w-full md:w-64 rounded object-cover">
          </div>
        @endif

        {{-- Content --}}
        <div class="flex-1 flex flex-col justify-between">
          <div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>
            <p class="text-gray-600 text-sm mb-4">
              {{ Str::limit($post->content, 500) }}
            </p>
          </div>

          <div class="flex justify-between items-center text-sm text-gray-500">
            <span>By {{ $post->author }} • {{ $post->created_at->format('d M Y') }}</span>

            <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              <a href="{{ route('posts.show', $post) }}"
                 class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-xs font-medium">
                View
              </a>
              <a href="{{ route('posts.edit', $post) }}"
                 class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs font-medium">
                Edit
              </a>
              <form action="{{ route('posts.destroy', $post) }}" method="POST"
                    onsubmit="return confirm('Delete this post?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs font-medium">
                  Delete
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @empty
      <p class="text-gray-500 text-center">No posts found. Start by creating one!</p>
    @endforelse
  </div>
</x-app-layout>
