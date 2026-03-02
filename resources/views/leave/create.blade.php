<x-guest-layout>
    <div class="w-[600px] bg-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-semibold mb-6">
            Tạo đơn nghỉ phép
        </h1>

        <form method="POST" action="{{ route('leave.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">
                    Nghỉ từ
                </label>
                <input
                    type="datetime-local"
                    name="leave_from"
                    value="{{ old('leave_from') }}"
                    required
                    class="w-full mt-1 border rounded-md px-3 py-2"
                >
            </div>

            <div>
                <label class="block text-sm font-medium">
                    Nghỉ đến
                </label>
                <input
                    type="datetime-local"
                    name="leave_to"
                    value="{{ old('leave_to') }}"
                    required
                    class="w-full mt-1 border rounded-md px-3 py-2"
                >
            </div>

            <div>
                <label class="block text-sm font-medium">
                    Lý do nghỉ
                </label>
                <textarea
                    name="leave_reason"
                    rows="3"
                    required
                    class="w-full mt-1 border rounded-md px-3 py-2"
                >{{ old('leave_reason') }}</textarea>
            </div>

            <div class="flex items-center justify-between pt-4">
                <a
                    href="{{ route('home') }}"
                    class="text-sm text-gray-600 hover:underline"
                >
                    ← Quay lại dashboard
                </a>

                <button
                    type="submit"
                    class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 transition"
                >
                    Gửi đơn
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
