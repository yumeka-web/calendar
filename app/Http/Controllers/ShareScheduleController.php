<?php

namespace App\Http\Controllers;

use App\Models\ShareSchedle;
use Illuminate\Http\Request;
use Illuminate\Http\ShareSchedule;
use Illuminate\Support\Facades\Auth;

class ShareScheduleController extends Controller
{
    private $share_schedule;

    public function __construct(ShareSchedle $share_schedule) {
        $this->share_schedule = $share_schedule;
    }

    public function store($receiver_id, $schedule_id){
        $this->share_schedule->sharer_id = Auth::user()->id;
        $this->share_schedule->receiver_id = $receiver_id;
        $this->share_schedule->schedule_id = $schedule_id;
        $this->share_schedule->save();
        return redirect()->back();
    }
}
