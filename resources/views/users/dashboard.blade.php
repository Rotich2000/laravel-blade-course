<x-layout>
    <h1 class="title">Welcome {{ auth()->user()->username }}, you have {{ $posts->total() }} posts</h1>

    <div class="card mb-4">
        <h2 class="font-bold mb-4 text-xl">
            Create a new post
        </h2>
        {{-- Success message --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Post title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" class="input @error('title') ring-red-500 @enderror" name="title"
                    placeholder="Enter title..." value={{ old('title') }}>
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{--  Post body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body" rows="5" class="input @error('body') ring-red-500 @enderror" placeholder="Write text...">{{ old('body') }}</textarea>
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="primary-btn">Create</button>
        </form>
    </div>
    <h2 class="font-bold mb-4 text-2xl">Your latest post</h2>
    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-postCard :post="$post">
                <a href="{{ route('posts.edit', $post) }}"
                    class="bg-green-500 text-white px-2 py-1 text-sm rounded-md">Update</a>
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 text-sm rounded-md">Delete</button>
                </form>
            </x-postCard>
        @endforeach
    </div>
    <div>{{ $posts->links() }}</div>
</x-layout>
