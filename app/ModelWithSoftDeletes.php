<?php

namespace SGH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelWithSoftDeletes extends Model
{
    use SoftDeletes;
    
    /**
     * Perform the actual delete query on this model instance.
     * 
     * @return void
     */
    protected function runSoftDelete()
    {
        $query = $this->newQuery()->where($this->getKeyName(), $this->getKey());

        $this->{$this->getDeletedAtColumn()} = $time = $this->freshTimestamp();

        $query->update([
           $this->getDeletedAtColumn() => $this->fromDateTime($time),
           'deleted_by' => auth()->user()->username
            //'deleted_by' => (\Auth::id()) ?: null
        ]);

    }

}
