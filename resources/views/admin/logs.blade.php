@extends('layouts.admin')
@section('title','Logs')
@section('content')
<div class="p-4">
    <h1 class="text-xl font-semibold mb-4">Activity Logs</h1>

    @if($logs->count())
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Action</th>
                    <th class="px-4 py-2">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $loop->iteration + (($logs->currentPage() - 1) * $logs->perPage()) }}</td>
                    <td class="px-4 py-2 capitalize">{{ $log->user?->name ?? 'System' }}</td>
                    <td class="px-4 py-2">{{ $log->action }}</td>
                    <td class="px-4 py-2">{{ $log->created_at->format('d M Y, H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
    @else
    <div class="text-center text-gray-500">Belum ada log aktivitas.</div>
    @endif
</div>
@endsection