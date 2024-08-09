<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialUse extends Model
{
    use HasFactory;

    protected $table = 'social_uses';

    protected $primaryKey = 'socialId';

    protected $fillable = [
        'name',
    ];

    public $timestamps = true; // If you have timestamps columns (created_at, updated_at)
}
