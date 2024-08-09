<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';

    protected $primaryKey = 'certificateId';

    protected $fillable = [
        'name',
    ];
    
    public $timestamps = true; // If you have timestamps columns (created_at, updated_at)
}

