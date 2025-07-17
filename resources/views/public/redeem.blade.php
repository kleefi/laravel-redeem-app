@extends('layouts.user')
@section('title')
Redeem Code
@endsection
@section('content')
<div class="bg-[#F8DD8B] px-4 border-2 border-[#1b1b1b] rounded-md mb-8 md:w-full w-[95%] mx-auto">
    <div class="mx-auto items-center gap-8 my-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center my-8">
            Redeem <span class="bg-[#E07F61] px-2 text-white">Code</span>
        </h2>
        <div class="max-w-[75%] mx-auto">
            <form action="#" method="POST">
                @csrf
                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Nama Lengkap</label>
                        <input class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm" type="text"
                            name="name" autocomplete="off">
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Provinsi</label>
                        <select class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm" name="category">
                            <option>Pilih Provinsi</option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Kabupaten/Kota</label>
                        <select class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm" name="category">
                            <option>Pilih Kabupaten/Kota</option>
                        </select>
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Kecamatan</label>
                        <select class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm" name="category">
                            <option>Pilih Kecamatan</option>
                        </select>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Email</label>
                        <input class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm" type="email"
                            name="email" autocomplete="off">
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">No HP</label>
                        <input class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm"
                            type="number" name="phone" autocomplete="off">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Kode Unik</label>
                        <input class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm" type="text"
                            name="unique_code" autocomplete="off">
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Source</label>
                        <select class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm" name="source">
                            <option>Pilih Source</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Facebook">Facebook</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Pesan / Pertanyaan</label>
                        <textarea
                            class="w-full h-24 rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm"></textarea>
                    </div>
                </div>
                <button
                    class="block w-1/2 mx-auto bg-blue-800 border border-[#1b1b1b] text-white font-semibold px-6 py-2 rounded-md hover:opacity-90 transition mt-4">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection