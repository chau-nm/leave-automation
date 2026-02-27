<x-guest-layout>
    <div class="w-[448px] bg-white shadow-md rounded-lg p-8">
        <h1 class="text-xl font-semibold mb-6 text-center">
            Đăng ký
        </h1>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm font-medium">Tên</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full mt-1 border rounded-md px-3 py-2"
                >
            </div>

            <div>
                <label class="text-sm font-medium">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full mt-1 border rounded-md px-3 py-2"
                >
            </div>

            <div>
                <label class="text-sm font-medium">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full mt-1 border rounded-md px-3 py-2"
                >
            </div>

            <div>
                <label class="text-sm font-medium">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full mt-1 border rounded-md px-3 py-2"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition"
            >
                Register
            </button>
        </form>

        <div class="mt-6 text-sm text-center">
            <a href="{{ route('login') }}" class="underline">
                Đã có tài khoản? Đăng nhập
            </a>
        </div>
    </div>
</x-guest-layout>
