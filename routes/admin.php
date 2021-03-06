<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('admin/login', 'views\admin\AuthController@login')->name('admin.login');
Route::post('admin/login', 'views\admin\AuthController@signin')->name('admin.signin');

Route::group(['prefix' => 'admin', 'middleware' => ['admin_auth', 'admin']], function() {
    Route::get('/', 'views\admin\AdminController@dashboard')->name('admin');
    Route::get('/dashboard', 'views\admin\AdminController@getDashboard');
    Route::get('logout', 'views\admin\AuthController@logout')->name('admin.logout');
    Route::post('password', 'views\admin\AuthController@password')->name('admin.password');
    Route::post('stagiaires/{number}/inscrire', 'views\admin\EtudiantController@inscrireEtudiant')->name('inscrire.etudiant.formation');
    Route::post('formation/{id}/ajouterStagiaire', 'views\admin\FormationsController@ajouterEtudiant')->name('ajouter.etudiant.formation');
    Route::post('formations/{id}/updateSite', 'views\admin\FormationsController@updateSite')->name('formation.update.site');
    Route::get('formations/{id}/editSite', 'views\admin\FormationsController@editSite')->name('formation.edit.site');
    Route::post('formations/{number}/addSite', 'views\admin\FormationsController@storeSite')->name('formation.store.site');
    Route::get('sessions/{id}/pending', 'views\admin\SessionController@pending')->name('sessions.pending');
    Route::delete('sites/{id}/delete', 'views\admin\FormationsController@removeSite')->name('remove.site');
    Route::get('stagiaires/{id}/edit-formation', 'views\admin\EtudiantController@editEtudiantFormation')->name('edit.etudiant.formation');
    Route::post('stagiaires/{id}/edit-formation', 'views\admin\EtudiantController@updateEtudiantFormation')->name('update.etudiant.formation');
    Route::delete('stagiaires/{id}/delete-formation', 'views\admin\EtudiantController@removeEtudiantFormation')->name('remove.etudiant.formation');

    Route::get('formateurs/{id}/edit-formation', 'views\admin\FormateurController@editFormation')->name('formateur.edit.formation');
    Route::post('formateurs/{id}/add-formation', 'views\admin\FormateurController@storeFormation')->name('formateur.store.formation');
    Route::delete('formateurs/{id}/remove', 'views\admin\FormateurController@removeFormation')->name('formateur.delete.formation');

    Route::get('formations/liste-des-formations', 'views\admin\FormationsController@downloadFormation')->name('formations.download');
    Route::get('stagiaires/liste-des-etudiants', 'views\admin\EtudiantController@downloadEtudiant')->name('stagiaires.download');
    Route::get('dashboard/statistiques', 'views\admin\AdminController@download')->name('dashboard.statistiques');
    Route::post('stagiaires/{id}/desincrire', 'views\admin\EtudiantController@desincrire')->name('stagiaires.desincrire');

    Route::resource('users', 'views\admin\UserController');
    Route::resource('roles', 'views\admin\RoleController');
    Route::resource('permissions', 'views\admin\PermissionController');
    Route::resource('stagiaires', 'views\admin\EtudiantController');
    Route::resource('formateurs', 'views\admin\FormateurController');
    Route::resource('niveaux', 'views\admin\NiveauController');
    Route::resource('sessions', 'views\admin\SessionController');
    Route::resource('categories', 'views\admin\CategoryController');
    Route::resource('besoins', 'views\admin\BesoinFormationController');

    Route::group(['prefix' => 'formations'], function () {
        Route::get('/', 'views\admin\FormationsController@index')->name('formation.index');
        Route::post('/', 'views\admin\FormationsController@store')->name('formation.store');
        Route::get('/create', 'views\admin\FormationsController@create')->name('formation.create');
        Route::get('{number}/edit', 'views\admin\FormationsController@edit')->name('formation.edit');
        Route::get('{number}/show', 'views\admin\FormationsController@show')->name('formation.show');
        Route::put('{number}/edit', 'views\admin\FormationsController@update')->name('formation.update');
        Route::delete('{id}', 'views\admin\FormationsController@destroy')->name('formation.delete');
    });

    Route::group(['prefix' => 'evaluations'], function () {
        Route::get('/', 'views\admin\EvaluationController@index')->name('evaluation.index');
        Route::post('/', 'views\admin\EvaluationController@store')->name('evaluations.store');
        Route::get('/create', 'views\admin\EvaluationController@create')->name('evaluations.create');
        Route::get('{number}/show', 'views\admin\EvaluationController@show')->name('evaluation.show');
    });
});
