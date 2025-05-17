<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'rating' => 'required|integer|between:1,5',
            'film_id' => 'nullable|exists:films,id',
            'show_id' => 'nullable|exists:shows,id'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'film_id' => $request->film_id,
            'show_id' => $request->show_id,
            'content' => $request->content,
            'rating' => $request->rating
        ]);

        return back()->with('success', 'Commentaire ajouté !');
    }

    public function report(Comment $comment)
    {
        if($comment->addReport(Auth::id())) {
            return back()->with('success', 'Commentaire signalé');
        }
        
        return back()->with('error', 'Vous avez déjà signalé ce commentaire');
    }


    public function destroy(Comment $comment)
    {
        // Vérifier que l'utilisateur est bien l'auteur du commentaire
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Action non autorisée');
        }

        $comment->delete();
        return back()->with('success', 'Commentaire supprimé !');
    }
      public function delete($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            Session::flash('error', 'Comment not found.');
            return Redirect::back();
        }

        $comment->delete();

        Session::flash('success', 'Comment deleted successfully.');
        return Redirect::back();
    }
}