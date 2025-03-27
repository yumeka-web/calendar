<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareSchedule extends Model
{
    protected $table = 'share_schedule';
    public $timestamps = false;

    public function schedule()
    {
        $this->belongsTo(Schedule::class);
    }
}
