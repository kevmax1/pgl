<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/contact_admin', function () {
	    return view('contact_admin');
});
Route::post('/contact_admin', 'HomeController@contact_admin');

Route::group(['middleware' => ['auth']], function(){
	Route::get('/', function () {
	    return view('home');
	});
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('roles', 'roleController');

    Route::get('modules/{id}','moduleController@set')->name('modules.set');
	Route::resource('menus', 'menuController');

    Route::resource('acces', 'accesController');

    Route::resource('sections', 'sectionController');

    Route::resource('cycles', 'CycleController');

    Route::resource('niveaux', 'NivauController');

    Route::resource('series', 'SerieController');
    Route::get('series/find','SerieController@find')->name('series.find');
    Route::get('series/find/{id}','SerieController@find')->name('series.find2');

    Route::resource('programmes', 'ProgrammeController');

    Route::resource('matieres', 'MatiereController');

    Route::resource('groupeMatieres', 'GroupeMatiereController');

    Route::resource('anneeAcademiques', 'AnneeAcademiqueController');



    Route::resource('classes', 'ClasseController');

    Route::get('classes/find','ClasseController@find')->name('classes.find');
    Route::get('classes/find/{id}','ClasseController@find')->name('classes.find2');

    Route::resource('matiereProgrammers', 'MatiereProgrammerController');

    Route::resource('enseignants', 'EnseignantController');

    Route::resource('affectations', 'AffectationController');

    Route::resource('chapitres', 'ChapitreController');

    Route::resource('grandTitres', 'GrandTitreController');

    Route::resource('titres', 'TitreController');

    Route::resource('trimestres', 'TrimestreController');

    Route::resource('sequences', 'SequenceController');

    Route::resource('evaluations', 'EvaluationController');

    Route::resource('villes', 'VilleController');

    Route::resource('etablissements', 'EtablissementController');

    Route::resource('jours', 'JourController');

    Route::resource('plageHoraires', 'PlageHoraireController');

    Route::resource('planings', 'PlaningController');


    App::setLocale("fr");
    Route::get('eleves/find','EleveController@find')->name('eleves.find');
    Route::get('eleves/find/{id}','EleveController@find')->name('eleves.find2');
    Route::get('eleves/affecter/','EleveController@affecter')->name('eleves.affecter');
    Route::post('eleves/affecter/','EleveController@affecterStore')->name('eleves.affecter.Store');
    Route::post('eleves/index/find','EleveController@findIndex')->name('eleves.index.find');
    Route::resource('eleves', 'EleveController');

    Route::resource('parents', 'ParentController');

    Route::resource('compositions', 'CompositionController');

    Route::resource('inscriptions', 'InscriptionController');

    Route::resource('seanceCours', 'SeanceCourController');

    Route::resource('presences', 'PresenceController');


});















// Route::get('login','App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
// Route::post('logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');
// Route::post('password/email','App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset','App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/reset','App\Http\Controllers\Auth\ResetPasswordController@reset');
// Route::get('password/reset/{token}','App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');