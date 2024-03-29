<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ShowController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function show(){

        $da=User::all();
// return $da;
        return  view('show' , compact('da'));
    }
    public function edite($email){
         $da=User::find($email);
// return $da;
        return  view('edite-personal-info' , compact('da'));
    }
}
