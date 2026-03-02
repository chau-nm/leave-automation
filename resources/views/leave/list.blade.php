<x-guest-layout>
    <div class="w-[900px] bg-white shadow-md rounded-lg p-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Dashboard</h1>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-sm text-red-600 hover:underline">
                    Logout
                </button>
            </form>
        </div>

        <h2 class="text-lg font-medium mb-4">Danh sách nghỉ phép</h2>

        @if ($leaves->isEmpty())
            <p class="text-gray-500">Chưa có đơn nghỉ phép nào.</p>
        @else
            <table class="w-full border-collapse text-sm">
                <thead>
                <tr class="border-b bg-gray-50 text-left">
                    <th class="py-2 px-3">Từ ngày</th>
                    <th class="py-2 px-3">Đến ngày</th>
                    <th class="py-2 px-3">Lý do</th>
                    <th class="py-2 px-3">Trạng thái</th>
                    <th class="py-2 px-3">Cập nhật</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($leaves as $leave)
                    <tr class="border-b">
                        <td class="py-2 px-3">
                            {{ $leave->leave_from }}
                        </td>
                        <td class="py-2 px-3">
                            {{ $leave->leave_to }}
                        </td>
                        <td class="py-2 px-3">
                            {{ $leave->leave_reason }}
                        </td>
                        <td class="py-2 px-3">
                            @if ($leave->status === 'pending')
                                <span class="text-yellow-600">Pending</span>
                            @elseif ($leave->status === 'accepted')
                                <span class="text-green-600">Accepted</span>
                            @else
                                <span class="text-red-600">Rejected</span>
                            @endif
                        </td>
                        <td class="py-2 px-3 text-gray-500">
                            {{ $leave->updated_at }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-guest-layout>
