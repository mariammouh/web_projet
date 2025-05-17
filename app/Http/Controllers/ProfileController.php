<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {
        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($id);
        $profile = Profile::firstOrNew(['id' => $id]);
        
        if (!$profile->exists) {
            $profile->fill([
                'pic' => '/img/profile.png'
            ])->save();
        }

        return view('profile', [
            'user_profile' => $profile,
            'user' => $user
        ]);
    }

    public function store($id, Request $request)
    {
        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'title' => 'nullable|string|max:255',
            'school' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Gestion de l'image
        $profile = Profile::firstOrNew(['id' => $id]);
        if ($request->hasFile('file')) {
            // Supprimer l'ancienne image si elle existe
            if ($profile->pic && $profile->pic != '/img/profile.png') {
                Storage::disk('public')->delete(str_replace('/storage/', '', $profile->pic));
            }
            
            $path = $request->file('file')->store('profiles', 'public');
            $validated['pic'] = '/storage/' . $path;
        }

        // Mise à jour de l'utilisateur
        User::where('id', $id)->update([
            'name' => $validated['username'],
            'email' => $validated['email']
        ]);

        // Mise à jour du profil
        $profile->fill($validated)->save();

        return redirect()->back()
            ->with('success', 'Profil mis à jour avec succès!');
    }
}