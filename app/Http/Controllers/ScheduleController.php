<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    private $schedule;
    private $category;

    public function __construct(Schedule $schedule, Category $category)
    {
        $this->schedule = $schedule;
        $this->category = $category;
    }

    public function create()
    {
        $categories = $this->category->all();

        return view('schedule.create')
                ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'description' => 'required|max:100',
            'category' => 'required',
            'action' => 'max:20'
        ]);

        $this->schedule->category_id = $request->category;
        $this->schedule->user_id = Auth::user()->id;
        $this->schedule->title = $request->title;
        $this->schedule->start_time = $request->start_time;
        $this->schedule->end_time = $request->end_time;
        $this->schedule->description = $request->description;
        $this->schedule->action = $request->action;
        $this->schedule->save();

        return redirect()->route('home');
    }

    public function updateAction($id)
    {
        $schedule = $this->schedule->findOrFail($id);

        $schedule->action_status = 1;
        $schedule->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $schedule = $this->schedule->findOrFail($id);
        $categories = $this->category->all();

        if(Auth::user()->id !== $schedule->user_id)
        {
            return redirect()->route('home');
        }

        return view('schedule.edit')
                ->with('schedule', $schedule)
                ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'description' => 'required|max:100',
            'category' => 'required'
        ]);

        $schedule = $this->schedule->findOrFail($id);
        
        $schedule->category_id = $request->category;
        $schedule->title = $request->title;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->description = $request->description;
        $schedule->save();

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $this->schedule->destroy($id);

        return redirect()->route('home');
    }

    public function show($id)
    {
        $schedule = $this->schedule->findOrFail($id);
    
        return view('schedule.show')
                ->with('schedule', $schedule);
    }

    public function updateStatus($id)
    {
        $schedule = $this->schedule->findOrFail($id);
        $schedule->status = 1;
        $schedule->save();

        return redirect()->route('home');
    }


}
