<div id="produtosContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Gerenciar Produtos</h2>
                        <a href="{{route('produtos.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                            <i class="fas fa-plus mr-2"></i>Novo Produto
                        </a>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="border rounded-lg p-4 hover:shadow-md transition-all">
                                <div class="w-full h-32 bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg mb-4 flex items-center justify-center">
                                    <i class="fas fa-laptop-code text-white text-3xl"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Curso de JavaScript</h3>
                                <p class="text-gray-600 text-sm mb-3">Aprenda JavaScript do básico ao avançado</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-blue-600">R$ 299,00</span>
                                    <div class="space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border rounded-lg p-4 hover:shadow-md transition-all">
                                <div class="w-full h-32 bg-gradient-to-r from-green-400 to-green-600 rounded-lg mb-4 flex items-center justify-center">
                                    <i class="fas fa-python text-white text-3xl"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Curso de Python</h3>
                                <p class="text-gray-600 text-sm mb-3">Domine Python para desenvolvimento web</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-green-600">R$ 349,00</span>
                                    <div class="space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
