@extends('layouts.user')
@section('title')
Contact
@endsection
@section('content')
<div class="bg-[#F8DD8B] px-4 border-2 border-[#1b1b1b] rounded-md mb-8 md:w-full w-[95%] mx-auto">
    <div class="mx-auto items-center gap-8 my-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center my-8">
            Hubungi <span class="bg-[#E07F61] px-2 text-white">Kami</span>
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
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Kategori Pertanyaan</label>
                        <select class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm" name="category">
                            <option>Pilih Kategori</option>
                            <option value="umum">Umum</option>
                            <option value="teknis">Teknis</option>
                            <option value="lainnya">Lainnya</option>
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