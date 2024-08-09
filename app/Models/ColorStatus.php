<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorStatus extends Model
{
    use HasFactory;

    protected $table = 'color_statuses';

    protected $primaryKey = 'colorId';

    protected $fillable = [
        'name',
        'color',
    ];

    public $timestamps = true; // If you have timestamps columns (created_at, updated_at)
}
