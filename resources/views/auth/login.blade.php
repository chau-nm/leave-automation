<x-guest-layout>
    <div class="w-full max-w-md rounded-2xl border border-gray-100 bg-white p-8 shadow-xl shadow-gray-200/60">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Chào mừng trở lại</h1>
            <p class="mt-2 text-sm text-gray-500">Đăng nhập để tiếp tục sử dụng hệ thống.</p>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="mt-1.5 w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-900 placeholder:text-gray-400 transition focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-100"
                    placeholder="you@example.com"
                >
            </div>

            <div>
                <label for="password" class="text-sm font-medium text-gray-700">Mật khẩu</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="mt-1.5 w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-900 placeholder:text-gray-400 transition focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-100"
                    placeholder="Nhập mật khẩu"
                >
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center gap-2 text-sm text-gray-600">
                    <input
                        type="checkbox"
                        name="remember"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                    >
                    <span>Ghi nhớ đăng nhập</span>
                </label>
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
            >
                Đăng nhập
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            Chưa có tài khoản?
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 transition hover:text-indigo-700 hover:underline">
                Đăng ký
            </a>
        </p>
    </div>
</x-guest-layout>
