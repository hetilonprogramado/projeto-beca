<div>
    <h1 class="text-2xl font-bold mb-4">Clientes</h1>
    <button class="mb-4 bg-blue-500 text-white px-3 py-1 rounded">+ Adicionar Cliente</button>

    <div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">
        <input wire:model="nome" required placeholder="Nome" class="campo">
        <input wire:model="phone" required placeholder="Telefone" class="campo">
        <input wire:model="email" required placeholder="Email" class="campo">
        <input wire:model="address" required placeholder="Endereço" class="campo">
        <input type="date" wire:model="data_nasc" required class="campo">
        <input type="date" wire:model="prospeccao" require class="campo">
        <button class="bg-green-500 text-white px-3 py-1 rounded mt-2" type="submit" wire:click.prevent="salvar" wire:target="salvar" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="salvar">Salvar</span>
            <i class="fas fa-spinner fa-spin mr-2" wire:loading wire:target="salvar"></i>
            <span wire:loading wire:target="salvar">Salvando...</span>
        </button>
            <button class="bg-gray-500 text-white px-3 py-1 rounded">Cancelar</button>
    </div>

    <table class="w-full bg-white text-black rounded">
        <thead>
            <tr>
                <th class="p-2">Nome</th>
                <th class="p-2">Telefone</th>
                <th class="p-2">Email</th>
                <th class="p-2">Endereço</th>
                <th class="p-2">Nascimento</th>
                <th class="p-2">Prospecção</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $cliente)
            <tr class="border-t">
                <td class="p-2">{{ $cliente->nome }}</td>
                <td class="p-2">{{ $cliente->phone }}</td>
                <td class="p-2">{{ $cliente->email }}</td>
                <td class="p-2">{{ $cliente->address }}</td>
                <td class="p-2">{{ \Carbon\Carbon::parse($cliente->data_nasc)->format('d/m/Y') }}</td>
                <td class="p-2">{{ \Carbon\Carbon::parse($cliente->prospeccao)->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
