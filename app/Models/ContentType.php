<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;
    protected $table = 'content_types';
    protected $primaryKey = 'contentId';

    protected $fillable = [
        'name',
        'amount',
    ];

     public $timestamps = true; 

      public function meetingForms()
    {
        return $this->hasMany(MeetingForm::class, 'contentId');
    }
}
