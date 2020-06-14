<?php

namespace App\Http\Controllers\Backend;

use App\Models\Artikel;
use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ArtikelsController\Store;

class ArtikelsController extends BackEndController
{
    public function __construct(Artikel $model){
        parent::__construct($model);
    }

    protected function syncModuls($row, $requestArray){

        if(isset($requestArray['moduls']) && !empty($requestArray['moduls'])){ // to save moduls with new row
            $row->modul()->sync($requestArray['moduls']);
        }

    }

    protected function with(){
        return ['modul','user'];
    }

    protected function append(){
        $array = [
            'moduls' => Modul::get(),   // relation m to m
            'selectedModuls' => [],
            
        ];

        if(request()->route()->parameter('id')){
            $array['selectedModuls'] = $this->model->find(request()->route()->parameter('id'))
            ->modul()->pluck('moduls.id')->toArray();

            // dd($array['selectedModuls']);
        }


        return $array;
    }


    public function store(Store $request){

        $requestArray = [
            'user_id' => auth()->user()->id
        ] + $request->all();                         // $requestArray => create new row with user login
        // dd($requestArray);
        $row = $this->model->create($requestArray); // $row => create new row video
        $this->syncModuls($row, $requestArray);

        return redirect('dashboard/artikels');
    }

    public function update($id, Store $request){

        $row = $this->model->findOrFail($id);
        $requestArray = $request->all();
        $row->update($requestArray);
        $this->syncModuls($row, $requestArray);
        return redirect('dashboard/artikels');
    }

    public function search(){

        $artikels = Artikel::orderBy('id','DESC');
        

        if(request()->has('search') && request()->get('search') != ''){

            $artikels = Artikel::whereHas('modul', function ($query) {

                $query->where('name', 'LIKE', "%".request()->get('search')."%");
            })
            ->orWhere('name', 'LIKE', "%".request()->get('search')."%");
        //    dd($artikels);

        }

        $artikels = $artikels->get();
      
        return view('dashboard/search', compact('artikels'));
    }
}
