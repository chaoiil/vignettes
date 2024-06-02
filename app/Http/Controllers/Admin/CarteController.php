<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carte;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    public function index()
    {
        $cartes = Carte::all();
        return view('admin.cartes.index', compact('cartes'));
    }

    public function edit(Carte $carte)
    {
        return view('admin.cartes.edit', compact('carte'));
    }

    public function update(Request $request, Carte $carte)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|string',
            'musique' => 'nullable|string',
            'video' => 'nullable|string',
            'description' => 'nullable|string',
            'id_categorie' => 'required|integer',
            'id_taille_cart' => 'required|integer',
            'id_proprietaire' => 'required|integer',
        ]);

        $carte->update($request->all());

        return redirect()->route('admin.cartes.index')->with('success', 'Carte mise à jour avec succès.');
    }

    public function toggleActive(Carte $carte)
    {
        $carte->active = !$carte->active;
        $carte->save();

        return redirect()->route('admin.cartes.index')->with('success', 'Statut de la carte mis à jour avec succès.');
    }
}
