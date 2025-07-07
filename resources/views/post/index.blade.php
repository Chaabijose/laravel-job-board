<x-layout title="Blog">
    <h2>Blog Page</h2>
    @foreach ($posts as $post)
        <h1 class="text-2xl">{{ $post->id }} - {{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <ul>
            @foreach ($post->comments as $comment)
                <li>{{ $comment->content }}, {{ $comment->author }}</li>
            @endforeach
        </ul>
    @endforeach

    {{ $posts->links() }}
</x-layout>