<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

class HomeController extends BackEndController
{
    public function __construct(User $model){
        parent::__construct($model);
    }

    public function index(){
        return view('dashboard.home');
    }
}
