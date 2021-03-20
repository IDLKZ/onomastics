<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $icon
 * @property string $link
 * @property string $created_at
 * @property string $updated_at
 */
class Social extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['icon', 'link', 'created_at', 'updated_at'];



    public static function createData($request){
        $model = new self();
        $model->fill($request->all());
        return $model->save();
    }

}
