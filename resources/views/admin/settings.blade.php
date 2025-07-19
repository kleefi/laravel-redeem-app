@extends('layouts.admin')
@section('title','Settings')
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
    <a href="{{ route('settings.create') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 px-2 py-2 text-white m-4">Add
        new
        user</a>
    @if(isset($settings) && $settings->count())
    <table class="w-full text-sm text-left rtl:text-right text-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Registration Date</th>
                <th scope="col" class="px-6 py-3">Role</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr class="bg-white border-b border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap capitalize">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">{{ $setting->name }}</td>
                <td class="px-6 py-4">{{ $setting->email }}</td>
                <td class="px-6 py-4">{{ $setting->created_at->format('d F Y') }}</td>
                <td class="px-6 py-4 capitalize">
                    @if ($setting->role === 'admin')
                    <span class="bg-red-500 text-white px-2 rounded">{{ $setting->role }}</span>
                    @else
                    <span class="bg-gray-500 text-white px-2 rounded">{{ $setting->role }}</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
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
    {{ $settings->links() }}
</div>
@endsection