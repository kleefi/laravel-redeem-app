<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/dashboard" @class([ 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group'
                    , 'bg-gray-200'=> request()->is('dashboard'),
                    ])>
                    <i class="fa-solid fa-chart-line w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('redeems.index') }}"
                    @class([ 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group' , 'bg-gray-200'=>
                    request()->is('dashboard/redeems'),
                    ])>
                    <i class="fa-solid fa-users w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Participants</span>
                </a>
            </li>
            <li>
                <a href="{{ route('contacts.index') }}"
                    @class([ 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group' , 'bg-gray-200'=>
                    request()->is('dashboard/contacts'),
                    ])>
                    <i class="fa-solid fa-envelope w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Contacts</span>
                </a>
            </li>
            <li>
                <a href="#" @class([ 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group'
                    , 'bg-gray-200'=> request()->is('dashboard/settings'),
                    ])>
                    <i class="fa-solid fa-user-gear w-5 h-5 text-gray-500 group-hover:text-gray-900"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i class="fa-solid fa-right-from-bracket w-5 h-5 text-gray-500"></i>
                        <span class="ms-3">Sign Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>