<?php

use App\Http\Controllers\ActivitiesController;
use App\Models\News;
use Laravel\Telescope\Telescope;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginController;
use League\CommonMark\Node\Block\Document;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\PrvacinjaController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\AdminNewsPagesController;
use App\Http\Controllers\AdminGaleryPagesController;
use App\Http\Controllers\AdminDocumentsPageController;
use App\Http\Controllers\ParalelkiController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\PublicProcurementsController;
use App\Models\PublicProcurements;
use App\Services\FrontendService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth routes

Route::get('/login', [LoginController::class, 'getLogin'])->name('login_view');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware('auth')->prefix('admin')->group(function(){
    // news routes
    Route::get('/', [Controller::class, 'index']);
    Route::get('/news', [AdminNewsPagesController::class, 'index']);
    Route::get('/news/add', [AdminNewsPagesController::class, 'store']);
    Route::post('/news/add', [NewsController::class, 'store']);
    Route::get('/news/edit/{id}', [AdminNewsPagesController::class, 'edit'])->name('admin.news.edit');
    Route::post('/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
    Route::get('/news/search', [NewsController::class, 'search'])->name('search.news');

    // gallery routes
    Route::get('/gallery', [AdminGaleryPagesController::class, 'index']);
    Route::get('/gallery/add', [AdminGaleryPagesController::class, 'store']);
    Route::post('/gallery/add', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // erasmus routes
    Route::get('/erasmus', [AdminDocumentsPageController::class, 'index_erasmus']);
    Route::get('/erasmus/add', [AdminDocumentsPageController::class, 'show_add_erasmus']);
    Route::post('/erasmus/add', [DocumentsController::class, 'store_erasmus']);
    Route::get('/erasmus/edit/{id}', [AdminDocumentsPageController::class, 'edit_erasmus'])->name('erasmus.edit.show');
    Route::post('/erasmus/edit/{id}', [DocumentsController::class, 'edit_erasmus'])->name('erasmus.update');
    Route::delete('/erasmus/{id}', [DocumentsController::class, 'destroy_erasmus'])->name('erasmus.destroy');
    
    // Documents route
    Route::get('/documents', [AdminDocumentsPageController::class, 'index_documents']);
    Route::get('/documents/add', [AdminDocumentsPageController::class, 'create_documents']);
    Route::post('/documents/add', [DocumentsController::class, 'storeDocuments'])->name('store.documents');
    Route::get('/documents/category/{id}', [AdminDocumentsPageController::class, 'documentsByCategories'])->name('admin.documents.category');
    Route::get('/documents/edit/{category_id}/{id}', [AdminDocumentsPageController::class, 'editDocuments']);
    Route::post('/documents/edit/{category_id}/{id}', [DocumentsController::class, 'updateDocuments'])->name('update.documents');
    Route::delete('/documents/{category_id}/{id}', [DocumentsController::class, 'destroyDocument'])->name('document.destroy');

    //Prvacinja routes
    Route::get('/prvacinja', [PrvacinjaController::class, 'index'])->name('index.prvacinja');
    Route::get('/prvacinja/add', [PrvacinjaController::class, 'create']);
    Route::get('/prvacinja/{year}', [PrvacinjaController::class, 'show'])->name('prvacinja.by.year');
    Route::post('/prvacinja/add', [PrvacinjaController::class, 'store'])->name('store.prvacinja');
    Route::delete('/prvacinja/delete/{prvacinja}', [PrvacinjaController::class, 'destroy'])->name('destroy.prvacinja');
    
    //Paralelki routes
    Route::get("/paralelki", [ParalelkiController::class, 'index'])->name('admin.paralelki');
    Route::get("/paralelki/add", [ParalelkiController::class, 'create']);
    Route::post("/paralelki/add", [ParalelkiController::class, 'store']);
    Route::delete("/paralelki/{id}", [ParalelkiController::class, 'destroy']);
  
    //Projects
    Route::get("/projects", [ProjectsController::class,"index"])->name('projects');
    Route::get("/projects/add", [ProjectsController::class,"create"])->name("");
    Route::post("/projects/add", [ProjectsController::class,"store"])->name("project.store");
    Route::get('/projects/edit/{id}',[ProjectsController::class, 'edit'])->name('edit.project');
    Route::post('/projects/edit/{id}',[ProjectsController::class, 'update'])->name('update.project');
    Route::delete("/projects/{id}", [ProjectsController::class,"destroy"])->name("project.destroy");

    //Activities controller
    Route::get('/aktivnosti',[ActivitiesController::class, 'index'])->name('activities.index');
    Route::get('/aktivnosti/add',[ActivitiesController::class, 'create'])->name('activities.create');
    Route::post('/aktivnosti/add',[ActivitiesController::class, 'store'])->name('activities.store');
    Route::get('/aktivnosti/edit/{id}',[ActivitiesController::class, 'edit'])->name('activities.edit');
    Route::put('/aktivnosti/edit/{id}',[ActivitiesController::class, 'update'])->name('activities.update');
    Route::delete('/aktivnosti/delete/{id}',[ActivitiesController::class, 'destroy'])->name('activities.destroy');

    //Public procurements route
    Route::get('/javni_nabavki',[PublicProcurementsController::class, 'index'])->name('public.procurements.index');
    Route::get('/javni_nabavki/add',[PublicProcurementsController::class, 'create'])->name('public.procurements.create');
    Route::post('/javni_nabavki/add',[PublicProcurementsController::class, 'store'])->name('public.procurements.store');
    Route::get('/javni_nabavki/edit/{id}',[PublicProcurementsController::class, 'edit'])->name('public.procurements.edit');
    Route::put('/javni_nabavki/update/{id}',[PublicProcurementsController::class, 'update'])->name('public.procurements.update');
    Route::delete('/javni_nabavki/destroy/{id}',[PublicProcurementsController::class, 'destroy'])->name('public.procurements.destroy');

    //Memory check
    Route::get('/dev', [Controller::class,'dev']);
});

// Frontend routes

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/gallery', [FrontendController::class, 'gallery']);
Route::get('/erasmus/{slug}', [FrontendController::class, 'show_erasmus']);
Route::get('/statut', [FrontendController::class, 'statut']);
Route::get('/finansiski_dokumenti', [FrontendController::class, 'finance']);
// Route::get('/finansiski_dokumenti/{year}', [FrontendController::class, 'show_finance']);
Route::get('/finansiski_dokumenti/{category_id}/{year}/{slug}', [FrontendController::class, 'show_single_finance']);
Route::get('/godisna_programa', [FrontendController::class, 'godisnaPrograma']);
Route::get('/skica', [FrontendController::class, 'plan']);
Route::get('/godisna_programa_za_rad_na_učilište_i_godišnji_i_polugodišnji izvestaji/{category_id}/{year}/{slug}', [FrontendController::class, 'show_single_finance']);
Route::get('/izvestaj_od_samoevaluacija/{category_id}/{year}/{slug}', [FrontendController::class, 'show_single_finance']);
Route::get('/razvojna_programa/{category_id}/{year}/{slug}', [FrontendController::class, 'show_single_finance']);
Route::get('/razvojna_programa', [FrontendController::class, 'razvojnaPrograma']);
Route::get('/integralna_inspekcija', [FrontendController::class, 'integralnaInspekcija']);
Route::get('/izvestaj_od_samoevaluacija', [FrontendController::class, 'evaluacija']);
Route::get('/pravilnici_i_propisi', [FrontendController::class, 'regulations']);
Route::get('/pravilnici_i_propisi/{slug}', [FrontendController::class, 'showRegulations']);
Route::get('/ucestvo_na_natprevari_i_ostali_nagradi/{year}', [FrontendController::class, 'showCompetitions']);
Route::get('/ucestvo_na_natprevari_i_ostali_nagradi/{category_id}/{year}/{slug}', [FrontendController::class, 'show_single_finance']);
Route::get('/megjuetnicka_integracija_vo_obrazovanieto', [FrontendController::class, 'megjuetnickaIntegracija']);
Route::get('/megjuetnicka_integracija_vo_obrazovanieto/{category_id}/{year}/{slug}', [FrontendController::class, 'show_single_finance']);
Route::get('/rakovoditeli_na_paralelki', [FrontendController::class, 'rakovoditeljiNaParalelki']);
Route::get('/vizija_i_misija', [FrontendController::class, 'misijaIVizija']);
Route::get('/novosti', [FrontendController::class, 'news']);
Route::get('/novosti/{slug}', [FrontendController::class, 'newsShow']);
Route::get('/kontakt', [FrontendController::class, 'showContact']);
Route::post('/kontakt', [ContactFormController::class, 'sendEmail'])->name('contact.send');
Route::get("/prvacinja/{year}", [FrontendController::class, 'prvacinja']);
Route::get('/informacii_od_javen_karakter', [FrontendController::class, 'publicInformations']);
Route::get('/za_nasiot_patron', [FrontendController::class, 'patron']);
Route::get('/raspored_na_zvonenje', [FrontendController::class, 'rasporedNaZvonenje']);
Route::get('/under_construction', [FrontendController::class, 'underConstruction']);
Route::get("/planiranja_za_ocenuvanje", [FrontendController::class, 'grades']);
Route::get('/ucenicka_tela', [FrontendController::class, 'ucenickaTela']);
Route::get('/raspored_na_smeni', [FrontendController::class, 'smeni']);
Route::get('/etvining', [FrontendController::class, "etvining"]);
Route::get('/etvining/{category_id}/{year}/{slug}', [FrontendController::class, "show_single_finance"]);
Route::get('/javni_nabavki', [FrontendController::class, 'publicProcurements']);
Route::get('/aktivnosti/{year}', [FrontendController::class, 'activities']);
Route::get('/aktivnosti/{year}/{slug}', [FrontendController::class, 'showActivities'])->name('aktivities.show');
Route::get('/projekti/{year}', [FrontendController::class, 'projects']);
Route::get('/projekti/{year}/{slug}', [FrontendController::class, 'projectsShow'])->name('projects.show');
Route::get("/slobodni_izborni_predmeti", [FrontendController::class, 'izborni']);
Route::get("/licna_karta", [FrontendController::class, 'licnaKarta']);
Route::get("/razvoj_i_istorijat", [FrontendController::class, 'razvojIIstorijat']);
Route::get("/organizacija", [FrontendController::class, 'organizacija']);
Route::get("/prijemni_denovi_na_ucilisteto", [FrontendController::class, 'prijemniDenoviNaUciliste']);
Route::get("/prijemni_denovi_na_nastavnicite", [FrontendController::class, 'prijemniDenoviNaNastavnici']);
Route::get("/raspored_na_oddelenska_nastava", [FrontendController::class, 'oddelenskaNastava']);
Route::get("/raspored_na_predmetna_nastava", [FrontendController::class, 'predmetnaNastava']);
Route::fallback(function () {
        return view('errors.404');
    });