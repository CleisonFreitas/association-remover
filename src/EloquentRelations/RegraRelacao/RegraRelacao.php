<?php
declare(strict_types=1);

namespace CleisonFreitas\AssociationControl\EloquentRelations\RegraRelacao;

use CleisonFreitas\AssociationControl\EloquentRelations\TipoRelacao\RegraBelongsToMany;
use CleisonFreitas\AssociationControl\EloquentRelations\TipoRelacao\RegraHasMany;
use CleisonFreitas\AssociationControl\EloquentRelations\TipoRelacao\RegraHasOne;
use CleisonFreitas\AssociationControl\Enums\TipoEloquentRelacoesEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegraRelacao
{
    protected string $relacaoCaminho;

    public function __construct(private string $relacao)
    {
        $this->relacaoCaminho = Str::after($relacao, 'Illuminate\\Database\\Eloquent\\Relations\\');
    }

    /**
     * Remover relacionamento
     * 
     * @param Model $model
     * @return void;
     */
    public function deletar(Model $model, string $relacao): void
    {
        $regraRelacao = match ($this->relacaoCaminho) {
            TipoEloquentRelacoesEnum::BELONGSTOMANY->value => new RegraBelongsToMany(),
            TipoEloquentRelacoesEnum::HASMANY->value => new RegraHasMany(),
            TipoEloquentRelacoesEnum::HASONE->value => new RegraHasOne(),
            default => throw new \InvalidArgumentException('Tipo de relacionamento ' . $this->relacaoCaminho . ' não encontrado! Relação: ' . $relacao),
        };

        $regraRelacao->eliminar($model, $relacao);
    }
}
