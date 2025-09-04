<div id="matriculasContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Gerenciar Matrículas</h2>
                        <a href="{{route('matricula.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                            <i class="fas fa-plus mr-2"></i>Nova Matrícula
                        </a>
                    </div>
                    
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b">
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Aluno</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Curso</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Data Matrícula</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Valor</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">João Silva</td>
                                        <td class="py-3 px-4">JavaScript Avançado</td>
                                        <td class="py-3 px-4">10/01/2024</td>
                                        <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Ativa</span></td>
                                        <td class="py-3 px-4">R$ 299,00</td>
                                        <td class="py-3 px-4">
                                            <button class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-eye"></i></button>
                                            <button class="text-green-500 hover:text-green-700 mr-2"><i class="fas fa-edit"></i></button>
                                            <button wire:click="" class="text-red-500 hover:text-red-700"><i class="fas fa-times"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
