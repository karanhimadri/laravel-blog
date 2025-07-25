<x-app-layout>
  <div class="container mx-auto px-4 py-6 max-w-2xl">
    <x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
      {{ __('Edit Blog') }}
    </h2>
    </x-slot>

    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <ul class="list-disc pl-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      {{-- Title --}}
      <div>
        <label class="block font-medium text-gray-700 mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}"
               class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-200" required>
      </div>

      {{-- Content --}}
      <div>
        <label class="block font-medium text-gray-700 mb-1">Content</label>
        <textarea name="content" rows="6"
                  class="w-full border border-gray-300 rounded px-4 py-2 focus:ring focus:ring-blue-200" required>{{ old('content', $post->content) }}</textarea>
      </div>

      {{-- Cover Image --}}
      <div>
        <label class="block font-medium text-gray-700 mb-1">Cover Image <span class="text-sm text-gray-500">(optional)</span></label>
        <input type="file" name="cover_image"
               class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 rounded">
        
        @if ($post->cover_image)
          <img src="{{ asset('storage/' . $post->cover_image) }}" alt="Current cover"
               class="mt-4 w-40 rounded shadow-sm border border-gray-200">
        @endif
      </div>

      {{-- Buttons --}}
      <div class="flex items-center gap-4">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
          Update
        </button>
        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline">
          ← Cancel
        </a>
      </div>
    </form>
  </div>
</x-app-layout>
