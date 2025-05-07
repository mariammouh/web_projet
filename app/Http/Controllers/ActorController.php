<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
class ActorController extends Controller
{
    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'biography' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('actors', 'public');
        }

        Actor::create($data);

        return redirect()->back()->with('success', 'Acteur ajouté avec succès !');
    }
}
