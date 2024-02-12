<?php
declare(strict_types=1);

namespace CleisonFreitas\AssociationControl\EloquentRelations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class MultiServicosRelacoes
{
    /**
     * Removendo registros de relação n x n
     * 
     * @param Model $model
     * @param string $relacao
     * @return bool
     */
    public function removerBelongsToMany(Model $model, string $relacao): bool
    {
        try {
            return $model->$relacao()->detach();
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    /**
     * Removendo registros de relação 1 x n
     * 
     * @param Model $model
     * @param string $relacao
     * @return bool
     */
    public function removerHasMany(Model $model, string $relacao): bool
    {
        try {
            foreach ($model->$relacao as $relacionamento) {
                $relacionamento->delete();
            }
            return true;
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    /**
     * Removendo registro de relação 1 x 1
     * 
     * @param Model $model
     * @param string $relacao
     * @return bool
     */
    public function removerHasOne(Model $model, string $relacao): bool
    {
        try {
            return $model->$relacao()->delete();
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }
}
