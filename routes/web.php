<?php

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
// Login routes

Route::get('/login', [LoginController::class, 'getLogin'])->name('login_view');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware('auth')->group(function(){
    // news routes
    Route::get('/admin', [Controller::class, 'index']);
    Route::get('/admin/news', [AdminNewsPagesController::class, 'index']);
    Route::get('/admin/news/add', [AdminNewsPagesController::class, 'store']);
    Route::post('/admin/news/add', [NewsController::class, 'store']);
    Route::get('/admin/news/edit/{id}', [AdminNewsPagesController::class, 'edit'])->name('admin.news.edit');
    Route::post('/admin/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
    Route::get('/admin/news/search', [NewsController::class, 'search'])->name('search.news');


    // gallery routes
    Route::get('/admin/gallery', [AdminGaleryPagesController::class, 'index']);
    Route::get('/admin/gallery/add', [AdminGaleryPagesController::class, 'store']);
    Route::post('/admin/gallery/add', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // erasmus routes
    Route::get('/admin/erasmus', [AdminDocumentsPageController::class, 'index_erasmus']);
    Route::get('/admin/erasmus/add', [AdminDocumentsPageController::class, 'show_add_erasmus']);
    Route::post('/admin/erasmus/add', [DocumentsController::class, 'store_erasmus']);
    Route::get('/admin/erasmus/edit/{id}', [AdminDocumentsPageController::class, 'edit_erasmus'])->name('erasmus.edit.show');
    Route::post('/admin/erasmus/edit/{id}', [DocumentsController::class, 'edit_erasmus'])->name('erasmus.update');
    Route::delete('/admin/erasmus/{id}', [DocumentsController::class, 'destroy_erasmus'])->name('erasmus.destroy');
    
    // Documents route
    Route::get('/admin/documents', [AdminDocumentsPageController::class, 'index_documents']);
    Route::get('/admin/documents/add', [AdminDocumentsPageController::class, 'create_documents']);
    Route::post('/admin/documents/add', [DocumentsController::class, 'storeDocuments'])->name('store.documents');
    Route::get('/admin/documents/category/{id}', [AdminDocumentsPageController::class, 'documentsByCategories'])->name('admin.documents.category');
    Route::get('/admin/documents/edit/{category_id}/{id}', [AdminDocumentsPageController::class, 'editDocuments']);
    Route::post('/admin/documents/edit/{category_id}/{id}', [DocumentsController::class, 'updateDocuments'])->name('update.documents');
    Route::delete('/admin/documents/{category_id}/{id}', [DocumentsController::class, 'destroyDocument'])->name('document.destroy');

    //Prvacinja routes
    Route::get('/admin/prvacinja', [PrvacinjaController::class, 'show']);
    Route::get('/admin/prvacinja/add', [PrvacinjaController::class, 'create']);
    Route::post('/admin/prvacinja/add', [PrvacinjaController::class, 'store']);
    Route::delete('/admin/prvacinja/delete/{id}', [PrvacinjaController::class, 'destroy']);
    
    //Paralelki routes
    Route::get("/admin/paralelki", [ParalelkiController::class, 'index'])->name('admin.paralelki');
    Route::get("/admin/paralelki/add", [ParalelkiController::class, 'create']);
    Route::post("/admin/paralelki/add", [ParalelkiController::class, 'store']);
    Route::delete("/admin/paralelki/{id}", [ParalelkiController::class, 'destroy']);
    
});

// Frontend routes

Route::get('/', [FrontendController::class, 'index']);
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
Route::get('/novosti/{id}', [FrontendController::class, 'newsShow']);
Route::get('/kontakt', [FrontendController::class, 'showContact']);
Route::post('/kontakt', [ContactFormController::class, 'sendEmail'])->name('contact.send');
Route::get("/prvacinja", [FrontendController::class, 'prvacinja']);
Route::get('/informacii_od_javen_karakter', [FrontendController::class, 'publicInformations']);
Route::get('/za_nasiot_patron', [FrontendController::class, 'patron']);
Route::get('/raspored_na_zvonenje', [FrontendController::class, 'rasporedNaZvonenje']);
Route::get('/under_construction', [FrontendController::class, 'underConstruction']);
Route::get("/planiranja_za_ocenuvanje", [FrontendController::class, 'grades']);
Route::get('/ucenicka_tela', [FrontendController::class, 'ucenickaTela']);
Route::get('/raspored_na_smeni', [FrontendController::class, 'smeni']);
Route::get('/etvining', [FrontendController::class, "etvining"]);
Route::get('/etvining/{category_id}/{year}/{slug}', [FrontendController::class, "show_single_finance"]);
Route::fallback(function () {
        return view('errors.404');
    });