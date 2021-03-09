<?php

namespace App;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $author_id
 * @property integer $language_id
 * @property string $alias
 * @property string $title
 * @property string $subtitle
 * @property string $img
 * @property string $thumbnail
 * @property string $content
 * @property string $links
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Language $language
 * @property Comment[] $comments
 * @property Material[] $materials
 */
class News extends Model
{

    use Sluggable;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */

    protected $keyType = 'integer';

    protected $casts = [
      "links"=>"array"
    ];

    /**
     * @var array
     */
    protected $fillable = ['author_id', 'language_id', 'alias', 'title', 'subtitle', 'img', 'thumbnail', 'content', 'links', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function sluggable(): array
    {
        return [
            'alias' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
        return $this->hasMany('App\Material');
    }

    public static function createData($request){
        $model = new self();
        $input = $request->all();
        $input["img"] = File::createFile($request,"img","/uploads/news/",$request->get("title"));
        $input["thumbnail"] = File::createFile($request,"thumbnail","/uploads/news/",$request->get("title"));
        $input["author_id"] = Auth::id();
        return $model->fill($input)->save();
    }

    public static function updateData($request,$model){
        $input = $request->all();
        $input["img"] = File::updateFile($model->img,$request,"img","/uploads/news/",$request->get("title"));
        $input["thumbnail"] = File::updateFile($model->thumbnail,$request,"thumbnail","/uploads/news/",$request->get("title"));
        $input["author_id"] = Auth::id();
        return $model->update($input);
    }

    public static function getData(){
        $data["news"] = [];
        $data["articles"] = [];
        $data["books"] = [];
        $data["partners"] = [];
        if(News::count() > 3){
            $data["news"] = News::orderBy("created_at","DESC")->get()->take(3);
        }
        else{
            $data["news"] = News::all();
        }
        if(Article::count() > 4){
            $data["articles"] = Article::orderBy("created_at","DESC")->get()->take(5);
        }
        else{
            $data["articles"] = Article::all();
        }
        if(Book::count()>4){
            $data["books"] = Book::orderBy("created_at","DESC")->get()->take(5);
        }
        else{
            $data["books"] = Book::all();
        }
        $data["partners"] = Partner::all();
        return $data;










    }
}
