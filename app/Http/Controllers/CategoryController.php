<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $categories = Category::all();
        return response()->view('dashboard.categories.listCategories', compact('categories'));
    }

    /**
     * Display a listing of the resource on public site.
     */
    public function categoriesList(): Response
    {
        $categories = Category::all();
        return response()->view('publicsite.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): Response
    {
        $colors = $this->colors;
        return response()->view('dashboard.categories.addCategory', compact('colors'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'cost_lower' => 'required',
        ]);
        $data = $request->all();    // data transferred from form
        if (!empty($data['cost_upper'])) {
            if ($data['cost_lower'] >= $data['cost_upper']) {
                return back()->withErrors(['"Цена от" должна быть меньше чем "Цена до"']); 
            }else{
                Category::create($data);
                return redirect('/listCategories');
            }

        }else{
            Category::create($data);
            return redirect('/listCategories');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): Response
    {
        //
    }

    /**
     * Show the form for editing the category.
     */
    public function edit(Category $category): Response
    {
        $colors = $this->colors;
        return response()->view('dashboard.categories.editCategory', compact('colors', 'category'));
    }

    /**
     * Update the category in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'cost_lower' => 'required',
        ]);
        $data = $request->all();    // data transferred from form
        if (!empty($data['cost_upper'])) {
            if ($data['cost_lower'] >= $data['cost_upper']) {
                return back()->withErrors(['"Цена от" должна быть меньше, чем "Цена до"']); 
            }else{
                $category->update($data);
                return redirect('/listCategories');
            }

        }else{
            $category->update($data);
            return redirect('/listCategories');
        }

        
    }


    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
    // Check if the category is related to any gallery records
    $galleryCount = $category->gallery()->count();

    // Check if the category is related to any service records
    $serviceCount = $category->services()->count();

    if ($galleryCount > 0 || $serviceCount > 0) {
        // If the category is related to any records, soft-delete it
        $category->delete();
    } else {
        // If the category is not related to any records, delete it
        $category->forceDelete();
    }

    return redirect()->route('catList')->with('success', 'Категория удалена.');
    }






}
