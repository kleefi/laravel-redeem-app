@extends('layouts.admin')
@section('title','Participants')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-6 py-3 rounded shadow-lg z-50 transition ease-out duration-500">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50 transition ease-out duration-500">
        {{ session('error') }}
    </div>
    @endif

    @if(session('error'))
    <p class="block mx-auto w-fit text-center text-white bg-red-600 px-4 py-2 rounded mt-3">
        {{ session('error') }}
    </p>
    @endif
    <div class="p-8">

        <div class="flex gap-2">
            <button class="flex py-2 px-2 bg-blue-900 text-white mb-2">Export CSV</button>
            <button class="flex py-2 px-2 bg-green-800 text-white mb-2">Export Excel</button>
            <button class="flex py-2 px-2 bg-yellow-700 text-white mb-2">Export PDF</button>
        </div>
        <input type="search" placeholder="Search..."><button
            class="inline-flex pl-4 hover:underline hover:underline-offset-4">Search</button>
    </div>
    @if(isset($redeems) && $redeems->count())
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Province</th>
                <th class="px-6 py-3">City</th>
                <th class="px-6 py-3">District</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Phone</th>
                <th class="px-6 py-3">Unique Code</th>
                <th class="px-6 py-3">Unique Code Image</th>
                <th class="px-6 py-3">Source</th>
                <th class="px-6 py-3">Reward</th>
                <th class="px-6 py-3">Winner</th>
                <th class="px-6 py-3">Notes</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($redeems as $redeem)
            <tr class="bg-white border-b border-gray-200">
                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $loop->iteration }}</th>
                <td class="px-6 py-4">
                    <span class="
                        px-3 py-1 rounded-full text-white text-xs font-semibold
                        @if($redeem->status === 'done') bg-green-600
                        @elseif($redeem->status === 'process') bg-yellow-500
                        @elseif($redeem->status === 'pending') bg-gray-500
                        @else bg-gray-300 text-black
                        @endif
                    ">
                        {{ ucfirst($redeem->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 capitalize">{{ $redeem->name }}</td>
                <td class="px-6 py-4">{{ $redeem->province }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $redeem->city }}</td>
                <td class="px-6 py-4">{{ $redeem->district }}</td>
                <td class="px-6 py-4">{{ $redeem->email }}</td>
                <td class="px-6 py-4"><a target="_blank" href="https://wa.me/{{ $redeem->phone }}">{{ $redeem->phone
                        }}</a></td>
                <td class="px-6 py-4">{{ $redeem->unique_code }}</td>
                <td class="px-6 py-4">
                    <a target="_blank" href="/storage/{{$redeem->unique_code_image }}" class="text-blue-700"><img
                            src="/storage/{{ $redeem->unique_code_image }}" class="w-[40px] h-[40px] object-cover"></a>
                </td>
                <td class="px-6 py-4 capitalize">{{ $redeem->source }}</td>
                <td class="px-6 py-4">{{ $redeem->reward?->name ?? 'Not Set' }}</td>
                <td class="px-6 py-4">{{ $redeem->is_winner ? 'Yes' : 'No' }}</td>
                <td class="px-6 py-4">{{ $redeem->admin_notes ?? '-' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $redeem->created_at->format('d F Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('redeems.validate', $redeem->id) }}"
                        class="inline-flex bg-green-500 text-white px-2 rounded mb-1">
                        Validate
                    </a>
                    @auth
                    @if(auth()->user()->role === 'admin')
                    <form action="{{ route('redeems.destroy', $redeem->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 rounded">Delete</button>
                    </form>
                    @endif
                    @endauth
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center text-gray-500 my-4">Data masih kosong</div>
    @endif
</div>

<div class="mt-4">
    {{ $redeems->links() }}
</div>
@endsection