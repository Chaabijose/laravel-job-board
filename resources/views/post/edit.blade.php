<x-layout :title="$pageTitle">

    <form method="POST" action="/post/{{ $post->id }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Post</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Update the post content and options below.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                                class="block w-full rounded-md border border-gray-300 px-3 py-1.5 text-base text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm" />
                            @error('title')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Author</label>
                        <div class="mt-2">
                            <input type="text" name="author" id="author" value="{{ old('author', $post->author) }}"
                                class="block w-full rounded-md border border-gray-300 px-3 py-1.5 text-base text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm" />
                            @error('author')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="5"
                                class="block w-full rounded-md border border-gray-300 px-3 py-1.5 text-base text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <div class="flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="published" name="published" type="checkbox" value="1"
                                    {{ old('published') || (!old() && $post->published) ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                            </div>
                            <div class="ml-3 text-sm leading-6">
                                <label for="published" class="font-medium text-gray-900">Published</label>
                                <p class="text-gray-500">Check this if the post should be visible to readers.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('post.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update
            </button>
        </div>
    </form>

</x-layout>
