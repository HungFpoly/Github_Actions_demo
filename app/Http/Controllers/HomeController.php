<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Staff;
use Illuminate\Support\Facades\Http;
use DB;
use Carbon\Carbon;

use App\Models\Event;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $staff = Staff::all()->count();
        // $events = DB::table('events')->whereDay('start','=',Carbon::today())->get()->count();
        // $events_Months = DB::table('events')->whereMonth('start','=' ,Carbon::today())->get()->count();
        // $events_Weeks = DB:: table('events')->whereBetween('start', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();
         return response()->json($staff);
    }
    public function calendar(Request $request)
    {
        
    		$data = Event::all();
            return response()->json($data);
    	
    }
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function action(Request $request)
    {  
        if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}