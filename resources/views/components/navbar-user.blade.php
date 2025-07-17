<nav class="mt-8 w-full mx-auto max-w-[1200px] px-4 md:px-0 z-50 bg-red">
    <div class="flex flex-wrap items-center justify-between px-6 md:px-0 py-4">
        <a href="#" class="flex items-center space-x-3">
            <span class="text-2xl font-bold text-gray-500">LOGO</span>
        </a>
        <button data-collapse-toggle="navbar" type="button"
            class="md:hidden p-2 text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-pink-300"
            aria-controls="navbar" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <div class="hidden w-full md:block md:w-auto" id="navbar">
            <ul class="block md:flex flex-col mt-4 md:flex-row md:space-x-2 md:mt-0 items-center font-medium">
                <li>
                    <a href="/"
                        class="{{ request()->is('/') ? 'text-blue-800 font-semibold' : 'text-gray-800 hover:text-blue-800' }} transition px-3 py-2">
                        HOME
                    </a>
                </li>
                <li>
                    <a href="/faq"
                        class="{{ request()->is('faq') ? 'text-blue-800 font-semibold' : 'text-gray-800 hover:text-blue-800' }} transition px-3 py-2">
                        FAQ
                    </a>
                </li>

                <!-- Contact -->
                <li>
                    <a href="/contact"
                        class="{{ request()->is('contact') ? 'text-blue-800 font-semibold' : 'text-gray-800 hover:text-blue-800' }} transition px-3 py-2">
                        CONTACT
                    </a>
                </li>
                <li>
                    <a href="/redeem"
                        class="inline-flex items-center justify-center bg-blue-800 border border-[#1b1b1b] text-white font-semibold px-6 py-3 rounded-md hover:opacity-90 transition">
                        REDEEM CODE
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>