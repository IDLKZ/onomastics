<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property integer $id
 * @property integer $language_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property Language $language
 */
class About extends Model
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
    protected $fillable = ['language_id', 'content', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public static function createData($request,$model = null){
        if($model){
            if($about = About::where("language_id",$request->language_id)->where("id","!=",$model->id)->first()){
                $about->delete();
            }
            return $model->update($request->all());
        }
        else{
            $model = new self();
            if($about = About::where("language_id",$request->language_id)->first()){
                $about->delete();
            }
            $model->fill($request->all());
            return $model->save();
        }

    }
}
