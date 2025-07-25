@extends('layouts.admin')
@section('title','Contacts')
@section('content')
<form method="GET" action="{{ route('contacts.index') }}" class="mb-4">
    <div class="flex w-full items-center gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email, phone..."
            class="border border-gray-300 px-4 py-2 rounded text-sm w-1/2" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Search</button>
        <a href="{{ route('contacts.index') }}" class="text-sm text-gray-600 underline">Reset</a>
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
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
               bg-red-500 text-white px-4 py-2 rounded shadow-lg z-50
               transition ease-out duration-500">
        {{ session('error') }}
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-600 text-white px-4 py-2 rounded mt-3 max-w-md mx-auto">
        <ul class="list-disc list-inside text-sm space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    @if(isset($contacts) && $contacts->count())
    <table class="w-full text-sm text-left rtl:text-right text-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Phone</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Message</th>
                <th scope="col" class="px-6 py-3">Date</th>
                @if(Auth::user()->role==='admin')
                <th scope="col" class="px-6 py-3">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4 capitalize">{{ $contact->name }}</td>
                <td class="px-6 py-4">{{ $contact->email }}</td>
                <td class="px-6 py-4">{{ $contact->phone }}</td>
                <td class="px-6 py-4">{{ $contact->category }}</td>
                <td class="px-6 py-4">{{ $contact->message }}</td>
                <td class="px-6 py-4">{{ $contact->created_at->format('d F Y') }}</td>
                @if(Auth::user()->role==='admin')
                <td class="px-6 py-4">
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 rounded">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-center text-gray-500 my-4">Data masih kosong</div>
    @endif
</div>

<div class="mt-4">
    {{ $contacts->links() }}
</div>
@endsection