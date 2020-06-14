<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UsersController\Store;
use App\Http\Requests\Backend\UsersController\Update;
use App\Models\Artikel;
use Illuminate\Support\Facades\Hash;

class UsersController extends BackEndController
{
    public function __construct(User $model){
        parent::__construct($model);
    }

    protected function syncModulsArtikels($row, $requestArray){

        if(isset($requestArray['moduls']) && !empty($requestArray['moduls'])){ // to save moduls with new row
            $row->modul()->sync($requestArray['moduls']);
        }

        if(isset($requestArray['artikels']) && !empty($requestArray['artikels'])){ // to save moduls with new row
            $row->artikel()->sync($requestArray['artikels']);
        }
    }
    // protected function with(){
    //     return ['modul'];
    // }

    protected function append(){
        $array = [
            'moduls' => Modul::get(),   // relation m to m
            'selectedModuls' => [],
            'artikels' => Artikel::get(),
            'selectedArtikels' => [],
        ];

        if(request()->route()->parameter('id')){
            $array['selectedModuls'] = $this->model->find(request()->route()->parameter('id'))
            ->modul()->pluck('moduls.id')->toArray();

            // dd($array['selectedModuls']);
            $array['selectedArtikels'] = $this->model->find(request()->route()->parameter('id'))
            ->artikel()->pluck('artikels.id')->toArray();
        }


        return $array;
    }
    
    public function store(Store $request){

        $requestArray = $request->all();
        // dd($requestArray);
        $requestArray['password'] = Hash::make($requestArray['password']);
        $row = $this->model->create($requestArray);

        $this->syncModulsArtikels($row, $requestArray);
        return redirect('dashboard/users');

    }

    public function update($id, Update $request){
   
        $row = $this->model->findOrFail($id);
        $requestArray = $request->all();        
        if(isset( $requestArray['password'] ) && $requestArray['password'] != ''){
            $requestArray['password'] = Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        $row->update($requestArray);
        $this->syncModulsArtikels($row, $requestArray);
        return redirect('dashboard/users');
    }
}

