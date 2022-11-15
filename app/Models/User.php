<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {
    use SoftDeletes; // Use method soft deletes
    /**
     * Table name, if it's not have this property
     * Eloquent will take name of Model in the plural form
     * 
     * @var string
     */
    protected $table = 'users';

    /**
     * Use properties created_at and updated_at in table
     * 
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The list of properties to assign batch (massive assignment)
     * When use the method $model->fill($array), it will assign the values in table
     * to the properties in the list of $fillable.
     * The fill() method will use instead of the set() method for 
     * each properties
     * 
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}
?>