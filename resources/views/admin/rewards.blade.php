@extends('layouts.admin')
@section('title', 'Rewards')
@section('content')

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
    <a href="{{ route('rewards.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 px-2 py-2 text-white m-4">
        Add new reward
    </a>
    @if(isset($rewards) && $rewards->count())
    <table class="w-full text-sm text-left rtl:text-right text-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Qty</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rewards as $reward)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4 capitalize">{{ $reward->name }}</td>
                <td class="px-6 py-4">{{ $reward->qty }}</td>
                <td class="px-6 py-4">{{ $reward->desc }}</td>
                <td class="px-6 py-4">
                    <a class="bg-blue-500 text-white px-2 rounded"
                        href="{{ route('rewards.edit', $reward->id) }}">Edit</a>
                    <form action="{{ route('rewards.destroy', $reward->id) }}" method="POST"
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
    {{ $rewards->links() }}
</div>
@endsection