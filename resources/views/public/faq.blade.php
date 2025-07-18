@extends('layouts.public')
@section('title')
FAQ
@endsection
@section('content')

<div class="bg-[#E07F61] px-4 border-2 border-[#1b1b1b] rounded-md mb-8 md:w-full w-[95%] mx-auto">
    <div class="mx-auto grid md:grid-cols-2 grid-cols-1 items-center gap-8">
        <div class="space-y-6 md:pl-16 pl-0">
            <h1 class="text-4xl font-bold text-gray-900 bg-yellow-200 inline-flex px-2">
                Frequently asked questions
            </h1>
            <h2 class="text-lg text-[gray-700]">
                Cari tau syarat ketentuan, informasi program dan informasi lainnya dibawah!
            </h2>
        </div>

        <div class="flex justify-center">
            <img class="max-w-full w-3/4 md:w-[80%] lg:w-[70%]" src="{{ asset('banner.png') }}" alt="Promotional" />
        </div>

    </div>
</div>


<div class="bg-[#388571] px-4 border-2 border-[#1b1b1b] rounded-md mb-8 md:w-full w-[95%] mx-auto text-white">
    <div class="mx-auto items-center gap-8 my-8">

        <div id="accordion-open" data-accordion="open">
            <!-- Item 1 -->
            <h2 id="accordion-open-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-white border border-b-0 border-[#2e6659] rounded-t-xl focus:ring-2 focus:ring-white bg-transparent hover:bg-[#2e6659] gap-3"
                    data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                    aria-controls="accordion-open-body-1">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 me-2 shrink-0 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg> What is Flowbite?
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                <div class="p-5 border border-b-0 border-[#2e6659] bg-[#388571] text-gray-100">
                    <p class="mb-2">Flowbite is an open-source library of interactive components built on top of
                        Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                    <p>Check out this guide to learn how to <a href="/docs/getting-started/introduction/"
                            class="text-white underline hover:text-gray-200">get started</a> and start developing
                        websites even faster.</p>
                </div>
            </div>

            <!-- Item 2 -->
            <h2 id="accordion-open-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-white border border-b-0 bg-transparent border-[#2e6659] focus:ring-2 focus:ring-white hover:bg-[#2e6659] gap-3"
                    data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                    aria-controls="accordion-open-body-2">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 me-2 shrink-0 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg> Is there a Figma file available?
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                <div class="p-5 border border-b-0 border-[#2e6659] bg-[#388571] text-gray-100">
                    <p class="mb-2">Flowbite is first conceptualized and designed using Figma. Everything in the library
                        has a design equivalent.</p>
                    <p>Check the <a href="https://flowbite.com/figma/"
                            class="text-white underline hover:text-gray-200">Figma design system</a> for more info.</p>
                </div>
            </div>

            <!-- Item 3 -->
            <h2 id="accordion-open-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-white border border-[#2e6659] bg-transparent focus:ring-2 focus:ring-white hover:bg-[#2e6659] gap-3"
                    data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                    aria-controls="accordion-open-body-3">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 me-2 shrink-0 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg> Differences between Flowbite and Tailwind UI
                    </span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                <div class="p-5 border border-t-0 border-[#2e6659] bg-[#388571] text-gray-100">
                    <p class="mb-2">Flowbite is open-source under the MIT license, while Tailwind UI is a paid product.
                    </p>
                    <p class="mb-2">We recommend using both for a powerful development experience.</p>
                    <ul class="list-disc pl-5">
                        <li><a href="https://flowbite.com/pro/"
                                class="text-white underline hover:text-gray-200">Flowbite Pro</a></li>
                        <li><a href="https://tailwindui.com/" class="text-white underline hover:text-gray-200">Tailwind
                                UI</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection