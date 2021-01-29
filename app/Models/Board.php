<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'board_name',
        'description',
        'status',
        'hash_key',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    
}
