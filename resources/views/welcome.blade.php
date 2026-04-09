<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Leave Automation') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="min-h-screen bg-[#FDFDFC] p-6 text-gray-900 lg:p-8">
    <div class="mx-auto flex w-full max-w-6xl flex-col gap-6">
        <header class="flex items-center justify-between">
            <div class="inline-flex items-center gap-2 rounded-full border border-indigo-100 bg-white px-3 py-1 text-sm text-indigo-700 shadow-sm">
                <span class="h-2 w-2 rounded-full bg-indigo-500"></span>
                Leave Automation
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center gap-2">
                    @auth
                        <a
                            href="{{ route('home') }}"
                            class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
                        >
                            Vào dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                        >
                            Đăng nhập
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
                            >
                                Đăng ký
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="grid gap-6 lg:grid-cols-[1.3fr_1fr]">
            <section class="rounded-2xl border border-gray-100 bg-white p-8 shadow-xl shadow-gray-200/60">
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900 lg:text-4xl">
                    Quản lý nghỉ phép gọn gàng, rõ ràng
                </h1>
                <p class="mt-4 max-w-2xl text-sm leading-6 text-gray-600 lg:text-base">
                    Tạo đơn nghỉ phép nhanh chóng, theo dõi trạng thái duyệt tập trung và quản lý lịch sử
                    nghỉ phép ngay trên một giao diện thống nhất.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    @auth
                        <a
                            href="{{ route('home') }}"
                            class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
                        >
                            Mở dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
                        >
                            Bắt đầu ngay
                        </a>
                    @endauth
                </div>
            </section>

            <section class="rounded-2xl border border-gray-100 bg-white p-6 shadow-xl shadow-gray-200/60">
                <h2 class="text-lg font-semibold text-gray-900">Điểm nổi bật</h2>
                <ul class="mt-4 space-y-3 text-sm text-gray-600">
                    <li class="rounded-lg border border-gray-100 bg-gray-50 px-3 py-2">
                        Tạo đơn nghỉ phép với thời gian và lý do chi tiết.
                    </li>
                    <li class="rounded-lg border border-gray-100 bg-gray-50 px-3 py-2">
                        Theo dõi trạng thái xử lý: pending, accepted, rejected.
                    </li>
                    <li class="rounded-lg border border-gray-100 bg-gray-50 px-3 py-2">
                        Xem danh sách lịch sử nghỉ phép trên dashboard trực quan.
                    </li>
                </ul>
            </section>
        </main>
    </div>
</body>
</html>
