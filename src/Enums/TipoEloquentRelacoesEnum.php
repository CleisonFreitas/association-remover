<?php

namespace CleisonFreitas\AssociationControl\Enums;

enum TipoEloquentRelacoesEnum: string
{
    case BELONGSTOMANY = 'BelongsToMany';
    case HASMANY = 'HasMany';
    case HASONE = 'HasOne';

}
