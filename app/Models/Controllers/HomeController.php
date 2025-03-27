<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use App\Models\ShareSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $schedule;
    private $user;

    public function __construct(Schedule $schedule, User $user)
    {
        $this->schedule = $schedule;
        $this->user = $user;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = $this->user->findOrFail(Auth::user()->id);
        $users = $this->user->all();

        // $home_schedule = $this->getHomeSchedules();
        return view('home')
                ->with('user', $user)
                ->with('users', $users);
                // ->with('home_schedule', $home_schedule);
    }

    // private function getHomeSchedules(){
    //     $all_schedules = $this->schedule->latest()->get();

    //     $home_schedule = [];

    //     foreach($all_schedules as $schedule){
    //         if(Auth::user()->id == $schedule->user_id || $schedule->shareSchedule->receiver_id == Auth::user()->id){
    //             $home_schedule[] = $schedule;
    //         }
    //     }
    // }
}
