<x-guest-layout>
    <div class="w-full max-w-5xl rounded-2xl border border-gray-100 bg-white p-8 shadow-xl shadow-gray-200/60">
        <div class="mb-8 flex items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900">Dashboard</h1>
                <p class="mt-1 text-sm text-gray-500">Theo dõi và quản lý các đơn nghỉ phép của bạn.</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm font-medium text-red-600 transition hover:bg-red-100"
                >
                    Đăng xuất
                </button>
            </form>
        </div>

        <div class="mb-4 flex items-center justify-between gap-3">
            <h2 class="text-lg font-medium text-gray-900">Danh sách nghỉ phép</h2>
            <a
                href="{{ route('leave.create') }}"
                class="rounded-lg bg-indigo-600 px-3.5 py-2 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-200"
            >
                Tạo đơn mới
            </a>
        </div>

        @if ($leaves->isEmpty())
            <div class="rounded-lg border border-dashed border-gray-300 bg-gray-50 px-4 py-8 text-center text-gray-500">
                Chưa có đơn nghỉ phép nào.
            </div>
        @else
            <div class="overflow-hidden rounded-xl border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 text-left text-gray-600">
                            <tr>
                                <th class="px-4 py-3 font-medium">Từ ngày</th>
                                <th class="px-4 py-3 font-medium">Đến ngày</th>
                                <th class="px-4 py-3 font-medium">Lý do</th>
                                <th class="px-4 py-3 font-medium">Trạng thái</th>
                                <th class="px-4 py-3 font-medium">Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @foreach ($leaves as $leave)
                                <tr class="align-top">
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $leave->leave_from }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ $leave->leave_to }}
                                    </td>
                                    <td class="max-w-xs px-4 py-3 text-gray-700">
                                        <p class="line-clamp-2">{{ $leave->leave_reason }}</p>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($leave->status === 'pending')
                                            <span class="inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-xs font-medium text-amber-700">Pending</span>
                                        @elseif ($leave->status === 'accepted')
                                            <span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-700">Accepted</span>
                                        @else
                                            <span class="inline-flex rounded-full bg-rose-100 px-2.5 py-1 text-xs font-medium text-rose-700">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-500">
                                        {{ $leave->updated_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-guest-layout>
