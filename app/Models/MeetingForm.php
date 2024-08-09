<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingForm extends Model
{
    use HasFactory;

    protected $table = 'meeting_forms';

    protected $primaryKey = 'id';

    protected $fillable = [
        'userData',
        'paid',
        'contentId',
        'certificateId',
        'socialId',
    ];

    protected $casts = [
        'userData' => 'array',
        'paid' => 'boolean',
    ];

    // Define any relationships here if needed
    public function content()
    {
        return $this->belongsTo(ContentType::class, 'contentId');
    }

    public function certificate()
    {
        return $this->belongsTo(Certificate::class, 'certificateId');
    }

    public function social()
    {
        return $this->belongsTo(SocialUse::class, 'socialId');
    }
}
