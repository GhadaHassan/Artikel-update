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
    public function __construct()
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
        if(request()->has('search') && request()->get('search') != ''){

            $artikels = Artikel::where(function ($query) use ($artikel){
                $query->whereHas('user', function ($query) use ($artikel){
                    $query->whereIn('artikel_id', $artikel);
                })->where('name','LIKE', "%".request()->get('search')."%");
            })->orWhere(function ($query) use ($moduls){
                $query->whereHas('modul', function ($query) use ($moduls){
                    $query->whereIn('modul_id' ,$moduls )
                    ->where('name','LIKE', "%".request()->get('search')."%");
                });
            })->orWhere(function ($query) use ($moduls){
                $query->whereHas('modul', function ($query) use ($moduls){
                    $query->whereIn('modul_id' ,$moduls );
                })->where('name','LIKE', "%".request()->get('search')."%");
            })
            ->get();
            dd($artikels);
        }
        // dd($data);

        $id = 1;
        return view('search', compact('artikels','id'));
    }

    public function login(){
        return view('login');
    }
}
