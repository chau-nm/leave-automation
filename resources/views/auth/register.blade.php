<x-guest-layout>
    <div class="w-full max-w-md rounded-2xl border border-gray-100 bg-white p-8 shadow-xl shadow-gray-200/60">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Tạo tài khoản mới</h1>
            <p class="mt-2 text-sm text-gray-500">Điền thông tin bên dưới để bắt đầu sử dụng hệ thống.</p>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="text-sm font-medium text-gray-700">Tên</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="mt-1.5 w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-900 placeholder:text-gray-400 transition focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-100"
                    placeholder="Nguyễn Văn A"
                >
            </div>

            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
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
                    placeholder="Tạo mật khẩu"
                >
            </div>

            <div>
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    class="mt-1.5 w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-900 placeholder:text-gray-400 transition focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-100"
                    placeholder="Nhập lại mật khẩu"
                >
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
            >
                Đăng ký
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            Đã có tài khoản?
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 transition hover:text-indigo-700 hover:underline">
                Đăng nhập
            </a>
        </p>
    </div>
</x-guest-layout>
