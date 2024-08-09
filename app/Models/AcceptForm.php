<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptForm extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'accept_forms';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'accept_id';

    // Disable auto-incrementing if the primary key is not an integer
    public $incrementing = true;

    // Specify the data type of the primary key if it's not an integer
    protected $keyType = 'bigint';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'user_data',
        'types',
        'paid',
        'paid_amount',
        'group_id',
        'content_id',
        'certificate_id',
        'color_id',
        'social_id',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'user_data' => 'array',
        'paid' => 'boolean',
        'paid_amount' => 'float',
    ];
        public function courseGroup()
    {
        return $this->belongsTo(CourseGroup::class, 'groupId');
    }

    public function contentType()
    {
        return $this->belongsTo(ContentType::class, 'contentId');
    }

    public function certificate()
    {
        return $this->belongsTo(Certificate::class, 'certificateId');
    }

    public function colorStatus()
    {
        return $this->belongsTo(ColorStatus::class, 'colorId');
    }

    public function socialUse()
    {
        return $this->belongsTo(SocialUse::class, 'socialId');
    }
}
