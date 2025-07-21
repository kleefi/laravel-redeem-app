@extends('layouts.admin')
@section('title', 'Vouchers')
@section('content')
<form method="GET" action="{{ route('vouchers.index') }}" class="mb-4">
    <div class="flex w-full items-center gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, phone..."
            class="border border-gray-300 px-4 py-2 rounded text-sm w-1/2" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Search</button>
        <a href="{{ route('vouchers.index') }}" class="text-sm text-gray-600 underline">Reset</a>
    </div>
</form>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                bg-green-500 text-white px-6 py-3 rounded shadow-lg z-50
                transition ease-out duration-500">
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
    <a href="{{ route('vouchers.create') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 px-2 py-2 text-white m-4">
        Add new voucher
    </a>
    @if(isset($vouchers) && $vouchers->count())
    <table class="w-full text-sm text-left rtl:text-right text-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Unique Code</th>
                <th scope="col" class="px-6 py-3">Reward</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vouchers as $voucher)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4 capitalize">{{ $voucher->unique_code }}</td>
                <td class="px-6 py-4">{{ $voucher->reward?->name ?? 'Not Set' }}</td>
                <td class="px-6 py-4">{{ $voucher->is_used===0?'Available':'Used' }}</td>
                <td class="px-6 py-4">
                    <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 rounded">Delete</button>
                    </form>
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
    {{ $vouchers->links() }}
</div>
@endsection