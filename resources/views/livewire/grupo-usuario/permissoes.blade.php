<div id="permissoesContent" class="p-6">
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <button onclick="showScreen('grupos')" class="text-gray-500 hover:text-gray-700 transition-colors">
                    <i class="fas fa-arrow-left text-xl"></i>
                </button>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Gerenciar Permissões</h2>
                    <p class="text-sm text-gray-600">Grupo: <span id="nomeGrupoPermissoes" class="font-medium text-purple-600"></span></p>
                </div>
            </div>                        
        </div>
                    
        <div class="p-6">
            <!-- Controles Gerais -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-1">Controles Gerais</h3>
                        <p class="text-sm text-gray-600">Ações rápidas para todas as permissões</p>
                    </div>
                    <div class="flex space-x-3">
                        <button onclick="marcarTodasPermissoes(true)" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all text-sm">
                            <i class="fas fa-check-double mr-1"></i>Marcar Todas
                        </button>
                        <button onclick="marcarTodasPermissoes(false)" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all text-sm">
                            <i class="fas fa-times mr-1"></i>Desmarcar Todas
                        </button>
                    </div>
                </div>
            </div>

            <!-- Módulos de Permissões -->
            <div class="space-y-6">
                <!-- Dashboard -->
                <div class="permission-card border border-gray-200 rounded-lg overflow-hidden">
                    <div class="module-header p-4 border-b">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-chart-dashboard text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Dashboard</h3>
                                    <p class="text-sm text-gray-600">Acesso ao painel principal e relatórios</p>
                                </div>
                            </div>
                            <button onclick="toggleModulePermissions('dashboard')" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                <i class="fas fa-chevron-down mr-1"></i>Expandir
                            </button>
                        </div>
                    </div>
                    <div id="dashboard-permissions" class="p-4 space-y-3">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-eye text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Visualizar Dashboard</span>
                                    <p class="text-xs text-gray-600">Acesso ao painel principal</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="dashboard.view" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-chart-bar text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Relatórios Financeiros</span>
                                    <p class="text-xs text-gray-600">Acesso aos relatórios de receitas e despesas</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="dashboard.reports" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Clientes -->
                <div class="permission-card border border-gray-200 rounded-lg overflow-hidden">
                    <div class="module-header p-4 border-b">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-users text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Clientes</h3>
                                    <p class="text-sm text-gray-600">Gerenciamento de clientes e alunos</p>
                                </div>
                            </div>
                            <!-- <button onclick="toggleModulePermissions('clientes')" class="text-green-600 hover:text-green-800 text-sm font-medium">
                                <i class="fas fa-chevron-down mr-1"></i>Expandir
                            </button> -->
                            <button 
                                wire:click="toggleModulo('clientes')" 
                                class="text-green-600 hover:text-green-800 text-sm font-medium">
                                @if(in_array('clientes', $modulosAbertos))
                                    <i class="fas fa-chevron-up mr-1"></i> Recolher
                                @else
                                    <i class="fas fa-chevron-down mr-1"></i> Expandir
                                @endif
                            </button>
                        </div>
                    </div>
                    <div id="clientes-permissions" class="p-4 space-y-3 hidden">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-eye text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Visualizar Clientes</span>
                                    <p class="text-xs text-gray-600">Ver lista e detalhes dos clientes</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="clientes.view">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-plus text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Criar Clientes</span>
                                    <p class="text-xs text-gray-600">Cadastrar novos clientes</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="clientes.create">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-edit text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Editar Clientes</span>
                                    <p class="text-xs text-gray-600">Modificar dados dos clientes</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="clientes.edit">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-trash text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Excluir Clientes</span>
                                    <p class="text-xs text-gray-600">Remover clientes do sistema</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="clientes.delete">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Cursos -->
                <div class="permission-card border border-gray-200 rounded-lg overflow-hidden">
                    <div class="module-header p-4 border-b">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-book text-purple-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Cursos</h3>
                                    <p class="text-sm text-gray-600">Gerenciamento de cursos e disciplinas</p>
                                </div>
                            </div>
                            <button onclick="toggleModulePermissions('cursos')" class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                                <i class="fas fa-chevron-down mr-1"></i>Expandir
                            </button>
                        </div>
                    </div>
                    <div id="cursos-permissions" class="p-4 space-y-3 hidden">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-eye text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Visualizar Cursos</span>
                                    <p class="text-xs text-gray-600">Ver lista e detalhes dos cursos</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="cursos.view">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-plus text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Criar Cursos</span>
                                        <p class="text-xs text-gray-600">Cadastrar novos cursos</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="cursos.create">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-edit text-gray-600"></i>
                                <div>
                                    <span class="font-medium text-gray-800">Editar Cursos</span>
                                    <p class="text-xs text-gray-600">Modificar cursos existentes</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" data-permission="cursos.edit">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Matrículas -->
                <div class="permission-card border border-gray-200 rounded-lg overflow-hidden">
                    <div class="module-header p-4 border-b">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-file-signature text-orange-600"></i>
                                </div>
                            <div>
                            <h3 class="font-semibold text-gray-800">Matrículas</h3>
                            <p class="text-sm text-gray-600">Gerenciamento de matrículas e pagamentos</p>
                        </div>
                    </div>
                    <button onclick="toggleModulePermissions('matriculas')" class="text-orange-600 hover:text-orange-800 text-sm font-medium">
                        <i class="fas fa-chevron-down mr-1"></i>Expandir
                    </button>
                </div>
            </div>
            <div id="matriculas-permissions" class="p-4 space-y-3 hidden">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-eye text-gray-600"></i>
                        <div>
                            <span class="font-medium text-gray-800">Visualizar Matrículas</span>
                            <p class="text-xs text-gray-600">Ver lista de matrículas</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" data-permission="matriculas.view">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-plus text-gray-600"></i>
                        <div>
                            <span class="font-medium text-gray-800">Criar Matrículas</span>
                            <p class="text-xs text-gray-600">Realizar novas matrículas</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" data-permission="matriculas.create">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-dollar-sign text-gray-600"></i>
                        <div>
                            <span class="font-medium text-gray-800">Gerenciar Pagamentos</span>
                            <p class="text-xs text-gray-600">Controlar pagamentos e inadimplência</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" data-permission="matriculas.payments">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Usuários e Grupos -->
        <div class="permission-card border border-gray-200 rounded-lg overflow-hidden">
            <div class="module-header p-4 border-b">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users-cog text-red-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Usuários e Grupos</h3>
                            <p class="text-sm text-gray-600">Administração de usuários e permissões</p>
                        </div>
                    </div>
                    <button onclick="toggleModulePermissions('usuarios')" class="text-red-600 hover:text-red-800 text-sm font-medium">
                        <i class="fas fa-chevron-down mr-1"></i>Expandir
                    </button>
                </div>
            </div>
            <div id="usuarios-permissions" class="p-4 space-y-3 hidden">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-eye text-gray-600"></i>
                        <div>
                            <span class="font-medium text-gray-800">Visualizar Usuários</span>
                            <p class="text-xs text-gray-600">Ver lista de usuários do sistema</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" data-permission="usuarios.view">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-user-plus text-gray-600"></i>
                        <div>
                            <span class="font-medium text-gray-800">Criar Usuários</span>
                            <p class="text-xs text-gray-600">Cadastrar novos usuários</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" data-permission="usuarios.create">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-users-cog text-gray-600"></i>
                        <div>
                            <span class="font-medium text-gray-800">Gerenciar Grupos</span>
                            <p class="text-xs text-gray-600">Criar e editar grupos de usuários</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" data-permission="usuarios.groups">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-shield-alt text-gray-600"></i>
                        <div>
                            <span class="font-medium text-gray-800">Gerenciar Permissões</span>
                            <p class="text-xs text-gray-600">Definir permissões de grupos</p>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" data-permission="usuarios.permissions">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumo de Permissões -->
    <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <div class="flex items-center space-x-2 mb-3">
            <i class="fas fa-info-circle text-blue-600"></i>
            <h4 class="font-semibold text-blue-800">Resumo das Permissões</h4>
        </div>
        <div id="resumoPermissoes" class="text-sm text-blue-700">
            <span id="totalPermissoes">0</span> permissões ativas de <span id="totalPermissoesDisponiveis">0</span> disponíveis
        </div>
    </div>
</div>
</div>
</div>