<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Mod;

class WelcomeController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }

    public function search(){

        $moduls = auth()->user()->modul()->pluck('moduls.id')->toArray();  // take all moduls for user
        $artikel = auth()->user()->artikel()->pluck('artikels.id')->toArray();  // take all arti. for user

    //  dd($moduls);
    // dd($artikel);

        $artikels = Artikel::orderBy('id','DESC');       

        if(request()->has('search') && request()->get('search') != ''){

            $artikels = Artikel::whereHas('user', function ($query) use ($artikel){
                $query->whereIn('artikel_id', $artikel)
                       ->where('name','LIKE', "%".request()->get('search')."%"); 
            })
            ->orWhere('name', 'LIKE', "%".request()->get('search')."%")->get();
            
            $artikels_modul = Artikel::whereHas('modul', function ($query) use ($moduls){

                $query->whereIn('modul_id' ,$moduls )
                        ->where('name', 'LIKE', "%".request()->get('search')."%");
                        
            })
            ->orWhere('name', 'LIKE', "%".request()->get('search')."%")
            ->whereIn('modul_id', $moduls)
            ->where('name','LIKE', "%".request()->get('search')."%")
            ->get();

            $merge = $artikels_modul->merge($artikels);
            
        //    dd($merge);

        }

        $artikels_res = $merge;
        $id = 1;
        return view('search', compact('artikels_res','id'));
    }
    
    public function login(){
        return view('login');
    }
}
