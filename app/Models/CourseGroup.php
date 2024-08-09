<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseGroup extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'course_groups';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'group_id';

    // Disable auto-incrementing if the primary key is not an integer
    public $incrementing = true;

    // Specify the data type of the primary key if it's not an integer
    protected $keyType = 'bigint';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'status',
        'start_date',
        'end_date',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
