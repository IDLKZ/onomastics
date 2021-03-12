<?php

namespace App;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $img
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Book[] $books
 */
class Author extends Model
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
    protected $fillable = ['img', 'name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


    public static function createData($request){
        $model = new self();
        $input = $request->all();
        $input["img"] = File::createFile($request,"img","/uploads/author/",$request->name);
        return $model->fill($input)->save();
    }

    public static function updateData($request,$model){
        $input = $request->all();
        $input["img"] = File::updateFile($model->img,$request,"img","/uploads/author/",$request->name);
        return $model->update($input);
    }
}
