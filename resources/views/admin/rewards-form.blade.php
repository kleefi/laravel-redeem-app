@extends('layouts.admin')
@section('title',isset($rewards)?'Edit Reward':'Add new reward')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex flex-col md:flex-row gap-6 max-w-6xl mx-auto px-4 py-8">
        <div class="w-full md:w-2/3 bg-white p-6 rounded-md shadow border border-gray-200">
            <h2 class="text-xl font-semibold mb-6">{{isset($rewards)?'Edit Reward':'Add new reward'}}</h2>
            <form action="{{ isset($rewards) ? route('rewards.update', $rewards->id) : route('rewards.store') }}"
                method="POST">
                @csrf
                @if(isset($rewards))
                @method('PUT')
                @endif
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" autocomplete="off"
                        value="{{ old('name', $rewards->name??'') }}"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="qty" id="qty" autocomplete="off"
                        value="{{ old('qty',$rewards->qty??'') }}"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="desc" id="desc" autocomplete="off"
                        value="{{ old('desc',$rewards->desc??'') }}"
                        class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>

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
                <div class="bg-red-600 text-white px-4 py-2 pt-2 rounded mt-3 max-w-md mx-auto">
                    <ul class="list-disc list-inside text-sm space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md text-sm font-medium transition duration-150">
                        {{ isset($rewards) ? 'Update' : 'Create' }}

                    </button>
                </div>
            </form>
        </div>

        <div
            class="hidden md:block w-full md:w-1/3 bg-gray-50 p-6 rounded-md shadow border border-gray-200 text-sm text-gray-700">
            <h3 class="text-lg font-semibold mb-4">Tips Pengisian</h3>
            <ul class="list-disc list-inside space-y-2">
                <li>Pastikan data yang disubmit tidak kosong</li>
                <li>Isi qty dengan jumlah hadiah</li>
                <li>Isi desc dengan informasi terkait hadiah</li>
            </ul>
        </div>
    </div>


</div>
@endsection