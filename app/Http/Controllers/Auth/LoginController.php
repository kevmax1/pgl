<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AnneeAcademique;
use App\Models\module;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $modules = module::all();
        $request->session()->put('modules',$modules->toArray());
        $request->session()->put('current_module',module::find(1));
        $current_year = AnneeAcademique::where('encours',1)->first();
        $end = Carbon::parse($current_year->date_debut)->diff(Carbon::parse($current_year->date_fin))->days;
        $curr = Carbon::parse($current_year->date_debut)->diff(Carbon::today())->days;
        $pourcentage = floor($curr*100/$end);
        $request->session()->put('pourcentage',$pourcentage);
    }
}
