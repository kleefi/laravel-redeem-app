@extends('layouts.admin')
@section('title','Dashboard')
@section('content')

<div class="grid md:grid-cols-3 grid-cols-1 gap-8">
    <div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6 border border-[#1b1b1b]">
        <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                    <i class="fa-solid fa-users w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
                </div>
                <div>
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">
                        {{ $redeems }}
                    </h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total participants</p>
                </div>
            </div>
            @php
            if ($redeemsLastMonth > 0) {
            $growth = (($redeemsThisMonth - $redeemsLastMonth) / $redeemsLastMonth) * 100;
            } else {
            $growth = $redeemsThisMonth > 0 ? 100 : 0;
            }

            if ($growth > 0) {
            $colorClass = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
            $icon = 'fa-arrow-up';
            } elseif ($growth < 0) { $colorClass='bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' ;
                $icon='fa-arrow-down' ; } else {
                $colorClass='bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' ; $icon='fa-minus' ; }
                @endphp <div>
                <span class="{{ $colorClass }} text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md">
                    <i class="fa-solid {{ $icon }} pr-2"></i>
                    {{ number_format($growth, 2) }}%
                </span>
        </div>
    </div>

    <div class="grid grid-cols-2 mb-4">
        <dl class="flex items-center">
            <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">This month</dt>
            <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{$redeemsThisMonth}}</dd>
        </dl>
        <dl class="flex items-center justify-end">
            <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Last month</dt>
            <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{ $redeemsLastMonth }}</dd>
        </dl>
    </div>

    <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
        <div class="flex justify-between items-center pt-5">
            <a href="{{ route('redeems.index') }}"
                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:underline py-2">
                See participants <i class="fa-solid fa-angle-right pl-2"></i>
            </a>
        </div>
    </div>
</div>

<!-- divider -->


<div class="w-full bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6 border border-[#1b1b1b]">
    <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                <i class="fa-solid fa-users w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
            </div>
            <div>
                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">
                    {{ $contacts }}
                </h5>
                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total contacts</p>
            </div>
        </div>
        @php
        if ($contactsLastMonth > 0) {
        $growth = (($contactsThisMonth - $contactsLastMonth) / $contactsLastMonth) * 100;
        } else {
        $growth = $contactsThisMonth > 0 ? 100 : 0;
        }

        if ($growth > 0) {
        $colorClass = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
        $icon = 'fa-arrow-up';
        } elseif ($growth < 0) { $colorClass='bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' ;
            $icon='fa-arrow-down' ; } else { $colorClass='bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300'
            ; $icon='fa-minus' ; } @endphp <div>
            <span class="{{ $colorClass }} text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md">
                <i class="fa-solid {{ $icon }} pr-2"></i>
                {{ number_format($growth, 2) }}%
            </span>
    </div>
</div>

<div class="grid grid-cols-2 mb-4">
    <dl class="flex items-center">
        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">This month</dt>
        <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{$contactsThisMonth}}</dd>
    </dl>
    <dl class="flex items-center justify-end">
        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Last month</dt>
        <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{ $contactsLastMonth }}</dd>
    </dl>
</div>

<div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-between items-center pt-5">
        <a href="{{ route('contacts.index') }}"
            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:underline py-2">
            See contacts <i class="fa-solid fa-angle-right pl-2"></i>
        </a>
    </div>
</div>
</div>
</div>
@endsection