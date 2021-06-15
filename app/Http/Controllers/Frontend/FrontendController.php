<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Repositories\Frontend\Commandes\CommandeRepository;
/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{

    public $total=0;
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.index', compact('google_analytics', $google_analytics));
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }


    /**
     * show page by $commande_id.
     */


    public function showCommande($id, CommandeRepository $commande)
    {
        $result2 = $commande->findById($id);

        return view('frontend.commandes.index')
            ->withcommande($result2);


    }
    public  function showCommandeDet(){

    }
}
