<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\News;
use App\Models\Erasmus;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Documents;
use App\Models\Takmicenja;
use App\Models\Regulations;
use Illuminate\Http\Request;
use App\Models\DocumentCategories;
use App\Models\Etvining;
use App\Models\GodisnjiIzvjestaji;
use App\Services\DocumentsService;
use App\Models\FinansiskiDokumenti;
use App\Models\IntegralnaInspekcija;
use App\Models\IzvjestajOdSamoevaluacija;
use App\Models\MedjuetnickaIntegracija;
use App\Models\Paralelki;
use App\Models\Projekti;
use App\Models\Prvacinja;
use App\Models\PublicProcurements;
use App\Models\RazvojnaPrograma;
use App\Services\FrontendService;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class FrontendController extends Controller
{   
    protected $service;
    public function __construct( FrontendService $service)
    {
        $this-> service = $service;
    }

    public function index()
    {
        // Fetch news and galleries separately but simultaneously
        $news = News::latest()->take(6)->get();
        $galleryQuery = Gallery::take(4)->get();

        // Execute both queries simultaneously
        $results = [
            'news' => $news,
            'gallery' => $galleryQuery,
        ];

        return view('frontend_views.index', $results);
    }
    public function gallery(){
        $images = Gallery::select('image')->get();
        return view('frontend_views.gallery', compact('images'));
    }
    public function show_erasmus($slug){
        $project = Erasmus::where('slug',$slug)->firstOrFail();

        return view('frontend_views.documents.erasmus', compact('project'));
    }
    public function statut(){
        return view('frontend_views.documents.statut');
    }
    public function finance(){
        $documents = $this->service->GetDocuments(FinansiskiDokumenti::class);
        return view('frontend_views.documents.finansijski_dokumenti', compact('documents'));
    }
    // public function show_finance($year){
    //     $finance = Documents::where('year', $year)->get();

    //     return view('frontend_views.documents.show_finansiski_dokumenti', compact('finance'));
    // }
    public function show_single_finance($category_id,$year,$slug){
        switch ($category_id) {
            case 1:
                $document =FinansiskiDokumenti::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            case 2:
                $document =GodisnjiIzvjestaji::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            case 3:
                $document =RazvojnaPrograma::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            case 4:
                $document =IzvjestajOdSamoevaluacija::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            case 5:
                $document = IntegralnaInspekcija::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            case 6:
                $document = Takmicenja::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            case 7:
                $document = MedjuetnickaIntegracija::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            case 8:
                $document = Etvining::where('year', $year)->where('slug', $slug)->firstOrFail();
                break;
            default:
                // Handle invalid category_id
                return null;
        }
        

        return view('frontend_views.documents.show_documents', compact('document'));
    }

    public function godisnaPrograma(){

       $documents = $this->service->GetDocuments(GodisnjiIzvjestaji::class);
       $data = $documents;
       $uniqueYears = $this->service->GetUniqueYears($data);
        return view('frontend_views.documents.godisna_programa', compact('documents', 'uniqueYears'));
    }
     // $documents = GodisnjiIzvjestaji::orderBy('year', 'desc')->get();

        // // Group documents by year
        // $groupedDocuments = $documents->groupBy('year');

        // // Sort groups by year in descending order
        // $groupedDocuments = $groupedDocuments->sortKeysDesc();

        // // Sort each group by end_year if it exists
        // $sortedDocuments = collect();
        // foreach ($groupedDocuments as $year => $group) {
        //     if ($group->first()->end_year !== null) {
        //         $group = $group->sortByDesc('end_year');
        //     }
        //     $sortedDocuments = $sortedDocuments->merge($group);
        // }
        // $documents = GodisnjiIzvjestaji::orderBy('year', 'desc')->get();
        // $uniqueYears = $documents->pluck('year')->unique()->toArray();
        // $endYears = $documents->pluck('end_year')->unique()->toArray();
        // rsort($uniqueYears);
        // rsort($endYears);
    public function razvojnaPrograma(){
        $documents = $this->service->GetDocuments(RazvojnaPrograma::class);
        return view('frontend_views.documents.razvojna_programa', compact('documents'));
    }
    public function integralnaInspekcija(){
       $documents = $this->service->GetDocuments(integralnaInspekcija::class);
        return view('frontend_views.documents.integralna_inspekcija', compact('documents'));
    }
    public function plan(){
        return view('frontend_views.documents.plan');
    }
    public function evaluacija(){
        $documents = $this->service->GetDocuments(IzvjestajOdSamoevaluacija::class);
        return view('frontend_views.documents.izvjestaj_od_samoevaluacija', compact('documents'));
    }
    public function regulations(){
        $regulations = Regulations::select('name', 'slug')->get();
        return view('frontend_views.documents.regulations', compact('regulations'));
    }
    public function showRegulations($slug){
        $regulation = Regulations::where('slug', $slug)->first();
        return view('frontend_views.documents.show_regulations', compact('regulation'));
    }
    public function rakovoditeljiNaParalelki(){
        $paralelki = Paralelki::select('odelenska', 'predmetna')->first();
        return view('frontend_views.students.rukovoditelji_na_paralelki', compact('paralelki'));
    }
    public function showContact(){
        return view('frontend_views.contact');
    }
    public function showCompetitions($year)  {
        // $documents = Takmicenja::all();
        $documents = Takmicenja::where('year', $year)->get();
        return view('frontend_views.natpravari', compact('documents'));
        
    }
    public function misijaIVizija(){
        return view('frontend_views.za_nas.misija_i_vizija');
    }
    public function news(){
        $news = News::orderBy('created_at', 'desc')->get();
        return view('frontend_views.news.news', compact('news'));
    }
    public function newsShow($slug){
        $news = News::where('slug',$slug)->first();
        return view('frontend_views.news.news_show', compact('news'));
    }
    
    public function prvacinja($year){
        
        $prvacinja = Prvacinja::where('year', $year)->get();
        $year = str_replace('-', '/', $year);
        return view('frontend_views.prvacinja', compact('prvacinja', 'year'));
    }

    public function publicInformations(){
        return view('frontend_views.public_informations');
    }
    public function patron(){
        return view('frontend_views.za_nas.patron');
    }
    public function rasporedNaZvonenje(){
        return view('frontend_views.rasporedi.rasporedi_na_zvonenje');
    }
    public function underConstruction() {
        return view('frontend_views.under_construction');
    }
    public function grades(){
        return view('frontend_views.classes.grades');
    }
    public function ucenickaTela (){
        return view('frontend_views.students.ucenicka_tela');
    }
    public function smeni(){
        return view('frontend_views.rasporedi.rasporedi_na_smeni');
    }
    public function megjuetnickaIntegracija(){
        $data = MedjuetnickaIntegracija::all();
        return view('frontend_views.medjuetnicka_integracija', compact('data'));
    }
    public function etvining(){
        $data = Etvining::all();
        return view('frontend_views.etvining', compact('data'));
    }
    public function izborni(){
        return view('frontend_views.classes.izborni');
    }
    public function publicProcurements(){
        $publicProcurements = PublicProcurements::all();
        return view("frontend_views.public_procurements", compact("publicProcurements"));
    }
    public function projects($year){
        $projects = Projekti::where('year',$year)->get();
        return view('frontend_views.projects.index', compact('projects','year'));
    }
    public function projectsShow($year, $slug){
        
        
        $project = Projekti::where('year',$year)->where('slug', $slug)->first();
        
        return view('frontend_views.projects.show', compact('project'));
    }
    public function activities($year){
        $activities = Activities::where('year', $year)->get();
        return view('frontend_views.activities.index', compact('activities', 'year'));
    }
    public function showActivities($year,$slug){
       
        echo $slug;
        $activity = Activities::where('year',$year)->where('slug', $slug)->first();
        return view('frontend_views.activities.show', compact('activity'));
    }
    public function licnaKarta(){
        return view('frontend_views.za_nas.licna_karta');
    }
    public function razvojIIstorijat(){
        return view('frontend_views.za_nas.razvoj_i_istorijat');
    }
    public function organizacija(){
        return view('frontend_views.za_nas.organizacija');
    }
    public function prijemniDenoviNaUciliste(){
        return view('frontend_views.za_nas.prijemni_denovi.prijemni_denovi_na_ucilisteto');
    }
    public function prijemniDenoviNaNastavnici(){
        return view('frontend_views.za_nas.prijemni_denovi.prijemni_denovi_na_nastavnicite');
    }
    public function oddelenskaNastava(){
        return view('frontend_views.rasporedi.raspored_na_odelenska');
    }
    public function predmetnaNastava(){
        return view('frontend_views.rasporedi.raspored_na_predmetna');
    }
}
