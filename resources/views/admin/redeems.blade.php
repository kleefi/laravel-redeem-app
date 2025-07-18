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

    @if(isset($redeems) && $redeems->count())
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Province</th>
                <th class="px-6 py-3">City</th>
                <th class="px-6 py-3">District</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Phone</th>
                <th class="px-6 py-3">Unique Code</th>
                <th class="px-6 py-3">Unique Code Image</th>
                <th class="px-6 py-3">Source</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($redeems as $contact)
            <tr class="bg-white border-b border-gray-200">
                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $loop->iteration }}</th>
                <td class="px-6 py-4">{{ $contact->name }}</td>
                <td class="px-6 py-4">{{ $contact->province }}</td>
                <td class="px-6 py-4">{{ $contact->city }}</td>
                <td class="px-6 py-4">{{ $contact->district }}</td>
                <td class="px-6 py-4">{{ $contact->email }}</td>
                <td class="px-6 py-4">{{ $contact->phone }}</td>
                <td class="px-6 py-4">{{ $contact->unique_code }}</td>
                <td class="px-6 py-4">
                    <a target="_blank" href="/storage/{{$contact->unique_code_image }}" class="text-blue-700">Link</a>
                </td>
                <td class="px-6 py-4">{{ $contact->source }}</td>
                <td class="px-6 py-4">{{ $contact->created_at->format('d F Y') }}</td>
                <td class="px-6 py-4">
                    <form action="{{ route('redeems.destroy', $contact->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2">Delete</button>
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
    {{ $redeems->links() }}
</div>
@endsection