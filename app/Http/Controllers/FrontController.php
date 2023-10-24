<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Grind;
use App\Models\Weight;
use App\Models\Coffee;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Team;
use App\Models\Town;
use App\Models\Country;
use App\Models\Equipment;
use App\Filters\SearchFieldFilter;
use Image;

class FrontController extends Controller
{
    /* --------------------------------- */
    /*          Show main page           */
    /* --------------------------------- */
    public function index()
    {
        /* prepare data */
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        $posts = Post::latest()->orderBy('id', 'desc')->paginate(3);
        /* to main page */
        return view ('front', compact('equipments', 'coffees', 'subcategories', 'categories', 'brands', 'grinds', 'weights', 'posts'));
    }
    /* ------ end show main page ------ */

    /* --------------------------------- */
    /*        Show wholesale page        */
    /* --------------------------------- */
    public function wholesale()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.wholesale', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ---- end show wholesale page ---- */

    /* --------------------------------- */
    /*        Show locations page        */
    /* --------------------------------- */
    public function locations()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.locations', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ---- end show locations page ---- */

    /* --------------------------------- */
    /*        Show carriers page         */
    /* --------------------------------- */
    public function carriers()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.carriers', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ---- end show carriers page ----- */

    /* --------------------------------- */
    /*      Show ourpurpose page         */
    /* --------------------------------- */
    public function ourpurpose()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.ourpurpose', compact('subcategories', 'equipments', 'coffees'));
    }
    /* ---- end show ourpurpose page ---- */

    /* --------------------------------- */
    /*          Show blog page           */
    /* --------------------------------- */
    public function journal(SearchFieldFilter $request)
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $rubrics = Rubric::all();
        $subcategories = SubCategory::all();
        $id = 0;
        /*$posts = Post::latest()->orderBy('id', 'desc')->paginate(3);*/
        $posts = Post::filter($request)->orderBy('id', 'desc')->paginate(3);
        return view('front.journal', compact('subcategories', 'posts', 'coffees', 'equipments', 'rubrics', 'id'));
    }
    /* ------ end show blog page ------- */

    /* --------------------------------- */
    /*            Show post              */
    /* --------------------------------- */
    public function showPost($id)
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $rubrics = Rubric::all();
        $subcategories = SubCategory::all();
        $post = Post::find($id);
        return view('front.post', compact('subcategories', 'coffees', 'rubrics', 'post', 'equipments'));
    }
    /* -------- end show post ---------- */

    /* --------------------------------- */
    /*     Filter posts on categories    */
    /* --------------------------------- */
    public function filtering($id)
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $rubrics = Rubric::all();
        $subcategories = SubCategory::all();
        if($id === 0) {
            $posts = Post::all();
        }else {
            $posts = Post::latest()->where('rubric_id', $id)->paginate(3);
        }
        return view('front.journal', compact('subcategories', 'posts', 'coffees', 'rubrics', 'id', 'equipments'));
    }
    /*  end filter posts on categories   */

    /* --------------------------------- */
    /*    Filter members team on town    */
    /* --------------------------------- */
    public function filteringTeam($id)
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        $countries = Country::all();
        $teams = Team::latest()->where('country_id', $id)->paginate(4);
        return view('front.teams', compact('teams', 'coffees', 'countries', 'id', 'equipments', 'subcategories'));
    }
    /* end Filter members team on town */

    /* --------------------------------- */
    /*         Show contacts page        */
    /* --------------------------------- */
    public function contacts()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.contacts', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ----- end Show contact page ----- */

    /* --------------------------------- */
    /*         Show history page         */
    /* --------------------------------- */
    public function history()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.history', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ----- end Show history page ----- */

    /* --------------------------------- */
    /*        Show delivery page         */
    /* --------------------------------- */
    public function delivery()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.delivery', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ---- end Show delivery page ----- */

    /* --------------------------------- */
    /*         Show office page          */
    /* --------------------------------- */
    public function office()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.office', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ----- end Show office page ------ */

    /* --------------------------------- */
    /*          Show help page           */
    /* --------------------------------- */
    public function help()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.help', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ------ end Show help page ------- */

    /* --------------------------------- */
    /*         Show policy page          */
    /* --------------------------------- */
    public function policy()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.policy', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ----- end Show policy page ------ */

    /* --------------------------------- */
    /*        Show keeping page          */
    /* --------------------------------- */
    public function keeping()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view('front.keeping', compact('coffees', 'equipments', 'subcategories'));
    }
    /* ----- end Show keeping page ----- */

    /* --------------------------------- */
    /*        Show our team page         */
    /* --------------------------------- */
    public function teams()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        $towns = Town::all();
        $countries = Country::all();
        $id = 0;
        $teams = Team::latest()->orderBy('id', 'asc')->paginate(4);
        return view('front.teams', compact('teams', 'coffees', 'id', 'countries', 'towns', 'equipments', 'subcategories'));
    }
    /* ---- end Show our team page ----- */
}
