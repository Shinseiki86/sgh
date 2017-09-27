<?php
namespace SGH\Models;

use SGH\Traits\ModelRulesTrait;
use SGH\Traits\SoftDeletesTrait;
use SGH\Traits\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;

class ModelWithSoftDeletes extends Model
{
    use SoftDeletesTrait, RelationshipsTrait, ModelRulesTrait;

}