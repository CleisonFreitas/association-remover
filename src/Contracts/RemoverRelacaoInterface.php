<?php

namespace CleisonFreitas\AssociationControl\Contracts;
use Illuminate\Database\Eloquent\Model;

interface RemoverRelacaoInterface
{

    /**
     * @param Model $model
     * @param string $relacao
     */
    public function eliminar(Model $model, string $relacao): bool;
}
