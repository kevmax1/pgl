<?php
use App\Models\menu;

if (!function_exists('DummyFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function DummyFunction()
    {

    }
}

if (!function_exists('myAccess')) {
    function myAccess(){
    	return Auth::user()->role->access;
    }
}
if (!function_exists('myModuleAccess')) {
    function myModuleAccess(){
    	if (Session::has('current_module')) {
    		$ac = [];
	    	foreach (myAccess() as $value) {
	    		if($value->menu->module->id == Session::get('current_module')->id){
	    			$ac[] = $value;
	    		}
	    	}
    		return $ac;
    	}
    	return [];
    }
}
if (!function_exists('hasAccess')) {
    function hasAccess($route){
    	dd(request(), menu::where('route', $route)->get());
    	return Auth::user()->role->access;
    }
}