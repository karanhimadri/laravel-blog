<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

      {{-- Success Card --}}
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 text-lg">
          🎉 You're logged in as <strong>{{ auth()->user()->name }}</strong>!
        </div>
      </div>

      {{-- Actions --}}
      <div class="bg-white border border-gray-100 shadow-sm sm:rounded-lg p-6 flex flex-col sm:flex-row gap-4">
        <a href="{{ route('posts.create') }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow text-sm font-medium">
          + Create New Blog
        </a>

        <a href="{{ route('posts.index') }}"
           class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded shadow text-sm font-medium">
          📄 View All Blogs
        </a>
      </div>

    </div>
  </div>
</x-app-layout>
