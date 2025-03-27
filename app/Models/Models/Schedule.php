<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{
    public function shareSchedule()
    {
        return $this->belongsTo(ShareSchedule::class);
    }
}
