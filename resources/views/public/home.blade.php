@extends('layouts.public')
@section('title')
Home
@endsection
@section('content')

<div class="bg-[#E07F61] px-4 border-2 border-[#1b1b1b] rounded-md mb-8 md:w-full w-[95%] mx-auto">
    <div class="mx-auto grid md:grid-cols-2 grid-cols-1 items-center gap-8">
        <div class="space-y-6 md:pl-16 pl-0">
            <h1 class="text-4xl font-bold text-gray-900 bg-yellow-200 inline-flex px-2 mt-6 md:mt-0">
                Buy and redeem code!
            </h1>
            <h2 class="text-lg text-[gray-700]">
                Beli produk kami, temukan kode unik di dalam kemasan, lalu masukkan di sini untuk klaim hadiah menarik.
                Yuk, ikutan sekarang!
            </h2>
            <div class="flex flex-wrap gap-4 mt-4">
                <a href="/redeem"
                    class="inline-flex items-center justify-center bg-blue-800 border border-[#1b1b1b] text-white font-semibold px-6 py-3 rounded-md hover:opacity-90 transition">
                    Redeem Code
                </a>

                <a href="/faq"
                    class="inline-flex items-center justify-center hover:border hover:border-gray-900 font-semibold px-6 py-3 rounded-md text-gray-800">
                    Learn More
                </a>
            </div>
        </div>

        <div class="flex justify-center">
            <img class="max-w-full w-3/4 md:w-[80%] lg:w-[70%]" src="{{ asset('banner.png') }}" alt="Promotional" />
        </div>

    </div>
</div>

<div class="grid md:grid-cols-[20%_80%] items-center mb-8">
    <div class="block mx-auto">
        <ul class="flex gap-4">
            <li><a class="bg-green-900 p-4 rounded-full text-white" href="#"> <i class="fab fa-facebook fa-lg"></i>
                </a></li>
            <li><a class="bg-green-900 p-4 rounded-full text-white" href="#"> <i class="fab fa-instagram fa-lg"></i>

                </a></li>
            <li><a class="bg-green-900 p-4 rounded-full text-white" href="#"> <i class="fab fa-x-twitter fa-lg"></i>
                </a></li>
        </ul>
    </div>
    <div>
        <hr class="border-4 rounded-md border-green-800 md:block hidden">
    </div>
</div>

<div class="bg-[#388571] px-4 border-2 border-[#1b1b1b] rounded-md mb-8 md:w-full w-[95%] mx-auto">
    <div class="mx-auto grid md:grid-cols-2 grid-cols-1 items-center gap-8 my-8">
        <div class="space-y-4 md:pl-16 pl-0">
            <h2 class="text-3xl font-bold text-white inline-flex ">
                About Campaign
            </h2>
            <p class="text-lg text-white">
                Campaign ini bertujuan untuk mengajak konsumen terlibat langsung dan tidak dipungut biaya. Untuk
                mengikuti campaign ini, kamu cukup membeli produk dan kirim kode dalam kemasan
            </p>
        </div>
        <div>
            <iframe class="rounded-md border-2 border-[#1b1b1b]" width="100%" height="315"
                src="https://www.youtube.com/embed/ilFg9XpDX8c?si=NcVWvBjGaOuXMqPK&amp;controls=0"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
</div>


<div class="bg-[#F8DD8B] px-4 border-2 border-[#1b1b1b] rounded-md mb-8 md:w-full w-[95%] mx-auto">
    <div class="mx-auto items-center gap-8 my-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center my-8">
            Pemenang <span class="bg-[#E07F61] px-2 text-white">Periode 2024</span>
        </h2>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide border-2 border-[#1b1b1b] bg-white rounded-md p-4">
                    <h3 class="text-lg font-semibold pb-2">Aulia Rahma</h3>
                    <p class="text-sm py-1 pl-4 border-l-2 border-l-yellow-400">
                        Awalnya nggak nyangka bisa dapet hadiah, tapi ternyata beneran dikirim! Kode uniknya gampang
                        ditemuin di kemasan.
                        Prosesnya cepat dan nggak ribet. Terima kasih!
                    </p>
                </div>

                <div class="swiper-slide border-2 border-[#1b1b1b] bg-white rounded-md p-4">
                    <h3 class="text-lg font-semibold pb-2">Budi Santoso</h3>
                    <p class="text-sm py-1 pl-4 border-l-2 border-l-yellow-400">
                        Campaign redeem ini keren banget! Baru beli 2 produk aja langsung bisa klaim poin. Websitenya
                        juga simpel dan responsif.
                        Good job tim!
                    </p>
                </div>

                <div class="swiper-slide border-2 border-[#1b1b1b] bg-white rounded-md p-4">
                    <h3 class="text-lg font-semibold pb-2">Citra Lestari</h3>
                    <p class="text-sm py-1 pl-4 border-l-2 border-l-yellow-400">
                        Senang banget bisa ikutan promo ini. Udah daftar dan masukkan kode, langsung muncul status
                        hadiahnya. Sukses terus ya!
                    </p>
                </div>

                <div class="swiper-slide border-2 border-[#1b1b1b] bg-white rounded-md p-4">
                    <h3 class="text-lg font-semibold pb-2">Dimas Aryo</h3>
                    <p class="text-sm py-1 pl-4 border-l-2 border-l-yellow-400">
                        Produk favorit plus bisa dapet hadiah? Siapa yang nolak! Kode uniknya mudah diakses dan gak
                        bikin ribet.
                        Sistemnya transparan, mantap!
                    </p>
                </div>

                <div class="swiper-slide border-2 border-[#1b1b1b] bg-white rounded-md p-4">
                    <h3 class="text-lg font-semibold pb-2">Eka Novita</h3>
                    <p class="text-sm py-1 pl-4 border-l-2 border-l-yellow-400">
                        Dari sekian banyak promo, ini salah satu yang paling jujur dan terpercaya. Saya udah dapet
                        hadiah langsung!
                        Prosesnya jelas dan user friendly banget.
                    </p>
                </div>
            </div>
            <div class="flex justify-between items-center mt-6 px-4">
                <div
                    class="w-[40px] h-[40px] swiper-button-prev custom-arrow bg-gray-500/50 text-white p-3 rounded-full shadow-md hover:bg-gray-700 transition cursor-pointer">
                    <i class="fas fa-chevron-left text-yellow-200"></i>
                </div>
                <div
                    class="swiper-button-next custom-arrow bg-gray-500/50 text-white p-3 rounded-full shadow-md hover:bg-gray-700 transition cursor-pointer">
                    <i class="fas fa-chevron-right text-yellow-200"></i>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

@endsection