<x-guest-layout>
    <div class="w-full max-w-2xl rounded-2xl border border-gray-100 bg-white p-8 shadow-xl shadow-gray-200/60">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Tạo đơn nghỉ phép</h1>
            <p class="mt-2 text-sm text-gray-500">Điền thời gian và lý do để gửi yêu cầu nghỉ phép.</p>
        </div>

        @if ($errors->any())
            <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('leave.store') }}" class="space-y-5">
            @csrf

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label for="leave_from" class="block text-sm font-medium text-gray-700">
                        Nghỉ từ
                    </label>
                    <input
                        id="leave_from"
                        type="datetime-local"
                        name="leave_from"
                        value="{{ old('leave_from') }}"
                        required
                        class="mt-1.5 w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-900 transition focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-100"
                    >
                </div>

                <div>
                    <label for="leave_to" class="block text-sm font-medium text-gray-700">
                        Nghỉ đến
                    </label>
                    <input
                        id="leave_to"
                        type="datetime-local"
                        name="leave_to"
                        value="{{ old('leave_to') }}"
                        required
                        class="mt-1.5 w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-900 transition focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-100"
                    >
                </div>
            </div>

            <div>
                <label for="leave_reason" class="block text-sm font-medium text-gray-700">
                    Lý do nghỉ
                </label>
                <textarea
                    id="leave_reason"
                    name="leave_reason"
                    rows="4"
                    required
                    class="mt-1.5 w-full rounded-lg border border-gray-200 bg-white px-3.5 py-2.5 text-sm text-gray-900 placeholder:text-gray-400 transition focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-100"
                    placeholder="Ví dụ: Nghỉ phép gia đình, khám sức khỏe..."
                >{{ old('leave_reason') }}</textarea>
            </div>

            <div class="flex items-center justify-between gap-4 pt-2">
                <a
                    href="{{ route('home') }}"
                    class="text-sm font-medium text-gray-600 transition hover:text-gray-900 hover:underline"
                >
                    ← Quay lại dashboard
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
                >
                    Gửi đơn
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
