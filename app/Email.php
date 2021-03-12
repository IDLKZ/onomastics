<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class Email extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'email';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['email', 'created_at', 'updated_at'];

}
