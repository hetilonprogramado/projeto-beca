<div id="dashboardContent" class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Total de Alunos</p>
                    <p class="text-3xl font-bold text-blue-600">1,234</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-graduate text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Cursos Ativos</p>
                    <p class="text-3xl font-bold text-green-600">45</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Matrículas Hoje</p>
                    <p class="text-3xl font-bold text-purple-600">28</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-signature text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-sm card-hover transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm">Receita Mensal</p>
                    <p class="text-3xl font-bold text-orange-600">R$ 89.5k</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm mb-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Evolução Financeira</h3>
        <div class="relative">
            <canvas id="financeChart" width="400" height="200"></canvas>
        </div>
        <div class="flex justify-center space-x-6 mt-4">
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                <span class="text-sm text-gray-600">Receitas</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                <span class="text-sm text-gray-600">Despesas</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                <span class="text-sm text-gray-600">Inadimplência</span>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Avisos Importantes</h3>
            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">3 novos</span>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-start space-x-4 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation text-white text-sm"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-red-800 mb-1">Sistema de Pagamentos Instável</h4>
                    <p class="text-red-700 text-sm mb-2">O gateway de pagamento está apresentando intermitências. Algumas transações podem falhar.</p>
                    <div class="flex items-center text-xs text-red-600">
                        <i class="fas fa-clock mr-1"></i>
                        <span>Há 15 minutos</span>
                        <span class="mx-2">•</span>
                        <span class="font-medium">Alta Prioridade</span>
                    </div>
                </div>
                <button class="text-red-500 hover:text-red-700 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-start space-x-4 p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded-lg">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-yellow-800 mb-1">Manutenção Programada</h4>
                    <p class="text-yellow-700 text-sm mb-2">Sistema ficará indisponível no domingo das 02h às 06h para atualizações de segurança.</p>
                    <div class="flex items-center text-xs text-yellow-600">
                        <i class="fas fa-clock mr-1"></i>
                        <span>Há 2 horas</span>
                        <span class="mx-2">•</span>
                        <span class="font-medium">Média Prioridade</span>
                    </div>
                </div>
                <button class="text-yellow-500 hover:text-yellow-700 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-start space-x-4 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-info text-white text-sm"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-blue-800 mb-1">Nova Funcionalidade Disponível</h4>
                    <p class="text-blue-700 text-sm mb-2">Agora você pode exportar relatórios financeiros em formato Excel. Acesse em Relatórios > Financeiro.</p>
                    <div class="flex items-center text-xs text-blue-600">
                        <i class="fas fa-clock mr-1"></i>
                        <span>Há 1 dia</span>
                        <span class="mx-2">•</span>
                        <span class="font-medium">Informativo</span>
                    </div>
                </div>
                <button class="text-blue-500 hover:text-blue-700 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-start space-x-4 p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-white text-sm"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-green-800 mb-1">Backup Realizado com Sucesso</h4>
                    <p class="text-green-700 text-sm mb-2">Backup automático dos dados foi concluído. Todos os dados estão seguros e atualizados.</p>
                    <div class="flex items-center text-xs text-green-600">
                        <i class="fas fa-clock mr-1"></i>
                        <span>Há 3 horas</span>
                        <span class="mx-2">•</span>
                        <span class="font-medium">Sucesso</span>
                    </div>
                </div>
                <button class="text-green-500 hover:text-green-700 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="mt-6 text-center">
            <button class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                Ver todos os avisos
                <i class="fas fa-arrow-right ml-1"></i>
            </button>
        </div>
    </div>
</div>