<x-layout title="Blog">
    <h2 class="text-2xl">Comments</h2>
    @foreach ($comments as $comment)
        <h3 class="text-3xl">{{ $comment->author }}</h3>
        <p>{{ $comment->content }}</p>
        <a href="/blog/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
    @endforeach
</x-layout>