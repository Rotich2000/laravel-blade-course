<x-layout>
    <div class="h-[calc(100vh-204px)]  flex justify-center items-center">
        <div class="w-full">
            <h1 class="title">Reset your password</h1>
            <div class="card mx-auto max-w-screen-sm">
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="text" class="input @error('email') ring-red-500 @enderror" name="email"
                            placeholder="Enter email..." value="{{ old('email') }}">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="input @error('password') ring-red-500 @enderror" name="password"
                            placeholder="Enter password...">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm password --}}
                    <div class="mb-8">
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" class="input @error('password') ring-red-500 @enderror"
                            name="password_confirmation" placeholder="Confirm password">
                    </div>

                    {{-- Submit button --}}
                    <button class="primary-btn">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
