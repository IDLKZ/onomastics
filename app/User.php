<?php

namespace App;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $role_id
 * @property string $email
 * @property string $name
 * @property string $phone
 * @property string $img
 * @property string $password
 * @property int $status
 * @property int $banned
 * @property string $created_at
 * @property string $updated_at
 * @property Role $role
 * @property Comment[] $comments
 * @property News[] $news
 */
class User extends Model
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
    protected $fillable = ['role_id', 'email', 'name', 'phone', 'img', 'password', 'status', 'banned', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\News', 'author_id');
    }


    public static function createData($request){
        $model = new self();
        $input = $request->all();
        $input["img"] = File::createFile($request,"img","/uploads/users/",$request->get("name"));
        $input["password"] = bcrypt($request->get("password"));
        $input["status"] = $request->boolean("status") == true ? 1 : 0;
        $input["banned"] = $request->boolean("banned") == true ? 1 : 0;
        return $model->fill($input)->save();
    }

    public static function updateData($request,$model){
        $input = $request->all();
        $input["img"] = File::updateFile($model->img,$request,"img","/uploads/users/",$request->get("name"));
        if($request->has("password")){$input["password"] = bcrypt($request->get("password"));}
        $input["status"] = $request->boolean("status") == true ? 1 : 0;
        $input["banned"] = $request->boolean("banned") == true ? 1 : 0;
        return $model->update($input);
    }
}
