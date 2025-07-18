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
            <form action="{{ route('redeem.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Nama Lengkap</label>
                        <input required class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm"
                            type="text" name="name" autocomplete="off" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Provinsi</label>
                        <select required class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm"
                            name="province">
                            <option value="" disabled selected>Pilih Provinsi</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                        </select>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Kabupaten/Kota</label>
                        <select required class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm"
                            name="city">
                            <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                            <option value="Jakarta Selatan">Jakarta Selatan</option>
                        </select>
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Kecamatan</label>
                        <select required class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm"
                            name="district">
                            <option value="" disabled selected>Pilih Kecamatan</option>
                            <option value="Gandaria Utara">Gandaria Utara</option>
                        </select>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Email</label>
                        <input required class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm"
                            type="email" name="email" autocomplete="off" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">No HP</label>
                        <input required class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm"
                            type="number" name="phone" autocomplete="off" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Kode Unik</label>
                        <input required class="w-full rounded-md border border-[#1b1b1b] bg-white py-2 px-2 text-sm"
                            type="text" name="unique_code" autocomplete="off" value="{{ old('unique_code') }}">
                    </div>
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Source</label>
                        <select required class="w-full rounded-md border border-[#1b1b1b] py-2 px-2 text-sm"
                            name="source">
                            <option value="" disabled selected>Pilih Source</option>
                            <option value="instagram">Instagram</option>
                            <option value="facebook">Facebook</option>
                            <option value="tikTok">TikTok</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 grid-cols-1 md:gap-8 gap-1">
                    <div>
                        <label class="flex my-3 text-sm text-gray-900 font-normal">Foto Kode Unik</label>
                        <label
                            class="flex h-48 w-full cursor-pointer flex-col items-center justify-center rounded-lg border border-[#1b1b1b] bg-gray-50 transition duration-300 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="mb-3 h-10 w-10 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4m0 0l-4 4m4-4l4 4m5 4v8m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                                <p class="mb-2 text-center text-sm text-gray-500">
                                    <span class="font-semibold">Klik untuk upload</span> atau tarik file ke sini
                                </p>
                                <p class="text-xs text-gray-500">PNG, JPG, JPEG (max. 2MB)</p>
                            </div>
                            <input required id="unique_code_image" accept="image/*" class="hidden" type="file"
                                name="unique_code_image">
                        </label>
                    </div>
                    <div>
                        <div id="preview-container" class="mt-4 hidden w-full border p-4 border-[#1b1b1b] rounded-md">
                            <img id="image-preview" src="" alt="Preview"
                                class="max-h-64 w-full rounded-lg object-contain" />
                        </div>
                    </div>
                </div>
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

                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded my-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button
                    class="block w-1/2 mx-auto bg-blue-800 border border-[#1b1b1b] text-white font-semibold px-6 py-2 rounded-md hover:opacity-90 transition mt-4">
                    Kirim
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    const inputFile = document.getElementById('unique_code_image');
    const previewContainer = document.getElementById('preview-container');
    const imagePreview = document.getElementById('image-preview');

    inputFile.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                imagePreview.setAttribute("src", this.result);
                previewContainer.classList.remove("hidden");
            });

            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add("hidden");
        }
    });
</script>
@endsection