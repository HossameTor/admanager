<?php

namespace App\Http\Controllers;

use App\Banniere;
use Illuminate\Http\Request;

class bannViews extends Controller
{
    public function count(Request $request){
        $id = $request->banniereid; 
        $bann = Banniere::find($id);
        $bann->nb_vue->increment();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
