<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-1">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}">
                            <span class="text-indigo-600 font-bold">{{ $post->id }}</span> {{ $post->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
