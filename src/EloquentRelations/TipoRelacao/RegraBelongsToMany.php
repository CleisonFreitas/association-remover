<?php
declare(strict_types=1);

namespace CleisonFreitas\AssociationControl\EloquentRelations\TipoRelacao;

use CleisonFreitas\AssociationControl\Contracts\RemoverRelacaoInterface;
use CleisonFreitas\AssociationControl\EloquentRelations\MultiServicosRelacoes;
use Illuminate\Database\Eloquent\Model;

class RegraBelongsToMany extends MultiServicosRelacoes implements RemoverRelacaoInterface
{
    /**
     * Eliminar relacionamento por tipo
     * 
     * @param Model $model
     * @param string $relacao
     * @return bool
     */
    public function eliminar(Model $model, string $relacao): bool
    {
        return $this->removerBelongsToMany($model, $relacao);
    }
}
