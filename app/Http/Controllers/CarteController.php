<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Carte;
use App\Models\TailleCarte;
use App\Models\User;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    public function index()
    {
        $cartes = Carte::all();
        $categories = Category::all();
        return view('cartes.index', compact('cartes', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $tailles = TailleCarte::all();
        $proprietaires = User::all();

        return view('cartes.create', compact('categories', 'tailles', 'proprietaires'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
            'musique' => 'nullable|file|mimes:mp3,wav|max:10240',
            'video' => 'nullable|file|mimes:mp4,avi|max:10240',
            'description' => 'nullable|string',
            'id_categorie' => 'required|exists:categories,id',
            'id_taille_cart' => 'required|exists:taille_cartes,id',
            'id_proprietaire' => 'required|exists:users,id',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images') : null;
        $musiquePath = $request->file('musique') ? $request->file('musique')->store('musique') : null;
        $videoPath = $request->file('video') ? $request->file('video')->store('videos') : null;

        try {
            Carte::create([
                'titre' => $validatedData['titre'],
                'image' => $imagePath,
                'musique' => $musiquePath,
                'video' => $videoPath,
                'description' => $validatedData['description'] ?? null,
                'id_categorie' => $validatedData['id_categorie'],
                'id_taille_cart' => $validatedData['id_taille_cart'],
                'id_proprietaire' => $validatedData['id_proprietaire'],
                'date_creation' => now(),
            ]);
            return redirect()->route('cartes.index')->with('success', 'Carte créée avec succès');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la création de la carte : ' . $e->getMessage());
        }
    }

    public function edit(Carte $carte)
    {
        $categories = Category::all();
        $tailles = TailleCarte::all();
        $proprietaires = User::all();
        return view('cartes.edit', compact('carte', 'categories', 'tailles', 'proprietaires'));
    }

    public function update(Request $request, Carte $carte)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
            'musique' => 'nullable|file|mimes:mp3,wav|max:10240',
            'video' => 'nullable|file|mimes:mp4,avi|max:10240',
            'description' => 'nullable|string',
            'id_categorie' => 'required|exists:categories,id',
            'id_taille_cart' => 'required|exists:taille_cartes,id',
            'id_proprietaire' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('image')) {
            if ($carte->image) {
                Storage::disk('public')->delete($carte->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $carte->image = $imagePath;
        }

        if ($request->hasFile('musique')) {
            if ($carte->musique) {
                Storage::disk('public')->delete($carte->musique);
            }
            $musiquePath = $request->file('musique')->store('musique', 'public');
            $carte->musique = $musiquePath;
        }

        if ($request->hasFile('video')) {
            if ($carte->video) {
                Storage::disk('public')->delete($carte->video);
            }
            $videoPath = $request->file('video')->store('videos', 'public');
            $carte->video = $videoPath;
        }

        $carte->update($validatedData);

        return redirect()->route('cartes.index')->with('success', 'Carte mise à jour avec succès');
    }

    public function destroy(Carte $carte)
    {
        try {
            if ($carte->image) {
                Storage::disk('public')->delete($carte->image);
            }
            if ($carte->musique) {
                Storage::disk('public')->delete($carte->musique);
            }
            if ($carte->video) {
                Storage::disk('public')->delete($carte->video);
            }
            $carte->delete();
            return redirect()->route('cartes.index')->with('success', 'Carte supprimée avec succès');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression de la carte : ' . $e->getMessage());
        }
    }
}
