<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemoduleRequest;
use App\Http\Requests\UpdatemoduleRequest;
use App\Models\module;
use App\Repositories\moduleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Session;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class moduleController extends AppBaseController
{
    public function set($id){
        $module = module::findOrFail($id);
        Session::put('current_module',$module);
        return redirect()->back();
    }
}
