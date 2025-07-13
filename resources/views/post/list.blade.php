<x-layout title="Blog">
    {{-- Message flash --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <p>{{ $post->body }}</p>
    <p class="text-2xl">{{ $post->author }}</p>

    {{-- Liste des commentaires --}}
    <div class="space-y-4 my-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Commentaires :</h3>
        @forelse ($post->comments as $comment)
            <div class="bg-white border rounded p-4">
                <p class="text-sm text-gray-600 font-semibold">{{ $comment->author }}</p>
                <p class="text-gray-700 mt-1">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-gray-500">Aucun commentaire pour ce post.</p>
        @endforelse
    </div>

    {{-- Comment Form --}}
    <div class="bg-gray-100 p-4 rounded shadow mb-6">
        <form action="/comments" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Your name</label>
                <input type="text" name="author" value="{{ old('author') }}"
                    class="w-full rounded border-gray-300 shadow-sm px-3 py-2 mt-1">
                @error('author')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Your Comment</label>
                <textarea name="content" rows="3"
                    class="w-full rounded border-gray-300 shadow-sm px-3 py-2 mt-1">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">Publier
            </button>
        </form>
    </div>

</x-layout>