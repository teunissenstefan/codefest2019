<?php
/**
 * Created by PhpStorm.
 * User: thomas van minnen
 * Date: 4/17/19
 * Time: 16:56 AM
 */

namespace App\Http\Controllers;


use App\Category;
use App\GoVadisEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('admin.categorieen.index')->with($data);
    }

    public function edit(Category $category, Request $request)
    {
        $data = [
            'category' => $category
        ];
        return view('admin.categorieen.edit')->with($data);
    }

    public function update(category $category, Request $request)
    {
        $category->fill($request->all());
        $category->save();
        $data = [
            'category' => $category
        ];
        $request->session()->flash('status', 'Categorieen aangepast!');
        return redirect(route('categories.show'));
    }

    public function new()
    {
        $categories = GoVadisEvent::all();
        if(Auth::User()->can('organizer_action') == true){
            return view("admin/categorieen/new");
        }
        elseif(Auth::User()->can('admin_action') == true){
            return view("admin/categorieen/new");
        }
        else {
            return view("events/events", ["events"=>$categories]);
        }
    }

    public function insert(Request $request)
    {
        if(Auth::User()->can('admin_action') == true){
            $category = new Category();
            $category->fill($request->all());
            $category->save();
            $request->session()->flash('status', 'Categrorie toegevoegd!');
            return redirect(route('categories.show'));
        }
    }

    public function delete(category $category, Request $request)
    {
        $category->delete();
        $request->session()->flash('status', 'Categorieen verwijderd!');
        return redirect(route('categories.show'));
    }
}



