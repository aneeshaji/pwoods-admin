<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPageContent extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [
        'contact_banner_image',
        'contact_content',
        'contact_phone',
        'contact_email',
        'contact_address'
    ];
}