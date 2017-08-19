<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text',
        'owner_id',
        'owner_type'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function owner()
    {
        $this->morphTo();
    }

    public function dialog()
    {
        return $this->belongsTo(Dialog::class);
    }
}