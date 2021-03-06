<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'board_hash_code',
        'event_name',
        'description',
        'status',
        'event_start_datetime',
        'event_end_datetime',
        'hash_key',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    
}
