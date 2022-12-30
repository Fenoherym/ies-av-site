<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomePageController@index')->name('accueil');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*** BLog */
Route::get('/posts', 'App\Http\Controllers\BlogController@index')->name('blog');
Route::get('/posts/search', 'App\Http\Controllers\BlogController@search')->name('blog.search');
Route::get('/posts/{id}', 'App\Http\Controllers\BlogController@show')->name('blog.show');

/*** Mention */
Route::get('/mention/chef/{id}', 'App\Http\Controllers\FiliereController@show_chef')->name('filiere.chef');
Route::get('/mention/{id}', 'App\Http\Controllers\FiliereController@show')->name('filiere.show');

/*** Admission ***/
Route::get('/admission', 'App\Http\Controllers\AdmissionController@index')->name('admission');

/**** Gallerie */
Route::get('galerie', 'App\Http\Controllers\GaleryController@index')->name('galery');

/*** Concours */
Route::get('concours', 'App\Http\Controllers\ConcoursController@index')->name('concours');

/*** A propos */
Route::get('a-propos', 'App\Http\Controllers\AproposController@index')->name('a-propos');

/** Contact */
Route::post('/contact', 'App\Http\Controllers\ContactController@store')->name('contact.store');
/* admin */
Route::get('/admin', function () {
    return view('admin.app');
})->name('admin')->middleware("auth");



Route::middleware('auth')->group(function () {

    Route::get('admin/dashboard',  [App\Http\Controllers\admin\DashboardController::class, 'index'])->name('admin.dashboard');

    /*********** BLog ******/
    Route::get('/admin/blogs', [App\Http\Controllers\admin\BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [App\Http\Controllers\admin\BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blogs/create', [App\Http\Controllers\admin\BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blogs/delete/{id}', [App\Http\Controllers\admin\BlogController::class, 'delete'])->name('admin.blog.delete');

    Route::get('/admin/blogs/edit/{id}', [App\Http\Controllers\admin\BlogController::class, 'edit'])->name('admin.blog.edit');

    Route::post('/admin/blogs/update/{id}', [App\Http\Controllers\admin\BlogController::class, 'update'])->name('admin.blog.update');
    Route::get('/admin/blogs/search', [App\Http\Controllers\admin\BlogController::class, 'search'])->name('admin.blog.search');

    /*** Mention */
    Route::get('/admin/mentions', [App\Http\Controllers\admin\FiliereController::class, 'index'])->name('admin.filiere.index');
    Route::get('/admin/mentions/delete/{id}', [App\Http\Controllers\admin\FiliereController::class, 'destroy'])->name('admin.filiere.delete');
    Route::get('/admin/mentions/create', [App\Http\Controllers\admin\FiliereController::class, 'create'])->name('admin.filiere.create');
    Route::post('/admin/mentions/create', [App\Http\Controllers\admin\FiliereController::class, 'store'])->name('admin.filiere.store');
    Route::get('/admin/mentions/edit/{id}', [App\Http\Controllers\admin\FiliereController::class, 'edit'])->name('admin.filiere.edit');
    Route::post('/admin/mentions/update/{id}', [App\Http\Controllers\admin\FiliereController::class, 'update'])->name('admin.filiere.update');
    Route::get('/admin/mentions/search', [App\Http\Controllers\admin\FiliereController::class, 'search'])->name('admin.filiere.search');

    route::get('/admin/mentions/category', [App\Http\Controllers\admin\FiliereCategoryController::class, 'index'])->name('admin.filiere.category.index');
    route::post('/admin/mentions/category/create', [App\Http\Controllers\admin\FiliereCategoryController::class, 'store'])->name('admin.filiere.category.create');
    route::post('/admin/mentions/category/update', [App\Http\Controllers\admin\FiliereCategoryController::class, 'update'])->name('admin.filiere.category.update');
    route::get('/admin/mentions/category/delete/{id}', [App\Http\Controllers\admin\FiliereCategoryController::class, 'destroy'])->name('admin.filiere.category.delete');


    /**** Parcours */
    Route::get('/admin/parcours/delete/{id}', [App\Http\Controllers\admin\ParcoursController::class, 'destroy'])->name('admin.parcours.delete');
    Route::get('/admin/parcours/create', [App\Http\Controllers\admin\ParcoursController::class, 'create'])->name('admin.parcours.create');
    Route::post('/admin/parcours/create', [App\Http\Controllers\admin\ParcoursController::class, 'store'])->name('admin.parcours.store');
    Route::get('/admin/parcours/edit/{id}', [App\Http\Controllers\admin\ParcoursController::class, 'edit'])->name('admin.parcours.edit');
    Route::post('/admin/parcours/update/{id}', [App\Http\Controllers\admin\ParcoursController::class, 'update'])->name('admin.parcours.update');

    /*** Etudiant */
    Route::get('/admin/etudiants', [App\Http\Controllers\admin\EtudiantController::class, 'index'])->name('admin.etudiants.index');
    Route::get('/admin/etudiants/search', [App\Http\Controllers\admin\EtudiantController::class, 'search'])->name('admin.etudiants.search');
    Route::get('/admin/etudiants/create', [App\Http\Controllers\admin\EtudiantController::class, 'create'])->name('admin.etudiants.create');
    Route::post('/admin/etudiants/update/{id}', [App\Http\Controllers\admin\EtudiantController::class, 'update'])->name('admin.etudiants.update');
    Route::get('/admin/etudiants/{id}', [App\Http\Controllers\admin\EtudiantController::class, 'show'])->name('admin.etudiants.show');
    Route::post('/admin/etudiants/store', [App\Http\Controllers\admin\EtudiantController::class, 'store'])->name('admin.etudiants.store');
    Route::get('/admin/tranche/edit-droit/{etudiant_id}', [App\Http\Controllers\admin\TrancheController::class, 'editDroit'])->name('admin.tranche.editDroit');
    Route::get('/admin/tranche/edit-first-tranche/{etudiant_id}', [App\Http\Controllers\admin\TrancheController::class, 'editFirstTranche'])->name('admin.tranche.editFirstTranche');
    Route::get('/admin/tranche/edit-second-tranche/{etudiant_id}', [App\Http\Controllers\admin\TrancheController::class, 'editSecondTranche'])->name('admin.tranche.editSecondTranche');
    Route::get('/admin/tranche/edit-third-tranche/{etudiant_id}', [App\Http\Controllers\admin\TrancheController::class, 'editThirdTranche'])->name('admin.tranche.editThirdTranche');
    Route::get('/admin/etudiants/delete/{id}', [App\Http\Controllers\admin\EtudiantController::class, 'destroy'])->name('admin.etudiants.delete');
    Route::get('/admin/etudiants/edit/{id}', [App\Http\Controllers\admin\EtudiantController::class, 'edit'])->name('admin.etudiants.edit');

    /** Galery */

    Route::get('admin/galeries', [App\Http\Controllers\admin\GaleryController::class, 'index'])->name('admin.galery.index');
    Route::get('admin/galeries/search', [App\Http\Controllers\admin\GaleryController::class, 'search'])->name('admin.galery.search');
    Route::get('admin/galery/create', [App\Http\Controllers\admin\GaleryController::class, 'create'])->name('admin.galery.create');
    Route::get('admin/galery/delete/{id}', [App\Http\Controllers\admin\GaleryController::class, 'destroy'])->name('admin.galery.delete');
    Route::post('/admin/galery/store', [App\Http\Controllers\admin\GaleryController::class, 'store'])->name('admin.galery.store');


    /*** Admission */

    Route::get('admin/admissions', [App\Http\Controllers\admin\AdmissionController::class, 'index'])->name('admin.admission.index');
    Route::get('admin/admissions/search', [App\Http\Controllers\admin\AdmissionController::class, 'search'])->name('admin.admission.search');
    Route::get('admin/admissions/create', [App\Http\Controllers\admin\AdmissionController::class, 'create'])->name('admin.admission.create');
    Route::post('admin/admissions/store', [App\Http\Controllers\admin\AdmissionController::class, 'store'])->name('admin.admission.store');
    Route::get('admin/admissions/edit/{id}', [App\Http\Controllers\admin\AdmissionController::class, 'edit'])->name('admin.admission.edit');
    Route::get('admin/admissions/delete/{id}', [App\Http\Controllers\admin\AdmissionController::class, 'destroy'])->name('admin.admission.delete');
    Route::post('admin/admissions/update', [App\Http\Controllers\admin\AdmissionController::class, 'update'])->name('admin.admission.update');

    /*** Personnel */
    Route::get('admin/personnels', [App\Http\Controllers\admin\PersonnelController::class, 'index'])->name('admin.personnel.index');
    Route::get('admin/personnels/search', [App\Http\Controllers\admin\PersonnelController::class, 'search'])->name('admin.personnel.search');
    Route::get('admin/personnels/create', [App\Http\Controllers\admin\PersonnelController::class, 'create'])->name('admin.personnel.create');
    Route::post('admin/personnels/store', [App\Http\Controllers\admin\PersonnelController::class, 'store'])->name('admin.personnel.store');
    Route::get('admin/personnels/edit/{id}', [App\Http\Controllers\admin\PersonnelController::class, 'edit'])->name('admin.personnel.edit');
    Route::get('admin/personnels/delete/{id}', [App\Http\Controllers\admin\PersonnelController::class, 'destroy'])->name('admin.personnel.delete');
    Route::post('admin/personnels/update', [App\Http\Controllers\admin\PersonnelController::class, 'update'])->name('admin.personnel.update');


    /*** Concours et seléctions */
    Route::get('admin/concours-selection', [App\Http\Controllers\admin\ConcoursController::class, 'index'])->name('admin.concours.index');
    Route::get('admin/concours-selection/create', [App\Http\Controllers\admin\ConcoursController::class, 'create'])->name('admin.concours.create');
    Route::post('admin/concours-selection/store', [App\Http\Controllers\admin\ConcoursController::class, 'update'])->name('admin.concours.update');
    Route::post('admin/concours-selection/update', [App\Http\Controllers\admin\ConcoursController::class, 'store'])->name('admin.concours.store');
    Route::get('admin/concours-selection/delete/{id}', [App\Http\Controllers\admin\ConcoursController::class, 'destroy'])->name('admin.concours.delete');
    Route::get('admin/concours-selection/edit/{id}', [App\Http\Controllers\admin\ConcoursController::class, 'edit'])->name('admin.concours.edit');

    /*** Enseignants */
    Route::get('admin/enseignants', [App\Http\Controllers\admin\EnseignantController::class, 'index'])->name('admin.enseignant.index');
    Route::get('admin/enseignant/{id}', [App\Http\Controllers\admin\EnseignantController::class, 'show'])->name('admin.enseignant.show');
    Route::get('admin/enseignants/search', [App\Http\Controllers\admin\EnseignantController::class, 'search'])->name('admin.enseignant.search');
    Route::get('admin/enseignants/create', [App\Http\Controllers\admin\EnseignantController::class, 'create'])->name('admin.enseignant.create');
    Route::post('admin/enseignants/store', [App\Http\Controllers\admin\EnseignantController::class, 'store'])->name('admin.enseignant.store');
    Route::get('admin/enseignants/edit/{id}', [App\Http\Controllers\admin\EnseignantController::class, 'edit'])->name('admin.enseignant.edit');
    Route::post('admin/enseignants/update/{id}', [App\Http\Controllers\admin\EnseignantController::class, 'update'])->name('admin.enseignant.update');
    Route::get('admin/enseignants/delete/{id}', [App\Http\Controllers\admin\EnseignantController::class, 'destroy'])->name('admin.enseignant.delete');


    Route::get('admin/contact', [App\Http\Controllers\admin\ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('admin/contact/{id}', [App\Http\Controllers\admin\ContactController::class, 'show'])->name('admin.contact.show');
    Route::post('admin/mail/send', [App\Http\Controllers\admin\MailController::class, 'send'])->name('admin.mail.send');

    /** Partenariats */
    Route::get('admin/partenariat', [App\Http\Controllers\Admin\PartenariatController::class, 'index'])->name('admin.partenariat.index');
    Route::get('admin/partenariat/delete/{id}', [App\Http\Controllers\Admin\PartenariatController::class, 'destroy'])->name('admin.partenariat.delete');
    Route::get('admin/partenariat/create', [App\Http\Controllers\Admin\PartenariatController::class, 'create'])->name('admin.partenariat.create');
    Route::get('admin/partenariat/edit/{id}', [App\Http\Controllers\Admin\PartenariatController::class, 'edit'])->name('admin.partenariat.edit');
    Route::post('admin/partenariat/store', [App\Http\Controllers\Admin\PartenariatController::class, 'store'])->name('admin.partenariat.store');
    Route::post('admin/partenariat/update/{id}', [App\Http\Controllers\Admin\PartenariatController::class, 'update'])->name('admin.partenariat.update');
});
