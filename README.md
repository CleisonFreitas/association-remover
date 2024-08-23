# Association Remover

## How to apply
- Install the package
```
composer require cleisonfreitas/association-remover
```

## How to use
- After installing, just call GerenciarRelacaoTrait in your model and define which relations will be deleted after removing the record

### Example:
```php
class YourClassModel extends Model
{
    use SoftDeletes, HasFactory, GerenciarRelacaoTrait;

    protected array $relacionamentos = [
        'relationOne',
        'relationTow',
    ];

    ...
}
```

All the relations listed will be removed in case of this record been deleted.

## Important
If you define that some relation will be removed with GerenciarRelacaoTrait you have to apply the same feature to model/relation you mentioned.

## Example:
```php
class FirstModel extends Model
{
    use SoftDeletes, HasFactory, GerenciarRelacaoTrait;

    protected array $relacionamentos = [
        'seconModelRelation',
    ];

    ...
}

class SecondModel extends Model
{
    use SoftDeletes, HasFactory, GerenciarRelacaoTrait;

    protected array $relacionamentos = [];

    ...
}
```

- The relacionamentos attribute can be empty

To more information, send me an email: cleison51@hotmail.com