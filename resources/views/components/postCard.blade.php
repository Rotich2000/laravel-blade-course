@props(['post', 'full' => false])

<div class="card">
    <div class="mb-4 h-52 rounded-md w-full object-cover overflow-hidden shadow border">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="post_img">
        @else
            <img src="{{ asset('storage/post_images/default.jpg') }}" alt="post_img">
        @endif
    </div>
    <h2 class="font-bold text-xl">{{ $post->title }}</h2>
    <div class="text-sm font-light mb-4">
        <span>Posted on {{ $post->created_at->diffForHumans() }} by</span>
        <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-medium">
            {{ $post->user->username }}
        </a>
    </div>

    @if ($full)
        <span>{{ $post->body }}</span>
    @else
        <div>
            <span>{{ Str::words($post->body, 15) }}</span>
            <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-2">Read more <span
                    class="text-2xl">&rarr;</span></a>
        </div>
    @endif
    <div class="flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>
</div>
