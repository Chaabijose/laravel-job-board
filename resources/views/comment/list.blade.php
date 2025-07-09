<x-layout :title="$pageTitle">
    <h2>Comment by {{ $comments->author }}</h2>
    <p class="text-2xl">{{ $comments->content }}</p>

    @if ($comments->post)
        <h3>Related Post</h3>
        <ul>
            <li>
                <strong>{{ $comments->post->title }}</strong>
                <p>{{ $comments->post->body }}</p>
                <p>Author : {{ $comments->post->author }}</p>
                <a href="{{ route('blog.show', $comments->post->id) }}">View Full Post</a>
            </li>
        </ul>
    @else
        <p>No related post for this comment</p>
    @endif
</x-layout>