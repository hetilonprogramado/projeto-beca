<?php

namespace App\Livewire\GrupoUsuario;

use App\Models\Menu;
use App\Models\Permissoes as ModelsPermissoes;
use Livewire\Component;

class Permissoes extends Component
{
    public $modulos = [];
    public $abertos = [];
    public $permissoesMarcadas = [];

    public $grupoId;

    public function mount($grupoId = 1)
    {
        $this->grupoId = $grupoId;

        $menus = Menu::where('status_id', 1)
            ->orderBy('tipo')
            ->orderBy('id')
            ->get();

        foreach ($menus as $menu) {
            $this->modulos[] = [
                'id' => $menu->id,
                'nome' => $menu->nome,
                'descricao' => 'Permissões para ' . $menu->nome,
                'icone' => $menu->icone ?? 'bx bx-question-mark',
                'cor' => 'bg-gray-100',
                'permissoes' => [
                    [
                        'id' => "menu_{$menu->id}",
                        'nome' => "Acesso {$menu->nome}",
                        'descricao' => "Permissão de acesso ao menu {$menu->nome}"
                    ],
                ]
            ];

            // Checar se já existe e preencher marcado
            $permissao = ModelsPermissoes::where('menu_id', $menu->id)
                ->where('grupos_user_id', $this->grupoId)
                ->first();

            $this->permissoesMarcadas["menu_{$menu->id}"] = $permissao && $permissao->status_id === 1;
            $this->abertos[$menu->id] = false;
        }
    }

    public function updatedPermissoesMarcadas($value, $key)
    {
        $menuId = (int) str_replace('menu_', '', $key);

        // Buscar ou criar a permissão
        $permissao = ModelsPermissoes::firstOrNew([
            'grupos_user_id' => $this->grupoId,
            'menu_id' => $menuId,
        ]);

        if ($value) {
            // Criar se não existir ou reativar
            $permissao->status_id = 1; // Ativo
            $permissao->save();
        } else {
            // Se já existe, apenas atualiza para bloqueado
            if ($permissao->exists) {
                $permissao->status_id = 2; // Bloqueado
                $permissao->save();
            }
        }
    }

    public function marcarTodas($status)
    {
        foreach ($this->modulos as $modulo) {
            foreach ($modulo['permissoes'] as $p) {
                $this->permissoesMarcadas[$p['id']] = $status;
                $this->updatedPermissoesMarcadas($status, $p['id']);
            }
        }
    }

    public function toggleModulo($id)
    {
        $this->abertos[$id] = !$this->abertos[$id];
    }

    public function render()
    {
        return view('livewire.grupo-usuario.permissoes');
    }
}
