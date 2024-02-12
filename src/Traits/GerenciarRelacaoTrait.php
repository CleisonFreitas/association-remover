<?php
declare(strict_types=1);

namespace CleisonFreitas\AssociationControl\Traits;

use App\EloquentRelations\RegraRelacao\RegraRelacao;

trait GerenciarRelacaoTrait
{
    /**
     * Retorna a listagem de relacionamentos da Model ou listagem informada pelo operador
     */
    public function listeRelacoes(array $relacoes = []): array
    {
        if(count($relacoes) > 0) {
            return $relacoes;
        }
       return $this->relacionamentos;
    }

    /**
     * Removendo relacionamentos
     */
    public function removerRelacionamentos(array $relacionamentos = [])
    {
        $model = $this;
        $relacoes = collect($model->listeRelacoes($relacionamentos));
        
        if($relacoes->count() > 0) {
            $relacoes->each(function ($relacao) use ($model) {
                $tipoDeRelacao = get_class($model->$relacao());
                $removerRelacao = new RegraRelacao($tipoDeRelacao);
                $removerRelacao->deletar($model, $relacao);
            });
        }
    }
}
