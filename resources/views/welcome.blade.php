<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Laravel Blog</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  <!-- Breeze styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 antialiased min-h-screen flex flex-col">

  <!-- Navbar -->
  <header class="w-full border-b bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-lg font-semibold">Laravel Blog</h1>

      <nav class="space-x-4">
        @if (Route::has('login'))
          @auth
            <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">Posts</a>
          @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:underline">Log in</a>

            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="text-gray-700 hover:underline">Register</a>
            @endif
          @endauth
        @endif
      </nav>
    </div>
  </header>

  <!-- Main Welcome Section -->
  <main class="flex-grow flex items-center justify-center px-6">
    <div class="max-w-2xl text-center">
      <h2 class="text-4xl font-bold mb-4">Welcome to My Laravel Blog</h2>
      <p class="text-gray-600 text-lg mb-6">
        This is a simple blog platform built with Laravel 12 and Breeze. <br>
        Manage posts, upload images, and share your writing with ease.
      </p>

      @auth
        <a href="{{ route('posts.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">
          View Posts
        </a>
      @else
        <a href="{{ route('register') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow">
          Get Started
        </a>
      @endauth
    </div>
  </main>

  <!-- Footer -->
  <footer class="py-4 text-center text-sm text-gray-400">
    © {{ date('Y') }} Laravel Blog • Made with ❤️
  </footer>

</body>
</html>
