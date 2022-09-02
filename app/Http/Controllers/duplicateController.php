<?php

namespace App\Http\Controllers;

use App\Banndate;
use App\Banniere;
use Illuminate\Http\Request;

class duplicateController extends Controller
{
    public function show($id){
    
        return view('duplicate',["id"=>$id]);
    }
    public function duplicate(Request $request,$id){
        
        $bannoriginal = Banniere::find($id);
        $newbann = New Banniere();
        $newbann->titre = $bannoriginal->titre;
        $newbann->lien = $bannoriginal->lien;
        $newbann->image = $bannoriginal->image;
        $newbann->position = $request->position;
        $newbann->planification = $request->planification;
        $newbann->campagne_id = $bannoriginal->campagne_id;
        
        $newbann->save();
        if(Banniere::orderBy('created_at', 'desc')->first()==null){
            $dates = explode(",", $request->planification);
            foreach($dates as $date){
                Banndate::create([
                    'banniere_id' => 1,
                    'position' => $request->position,
                    'date' => $date,
                ]);
            }
        } else {
            $lastbanniereId = Banniere::orderBy('created_at', 'desc')->first()->id;
            $dates = explode(",", $request->planification);
            foreach($dates as $date){
                Banndate::create([
                    'banniere_id' =>$newbann->id,
                    'position' => $request->position,
                    'date' => $date,
                ]);
            }
        };
        return redirect('admin/bannieres');
    }
}
