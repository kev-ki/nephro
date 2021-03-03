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

Route::get('/', function () {
    return view('auth.login');
});

//Authentification
Route::get('login', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin')->name('postlogin');
Route::get('register', 'AuthController@register')->name('register');
Route::post('post-register', 'AuthController@postRegister')->name('postregister');
Route::resource('home', 'HomeController');
Route::post('logout', 'AuthController@logout')->name('logout');

//Medecin
Route::resource('medecin', 'PatientController');/*->middleware('patient');*/
Route::get('Medecin/{id}/edit', 'PatientController@editprofile')->name('medecin.editprofile');
Route::put('Medecin/{id}', 'PatientController@updateprofile')->name('medecin.updateprofile');
Route::get('Medecin/Rendez-Vous', 'MedecinController@index')->name('medecin.rdv');
Route::post('medecin/Search/', 'PatientController@search')->name('medecin.search');
Route::post('medecin/consultation/Search/{id}', 'PatientController@consultSearch')->name('consultation.search');
Route::post('medecin/constante/Search/', 'PatientController@constanteSearch')->name('constante.search');
Route::get('Medecin/constante/{id}', 'PatientController@show_constante')->name('medecin.constante');
Route::get('Medecin/constante/index/{id}', 'PatientController@index_constante')->name('medecin.constanteindex');
Route::get('medecin/consultation/{id}', 'PatientController@show_consultation')->name('medecin.consultation');
Route::get('medecin/consultation/index/{id}', 'PatientController@index_consultation')->name('medecin.consultationindex');
Route::get('medecin/hospitaliser/{id}', 'PatientController@hospitaliser')->name('medecin.hospitaliser');

//Statistique et impression
Route::get('statistique', 'StatistiqueController@index')->name('statistique');
Route::get('PDF', 'StatistiqueController@create')->name('medecin.pdf');

//Consultattion
Route::resource('consultation','ConsultationController');
Route::get('Consultation/{id}', 'ConsultationController@begin_consult')->name('consultation.begin');
Route::get('Consultation/', 'ConsultationController@create_fin_consult')->name('consultation_fin_create');
Route::put('Consultation/{id}/update/', 'ConsultationController@update_consultation')->name('consultation_update');
Route::resource('maladiegenerale', 'MaladieGeneralController');
Route::resource('uronephrologie', 'AntUronephrologiqueController');
Route::resource('affectionIMM', 'AffectionIMMController');
Route::resource('affectionTumorale', 'AffTumoraleMaligneController');
Route::resource('infection', 'AntInfectionController');
Route::resource('Autre_antecedent_medical', 'AutreAntMedicauxController');
Route::resource('chirurgicaux', 'AntChirurgicalController');
Route::resource('genico-obstetrique', 'GenicoObstetriqueController');
Route::resource('habitude-alimentaire', 'HabitudeAlimentaireController');
Route::resource('antfamilial', 'AntFamilialController');
Route::resource('examen-general', 'ExamGeneralController');
Route::resource('examen-appareil', 'ExamAppareilController');
Route::resource('bilan-sanguin', 'BilanSanguinController');
Route::resource('electrophorese', 'ElectrophoreseController');
Route::resource('serologie', 'SerologieController');
Route::resource('parasitologie', 'ParasitologieController');
Route::resource('hemostase', 'HemostaseController');
Route::resource('endocrinologie', 'EndocrinologieController');
Route::resource('marqueur-tumoral', 'MarqueurTumoralController');
Route::resource('bilan-urinaire', 'BilanUrinaireController');
Route::resource('liquide-bio-selle', 'LiquideBioSelleController');
Route::resource('image-endoscopie-anat', 'ImgEndosAnatomopathologieController');
Route::post('image-endoscopie-anat/imagerie/{id}', 'ImgEndosAnatomopathologieController@imageEndoscopieAnat')->name('imagerie');
Route::post('image-endoscopie-anat/endoscopie/{id}', 'ImgEndosAnatomopathologieController@imageEndoscopieAnat')->name('endoscopie');
Route::post('image-endoscopie-anat/anatomopatholigique/{id}', 'ImgEndosAnatomopathologieController@imageEndoscopieAnat')->name('anatomopatholigique');
Route::resource('autre-resultat', 'AutreResultatController');
Route::resource('traitement', 'TraitementController');
Route::resource('evolution', 'EvolutionController');

//Administrator
Route::resource('admin', 'AdminController');
Route::get('administrateur/acceuil', 'AdminController@acceuil')->name('admin.acceuil');
Route::put('administrateur/utilisateur/{id}/compte/update/', 'AdminController@updateuser')->name('admin.updateuser');
Route::get('administrateur/{id}/profile/edit', 'AdminController@editprofile')->name('admin.editprofile');
Route::put('administrateur/{id}/profile/update/', 'AdminController@updateprofile')->name('admin.updateprofile');
Route::patch('administrateur/resetpassword/{id}', 'AdminController@resetpasswd')->name('admin.resetmdp');
Route::patch('administrateur/activer_desactiver/{id}', 'AdminController@activer_desactiver')->name('admin.activer_desactiver');

//Dossier
Route::resource('dossier', 'DossierController');

//Secretaire
Route::resource('rdv', 'RdvController');
Route::get('secretaire/acceuil', 'SecretController@index')->name('secret.index');
Route::post('secretaire/Search/', 'SecretController@search')->name('secret.search');
Route::get('secretaire/{id}/show', 'SecretController@show')->name('secret.show');
Route::get('secretaire/{id}/profile/edit/', 'SecretController@editprofile')->name('secret.editprofile');
Route::put('secretaire/{id}/profile/update/', 'SecretController@updateprofile')->name('secret.updateprofile');

//Infirmier
Route::resource('infirmier', 'InfController');
Route::post('infirmier/Search/', 'InfController@search')->name('infirmier.search');
Route::get('infirmier/editprofile/{id}/edit', 'InfController@editprofile')->name('infirmier.editprofile');
Route::put('infirmier/updateprofile/{id}/update', 'InfController@updateprofile')->name('infirmier.updateprofile');
Route::get('infirmier/constante/{id}/show', 'InfController@show_constante')->name('infirmier.constante');
Route::get('infirmier/patient/{id}/constante/index', 'InfController@index_constante')->name('infirmier.constanteindex');

//Hospitalisation
Route::resource('patient/hospitalisation', 'HospitalisationController');
Route::post('infirmier/patient/hospitalisation/Search/', 'HospitalisationController@search')->name('hospi.search');
Route::get('medecin/patient/hospitalisation/index/', 'MedecinController@index_hospi')->name('index_hospi');
Route::post('medecin/patient/hospitalisation/Search/', 'MedecinController@search_hospi')->name('search_hospi');
Route::get('medecin/patient/hospitalisation/{id}/show/', 'MedecinController@show_hospi')->name('show_hospi');

//Constante
Route::resource('patient/constante', 'ConstanteController');
Route::post('infirmier/constante/Search/', 'infController@constanteSearch')->name('constante-inf.search');

//============================================================================================================================

//Graphiques
Route::get('piechart-first', 'ChartController@piechart_first');
Route::get('piechart-second', 'ChartController@piechart_second');
Route::post('barchart', 'ChartController@barchart')->name('barchart');

// Export / Import
Route::get('export/excel', 'ImportExportController@export_excel')->name('export_excel');
Route::get('export/pdf', 'ImportExportController@export_pdf')->name('export_pdf');
Route::get('importExportView', 'ImportExportController@importExportView');
Route::get('import', 'ImportExportController@import')->name('import');


