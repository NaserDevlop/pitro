<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Events;

 use App\Providers\RouteServiceProvider;
 use Illuminate\Support\Facades\Validator;
 use Carbon\Carbon;

class EventsControllers extends Controller
{


// --------------------------------------
    public function home(){
 
        $activities=Events::all();
 
    return  view('home' , compact('activities'));
    }
// --------------------------------------  

 
}
