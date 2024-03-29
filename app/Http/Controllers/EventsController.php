<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Events;

 use App\Providers\RouteServiceProvider;
 use Illuminate\Support\Facades\Validator;
 use Carbon\Carbon;

class EventsController extends Controller
{

 

    public function __construct()
    {
        $this->middleware('auth');
    }
    //----------------------------
    public function index(){

        // $da=Events::all();
//    return $da;
        return  view('addevent' );
    }
    
    
    // --------------------------------------
    public function MonthEvents(){
  $mon=7;
// match all of the values
// $activities = Events::where('month', $mon) ->get();

//return $activities;


        $activities=Events::all();
//   return $da;
    return  view('editable' , compact('activities'));
    }

    // --------------------------------------
    public function changemonth($month){
 // match all of the values
$activities = Events::where('month', $month) ->get();

//return $activities;


      //  $da=Events::all();
//   return $da;
    return  view('editable' , compact('activities'));
    }
// --------------------------------------

// --------------------------------------
    public function showevents(){

        $da=Events::all();
//    return $da;
     return  view('showevents' , compact('da'));
    }
// --------------------------------------
    //----------------------------
    public function update_form($serial){

        $dat=Events::find($serial);
//    return $dat;
        return  view('updateevent' , compact('dat') );
    }
// --------------------------------------
    //----------------------------
    public function update_event(Request $request, $serial){

        $event=Events::find($serial);
//      return $dat;
        
        $event['serial-no'] = $request->input('serial');
        $event['month'] = $request->input('month');
        $event['day'] = $request->input('day');
        $event['title'] = $request->input('title');
        $event['start-date'] = $request->input('start-date');
        $event['end-date'] = $request->input('end-date');
        $event['info'] = $request->input('info');
        $event['note'] = $request->input('note');
        $event['has_email'] = $request->input('hasemail');
  
        $event->update();
      //  return redirect()->back()
        
       return redirect('/admin/showevents') ->with('status','Event Updated Successfully');


    } 


// --------------------------------------


    protected function validator(Request $data)
    {
        return    Validator::make($data, [
            'serial' => [  'required', 'string','max:255'],
            'month' => [ 'string', 'max:255'],
            'day' => [ 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'start-date' => ['required', 'date', 'max:255'],
            'end-date' => ['required', 'date', 'max:255'],
            'info' => ['required', 'string', 'max:255'],
            'note' => ['required', 'string', 'max:255'],
            'hasemail' => [' required', 'string', 'max:255'],
            // 'created_at' =>now(), 
            // 'updated_at' =>  now(), 
            
        ]);
    }
  
    protected function createnew( Request $data){

      Events::create([

          
            'serial-no' =>$data['serial'],
            'month' => $data['month'],
            'day' => $data['day'],
            'title' => $data['title'],
            'start-date' => $data['start-date'],
            'end-date' => $data['end-date'],
            'info' => $data['info'],
            'note' => $data['note'],
            'has_email' =>$data['hasemail'],
            // 'created_at' => now(),
            // 'updated_at' => now()
             
      ]);
      return redirect()->back()->with('status','Event Added Successfully');
        
        
  
// return $data;
        // $da=Events::all();
    // return Events::create($data);
        // return  view('showevents-show' , compact('da'));
    }


    // -------------------------------------


    public function delete_event($id){

        $da=Events::find($id);
          $da->delete();
          return redirect()->back()->with('status','Event Deleted Successfully');
    }
}
