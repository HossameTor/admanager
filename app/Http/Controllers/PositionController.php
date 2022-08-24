<?php

namespace App\Http\Controllers;

use App\Banndate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    public function getPosition($name){
        $dates = Banndate::where('position',strval($name))->get();
        return response()->json($dates, 200);
    }
}
