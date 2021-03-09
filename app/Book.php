<?php

namespace App;

use App\Models\File;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $author_id
 * @property integer $language_id
 * @property string $alias
 * @property string $title
 * @property string $img
 * @property string $file
 * @property string $authors
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Author $author
 * @property Language $language
 * @property Comment[] $comments
 */
class Book extends Model
{
    use Sluggable;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    public function sluggable(): array
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = ['author_id', 'language_id', 'alias', 'title', 'img', 'file', 'authors', 'description', 'created_at', 'updated_at'];

    protected $casts = [
      "authors"=>"array"
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function createData($request){
        $model = new self();
        $input = $request->all();
        $input["img"] = File::createFile($request,"img","/uploads/books/",$request->title);
        $input["file"] = File::createFile($request,"file","/uploads/books/",$request->title);
        return $model->fill($input)->save();
    }

    public static function updateData($request,$model){
        $input = $request->all();
        $input["img"] = File::updateFile($model->img,$request,"img","/uploads/books/",$request->title);
        $input["file"] = File::updateFile($model->file,$request,"file","/uploads/books/",$request->title);
        return $model->update($input);
    }
}
