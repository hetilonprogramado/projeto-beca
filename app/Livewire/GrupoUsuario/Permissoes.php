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

    public function mount($grupoId = null)
    {
        $this->grupoId = $grupoId ?? 1; // fallback caso não seja passado
        $this->carregarMenus();
    }

    private function carregarMenus()
    {
        $menus = Menu::where('status_id', 1)
            ->orderBy('tipo')
            ->orderBy('id')
            ->get();

        $grouped = $menus->groupBy('tipo');

        $this->modulos = [];
        foreach ($grouped as $tipo => $itens) {
            $this->modulos[] = [
                'id' => "tipo_$tipo",
                'nome' => $this->getNomeTipo($tipo),
                'descricao' => $this->getDescricaoTipo($tipo),
                'icone' => $this->getIconeTipo($tipo),
                'cor' => $this->getCorTipo($tipo),
                'permissoes' => $itens->map(function ($menu) {
                    $permissao = ModelsPermissoes::where('menu_id', $menu->id)
                        ->where('grupos_user_id', $this->grupoId)
                        ->first();

                    $this->permissoesMarcadas["menu_{$menu->id}"] = $permissao && $permissao->status_id === 1;

                    return [
                        'id' => "menu_{$menu->id}",
                        'nome' => $menu->nome,
                        'descricao' => "Permissão para acessar {$menu->nome}",
                        'rota' => $menu->rota,
                        'icone' => $menu->icone,
                    ];
                })->toArray()
            ];
        }

        foreach ($this->modulos as $modulo) {
            $this->abertos[$modulo['id']] = false;
        }
    }

    private function getNomeTipo($tipo)
    {
        return match ($tipo) {
            1 => 'Cadastros',
            2 => 'Configurações',
            3 => 'Estoque',
            default => 'Outros',
        };
    }

    private function getDescricaoTipo($tipo)
    {
        return match ($tipo) {
            1 => 'Módulos de cadastro de alunos, matrículas e cursos',
            2 => 'Configurações do sistema e administração',
            3 => 'Gerenciamento de produtos e estoque',
            default => 'Módulos diversos',
        };
    }

    private function getIconeTipo($tipo)
    {
        return match ($tipo) {
            1 => 'fas fa-folder-open text-blue-600',
            2 => 'fas fa-cogs text-purple-600',
            3 => 'fas fa-boxes text-green-600',
            default => 'fas fa-puzzle-piece text-gray-600',
        };
    }

    private function getCorTipo($tipo)
    {
        return match ($tipo) {
            1 => 'bg-blue-100',
            2 => 'bg-purple-100',
            3 => 'bg-green-100',
            default => 'bg-gray-100',
        };
    }

    /**
     * Novo método que salva a permissão manualmente
     */
    public function salvarPermissao($menuId, $checked)
    {
        $menuId = (int) str_replace('menu_', '', $menuId);

        $permissao = ModelsPermissoes::firstOrNew([
            'grupos_user_id' => $this->grupoId,
            'menu_id' => $menuId,
        ]);

        if ($checked) {
            $permissao->status_id = 1; // ativo
            $permissao->save();
        } else {
            if ($permissao->exists) {
                $permissao->status_id = 2; // bloqueado
                $permissao->save();
            }
        }

        // Atualiza localmente para manter o estado certo no checkbox
        $this->permissoesMarcadas["menu_{$menuId}"] = (bool) $checked;
    }

    public function marcarTodas($status)
    {
        foreach ($this->modulos as $modulo) {
            foreach ($modulo['permissoes'] as $p) {
                $this->salvarPermissao($p['id'], $status);
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
