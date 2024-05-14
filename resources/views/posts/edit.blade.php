<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-2 text-sm text-blue-500">&larr; Go back
        to dashboard
    </a>
    <div class="card">
        <h2 class="font-bold mb-4 text-xl">
            Update your post
        </h2>
        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- Post title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" class="input @error('title') ring-red-500 @enderror" name="title"
                    placeholder="Enter title..." value="{{ $post->title }}">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{--  Post body --}}
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body" rows="5" class="input @error('body') ring-red-500 @enderror" placeholder="Write text...">{{ $post->body }}</textarea>
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Current cover photo if it exists --}}
            @if ($post->image)
                <label>Current cover photo</label>
                <div class="mb-4 h-64 rounded-md w-1/4 object-cover overflow-hidden shadow-lg border">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="post_img">
                </div>
            @endif

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="primary-btn">Update</button>
        </form>
    </div>
</x-layout>
