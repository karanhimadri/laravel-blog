<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
      {{ __('Post Details') }}
    </h2>
  </x-slot>

  <div class="container mx-auto px-4 py-6 max-w-3xl">

    {{-- Back link --}}
    <a href="{{ route('posts.index') }}" class="text-sm text-blue-600 hover:underline inline-block mb-4">
      ← Back to All Posts
    </a>

    {{-- Post Title --}}
    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>

    {{-- Author & Date --}}
    <p class="text-sm text-gray-500 mb-4">
      By <span class="font-medium">{{ $post->author }}</span> on {{ $post->created_at->format('d M Y') }}
    </p>

    {{-- Cover Image --}}
    @if ($post->cover_image)
      <img src="{{ asset('storage/' . $post->cover_image) }}"
           alt="Cover image"
           class="rounded mb-6 w-full max-w-md shadow">
    @endif

    {{-- Content --}}
    <div class="prose prose-sm sm:prose lg:prose-lg text-gray-800 leading-relaxed">
      {!! nl2br(e($post->content)) !!}
    </div>

  </div>
</x-app-layout>
