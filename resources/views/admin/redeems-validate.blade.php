@extends('layouts.admin')
@section('title','Validate Redeem')
@section('content')

<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Validate Redeem - <span class="uppercase">{{ $redeem->unique_code }}</span>
    </h2>

    {{-- Flash Message --}}
    @if(session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="mb-4 bg-green-500 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="mb-4 bg-red-500 text-white px-4 py-2 rounded transition duration-300 ease-in-out">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('redeems.validate.update', $redeem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border rounded p-2">
                @foreach(['pending', 'process', 'done'] as $status)
                <option value="{{ $status }}" {{ $redeem->status === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Reward</label>
            <select name="reward_id" class="w-full border rounded p-2">
                <option value="">-- Pilih Reward --</option>
                @foreach($rewards as $reward)
                <option value="{{ $reward->id }}" {{ $redeem->reward_id === $reward->id ? 'selected' : '' }}>
                    {{ $reward->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Catatan Admin</label>
            <textarea name="admin_notes" rows="3"
                class="w-full border rounded p-2">{{ old('admin_notes', $redeem->admin_notes) }}</textarea>
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Update</button>

        <a href="{{ route('redeems.index') }}" class="ml-4 text-gray-700 hover:underline hover:text-gray-900">Cancel</a>
    </form>
</div>
@endsection