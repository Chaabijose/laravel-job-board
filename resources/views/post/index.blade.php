<x-layout title="Blog">
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            class="bg-green-50 px-3 py-2 rounded text-green-800 transition-all duration-500">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/post/create"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
    </div>
    @foreach ($posts as $post)
        <div class="flex justify-between items-center border border-gray-200 px-4 py-6 my-3">
            <a href="/post/{{ $post->id }}" class="text-2xl">{{ $post->title }}</a>
            <p>{{ $post->author }}</p>
            <div>
                <a class="text-yellow-600 hover:text-gray-600" href="/post/{{ $post->id }}/edit">Edit</a>
                <form method="POST" action="/post/{{ $post->id }}"
                    onsubmit="return confirm('Are you sure, this cannot be reversed ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
</x-layout>