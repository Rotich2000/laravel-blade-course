<x-layout>
    <div class="h-[calc(100vh-204px)]  flex justify-center items-center">
        <div class="w-full">
            <h1 class="title">Welcome back</h1>
            {{-- Success message --}}
            @if (session('status'))
                <x-flashMsg msg="{{ session('status') }}" />
            @endif
            <div class="card mx-auto max-w-screen-sm">
                <form action="{{ route('login') }}" method="post">
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

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="input @error('password') ring-red-500 @enderror" name="password"
                            placeholder="Enter password...">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a class="text-blue-500" href="{{ route('password.request') }}">Forgot your password?</a>
                    </div>

                    @error('failed')
                        <p class="error mb-4">{{ $message }}</p>
                    @enderror

                    {{-- Submit button --}}
                    <button class="primary-btn">Login</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
