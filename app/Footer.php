<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property integer $id
 * @property integer $language_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property Language $language
 */
class Footer extends Model
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
    protected $fillable = ['language_id', 'title', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public static function createData($request,$model = null){
        if($model){
            $footer = Footer::where("language_id",$request->language_id)->first();
            if($footer){
                $footer->delete();
            }
            return $model->update($request->all());

        }
        else{
            $footer = Footer::where("language_id",$request->language_id)->first();
            if($footer){
                $footer->delete();
            }
            $model = new self();
            return $model->fill($request->all())->save();
        }

    }
}
