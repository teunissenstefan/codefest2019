<?php
/**
 * Created by PhpStorm.
 * User: thomas van minnen
 * Date: 4/17/19
 * Time: 16:56 AM
 */

namespace App\Http\Controllers;


use App\Category;
use App\User;
use Illuminate\Http\Request;

class CategorieenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function delete(category $category, Request $request)
    {
        $category->delete();
        $request->session()->flash('status', 'Categorieen verwijderd!');
        return redirect(route('categories.show'));
    }
}