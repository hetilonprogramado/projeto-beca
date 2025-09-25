<div class="fixed left-0 top-0 h-screen w-64 bg-white shadow-lg z-50
            flex flex-col justify-between">
    <div class="overflow-y-auto">
        <div class="p-6 border-b">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
                <div>
                    <h2 class="font-bold text-gray-800">Sistema Acadêmico</h2>
                    <p class="text-sm text-gray-600">Administração</p>
                </div>
            </div>
        </div>

        <nav class="p-4">
            <ul class="nav flex-column">
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ route($menu->rota) }}"
                           class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all
                           {{ request()->routeIs($menu->rota . '*') ? 'bg-blue-500 text-white shadow-md' : 'text-gray-700 hover:bg-blue-500 hover:text-white' }}">
                            <i class="{{ $menu->icone }}"></i>
                            <span>{{ $menu->nome }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="p-4">
            <a href="{{ route('logout') }}" wire:navigate
               class="w-full flex items-center justify-center space-x-2 p-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair</span>
            </a>
        </div>
    </div>
</div>
