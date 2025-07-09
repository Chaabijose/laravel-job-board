<x-layout :title="$pageTitle">
    <h1 class="text-3xl">Tag : {{ $tags->title }}</h1>

    <h3>Related Posts</h3>
    <ul>
        @forelse ($tags->posts as $post)
            <li>
                <strong>{{ $post->title }}</strong>
                <p>Author : {{ $post->author }}</p>
                <a href="{{ route("blog.show", $post->id) }}"></a>
            </li>
        @empty
            <p>No posts ara associated with this tag.</p>
        @endforelse
    </ul>
</x-layout>