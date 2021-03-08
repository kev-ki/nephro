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
Route::get('consultation/{id}/Maladie-Generale', 'MaladieGeneralController@liste_maladieG')->name('liste_maladieG');

Route::resource('uronephrologie', 'AntUronephrologiqueController');
Route::get('consultation/{id}/Uronephrologie', 'AntUronephrologiqueController@liste_uro')->name('liste_uro');

Route::resource('affectionIMM', 'AffectionIMMController');
Route::get('consultation/{id}/Affection-Immunologique', 'AffectionIMMController@liste_Imm')->name('liste_Imm');

Route::resource('affectionTumorale', 'AffTumoraleMaligneController');
Route::get('consultation/{id}/Affection-Tumorale-Maligne', 'AffTumoraleMaligneController@liste_TMaligne')->name('liste_TMaligne');

Route::resource('infection', 'AntInfectionController');
Route::get('consultation/{id}/Infection', 'AntInfectionController@liste_infection')->name('liste_infection');

Route::resource('Autre_antecedent_medical', 'AutreAntMedicauxController');
Route::get('consultation/{id}/Autre_antecedent_medical', 'AutreAntMedicauxController@liste_AutreMed')->name('liste_AutreMed');

Route::resource('chirurgicaux', 'AntChirurgicalController');
Route::get('consultation/{id}/chirurgicaux', 'AntChirurgicalController@liste_chirurgie')->name('liste_chirurgie');

Route::resource('gyneco-obstetrique', 'GenicoObstetriqueController');
Route::get('consultation/{id}/Gyneco-obstetrique', 'GenicoObstetriqueController@liste_obstetrique')->name('liste_obstetrique');

Route::resource('habitude-alimentaire', 'HabitudeAlimentaireController');Route::get('consultation/{id}/Habitude-Alimentaire', 'HabitudeAlimentaireController@liste_habitude')->name('liste_habitude');

Route::resource('antfamilial', 'AntFamilialController');
Route::get('consultation/{id}/Familiaux', 'AntFamilialController@liste_familial')->name('liste_familial');

Route::resource('examen-general', 'ExamGeneralController');
Route::get('consultation/{id}/examen-general', 'ExamGeneralController@liste_general')->name('liste_general');

Route::resource('examen-appareil', 'ExamAppareilController');
Route::get('consultation/{id}/Examen-Appareil', 'ExamAppareilController@liste_appareil')->name('liste_appareil');

Route::resource('bilan-sanguin', 'BilanSanguinController');
Route::get('consultation/{id}/Bilan-Sanguin', 'BilanSanguinController@liste_sanguin')->name('liste_sanguin');

Route::resource('electrophorese', 'ElectrophoreseController');
Route::get('consultation/{id}/Electrophorese', 'ElectrophoreseController@liste_electro')->name('liste_electro');

Route::resource('serologie', 'SerologieController');
Route::get('consultation/{id}/Serologie', 'SerologieController@liste_serologie')->name('liste_serologie');

Route::resource('parasitologie', 'ParasitologieController');
Route::get('consultation/{id}/Parasitologie', 'ParasitologieController@liste_parasitologie')->name('liste_parasito');

Route::resource('hemostase', 'HemostaseController');
Route::get('consultation/{id}/Hemostase', 'HemostaseController@liste_hemostase')->name('liste_hemostase');

Route::resource('endocrinologie', 'EndocrinologieController');
Route::get('consultation/{id}/Endocrinologie', 'EndocrinologieController@liste_endo')->name('liste_endo');

Route::resource('marqueur-tumoral', 'MarqueurTumoralController');
Route::get('consultation/{id}/Marqueur-Tumoral', 'MarqueurTumoralController@liste_marqueur')->name('liste_marqueur');

Route::resource('bilan-urinaire', 'BilanUrinaireController');
Route::get('consultation/{id}/Bilan-Urinaire', 'BilanUrinaireController@liste_urinaire')->name('liste_urinaire');

Route::resource('liquide-bio-selle', 'LiquideBioSelleController');
Route::get('consultation/{id}/Liquide-Bio-Selle', 'LiquideBioSelleController@liste_liquide')->name('liste_liquide');

Route::resource('image-endoscopie-anat', 'ImgEndosAnatomopathologieController');
Route::get('consultation/{id}/Image-Endoscopie-Anatomopathologie', 'ImgEndosAnatomopathologieController@liste_IEA')->name('liste_IEA');
Route::get('/Image-Endoscopie-Anatomopathologie/{id}/show', 'ImgEndosAnatomopathologieController@imageEndoscopieAnat')->name('IEA_show');

/*Route::post('image-endoscopie-anat/imagerie/{id}', 'ImgEndosAnatomopathologieController@imageEndoscopieAnat')->name('imagerie');*/
Route::get('consultation/{id}/Image-Endoscopie-Anatomopathologie/imagerie/', 'ImgEndosAnatomopathologieController@liste_IEA')->name('liste_imagerie');

/*Route::post('image-endoscopie-anat/endoscopie/{id}', 'ImgEndosAnatomopathologieController@imageEndoscopieAnat')->name('endoscopie');*/
Route::get('consultation/{id}/Image-Endoscopie-Anatomopathologie/Endoscopie/', 'ImgEndosAnatomopathologieController@liste_IEA')->name('liste_endoscopie');

/*Route::post('image-endoscopie-anat/anatomopatholigique/{id}', 'ImgEndosAnatomopathologieController@imageEndoscopieAnat')->name('anatomopatholigique');*/
Route::get('consultation/{id}/Image-Endoscopie-Anatomopathologie/Anatomopatholigie/', 'ImgEndosAnatomopathologieController@liste_IEA')->name('liste_anatomo');

Route::resource('autre-resultat', 'AutreResultatController');
Route::get('consultation/{id}/Autres-Resultats', 'AutreResultatController@liste_autreresult')->name('liste_autreresult');

Route::resource('traitement', 'TraitementController');
Route::get('consultation/{id}/Traitrement', 'TraitementController@liste_traitement')->name('liste_traitement');

Route::resource('evolution', 'EvolutionController');
Route::get('consultation/{id}/Evolutions', 'EvolutionController@liste_evolution')->name('liste_evolution');

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


