<?php
declare(strict_types=1);

namespace CleisonFreitas\AssociationControl\EloquentRelations\TipoRelacao;

use CleisonFreitas\AssociationControl\Contracts\RemoverRelacaoInterface;
use CleisonFreitas\AssociationControl\EloquentRelations\MultiServicosRelacoes;
use Illuminate\Database\Eloquent\Model;

class RegraHasOne extends MultiServicosRelacoes implements RemoverRelacaoInterface
{
    /**
     * Eliminar relacionamento por tipo
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $relacao
     * @return bool
     */
    public function eliminar(Model $model, string $relacao): bool
    {
        return $this->removerHasOne($model, $relacao);
    }
}