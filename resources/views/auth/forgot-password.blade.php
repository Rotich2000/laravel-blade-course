<x-layout>
    <div class="h-[calc(100vh-204px)]  flex justify-center items-center">
        <div class="w-full">
            <h1 class="title">Request a password reset email</h1>
            {{-- Success message --}}
            @if (session('status'))
                <x-flashMsg msg="{{ session('status') }}" />
            @endif
            <div class="card mx-auto max-w-screen-sm">
                <form action="{{ route('password.request') }}" method="post" x-data="formSubmit"
                    @submit.prevent="submit">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="text" class="input @error('email') ring-red-500 @enderror" name="email"
                            placeholder="Enter email..." value="{{ old('email') }}">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit button --}}
                    <button x-ref="btn" class="primary-btn">Request</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
