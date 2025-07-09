<x-layout title="Blog">
    <h1 class="text-3xl">{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p class="text-2xl">{{ $post->author }}</p>
</x-layout>