<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    /**
     * Affiche la liste des catégories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Affiche le formulaire de création de catégorie.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Stocke une nouvelle catégorie dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|',
            'description' => 'nullable|string',
        ]);

        // FIXME : Que faire quand ca ne valide pas ?

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'number' => uniqid(),
        ];

      //$success = DB::table('categories')->insert($data);
        Category::create($data);
        // if ($success) {
        //     return response()->json(['message' => "L'enregistrement a été inséré avec succès !"]);
        // } else {
        //     return response()->json(['message' => "Échec lors de l'insertion de l'enregistrement."], 500);
        // }
        $categories = Category::all();
        
        # TODO : Maybe redirect with message in flashbag ?

        return redirect()->route('home')->with('success', 'Nouvelles catégories creéz avec succès');        
    }

    /**
     * Affiche les détails d'une catégorie spécifique.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Affiche le formulaire de modification d'une catégorie.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Met à jour une catégorie spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $category->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('home')->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Supprime une catégorie spécifique de la base de données.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('home')->with('success', 'Catégorie supprimée avec succès.');
    }
}
