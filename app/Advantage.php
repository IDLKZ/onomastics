<?php

namespace App;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $language_id
 * @property string $img
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 * @property Language $language
 */
class Advantage extends Model
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
    protected $fillable = ['language_id', 'img', 'title', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public static function createData($request){
        $input = $request->all();
        $model = new self();
        $input["img"] = File::createFile($request,"img","/uploads/advantage/",$request->title);
        return $model->fill($input)->save();
    }

    public static function updateData($request,$model){
        $input = $request->all();
        $input["img"] = File::updateFile($model->img,$request,"img","/uploads/advantage/",$request->title);
        return $model->update($input);

    }
}
