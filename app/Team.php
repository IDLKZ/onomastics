<?php

namespace App;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $img
 * @property string $name
 * @property string $position
 * @property string $created_at
 * @property string $updated_at
 */
class Team extends Model
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
    protected $fillable = ['img', 'name', 'position', 'created_at', 'updated_at'];


    public static function createData($request){
        $model = new self();
        $input = $request->all();
        $input["img"] = File::createFile($request,"img","/uploads/team/",$request->name);
        return $model->fill($input)->save();
    }

}
