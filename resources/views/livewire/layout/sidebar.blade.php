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
                <ul class="space-y-2">
                    <li><a href="{{ url('dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-chart-dashboard w-5"></i><span>Dashboard</span></a></li>
                    <li><a href="{{ url('cliente') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-users w-5"></i><span>Alunos</span></a></li>
                    <li><a href="{{ url('empresa') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-school w-5"></i><span>Empresas</span></a></li>
                    <li><a href="{{ url('produtos') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-box w-5"></i><span>Produtos</span></a></li>
                    <li><a href="{{ url('matricula') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-file-signature w-5"></i><span>Matrículas</span></a></li>
                    <li><a href="{{ url('curso') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-book w-5"></i><span>Cursos</span></a></li>
                    <li><a href="{{ url('turma') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-chalkboard-teacher w-5"></i><span>Turmas</span></a></li>
                    <li><a href="{{ url('sala') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-chalkboard-teacher w-5"></i><span>Salas</span></a></li>
                    <li><a href="{{ url('grupo-usuario') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-user-cog w-5"></i><span>Grupos de Usuário</span></a></li>
                    <li><a href="{{ url('usuario') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-700 hover:text-white transition-all"><i class="fas fa-user-cog w-5"></i><span>Usuários</span></a></li>
                </ul>
            </nav>

            <div class="p-4">
                <a href="{{ route('logout') }}" wire:navigate class="w-full flex items-center justify-center space-x-2 p-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </a>
            </div>
        </div>
</div>
