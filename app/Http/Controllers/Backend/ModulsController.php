<?php

namespace App\Http\Controllers\Backend;

use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ModulsController\Store;

class ModulsController extends BackEndController
{
    public function __construct(Modul $model){
        parent::__construct($model);
    }

    public function edit($id){
        $row =  $this->model->findOrFail($id);
        $pageTitle = 'EDITE '.strtoupper($this->plureModelName());   
        $pageDes = "Here you can edit ".$this->plureModelName(); 
        $routename = $this->plureModelName();
        $append = $this->append();

        return view('dashboard.'.$routename.'.edit', compact(
            'row',
            'pageTitle',
            'pageDes',
            'routename'))->with($append);
    }
        
    protected function filter($rows){
        if(request()->has('name') && request()->get('name') != ''){
            $rows = $rows->where('name', request()->get('name'));
        }
        return $rows;
    }

    public function store(Store $request){
        
        $this->model->create($request->all());

        return redirect('dashboard/moduls');

    }

    public function update($id, Store $request){
        $row = $this->model->findOrFail($id);
    
        $row->update($request->all());
        return redirect('dashboard/moduls');
    }
}
