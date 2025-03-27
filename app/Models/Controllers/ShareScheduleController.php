<?php

namespace App\Http\Controllers;

use App\Models\ShareSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareScheduleController extends Controller
{
    private $share_schedule;

    public function __construct(ShareSchedule $share_schedule) {
        $this->share_schedule = $share_schedule;
    }

    public function store(Request $request, $schedule_id){
        $this->share_schedule->sharer_id = Auth::user()->id;
        $this->share_schedule->receiver_id = $request->user;
        $this->share_schedule->schedule_id = $schedule_id;
        $this->share_schedule->save();
        return redirect()->back();
    }

    public function share()
    {
        $shared_schedules = ShareSchedule::where('receiver_id', Auth::user()->id)->get();

        return view('schedule.share')->with('shared_schedules', $shared_schedules);
    }
}
