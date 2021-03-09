<?php

namespace App;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $img
 * @property string $title
 * @property string $alias
 * @property string $created_at
 * @property string $updated_at
 */
class Partner extends Model
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
    protected $fillable = ['img', 'title', 'alias', 'created_at', 'updated_at'];


    public static function createData($request){
        $model = new self();
        $input = $request->all();
        $input["img"] = File::createFile($request,"img","/uploads/partner/",$request->title);
        return $model->fill($input)->save();
    }

}
