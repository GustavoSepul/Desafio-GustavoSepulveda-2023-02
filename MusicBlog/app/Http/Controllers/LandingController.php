<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Singer;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
    //
    public function index(){
        $songs = Song::all();
        $user = Auth::user();
        $albums = Album::all();
        $singers = Singer::all();
        $cancionesConMasLikes = Like::select('song_id', \DB::raw('count(*) as total_likes'))
        ->groupBy('song_id')
        ->orderByDesc('total_likes')
        ->limit(5)
        ->get();

        // if ($user && $user->hasRole('admin')) {
        //     return view('home', compact('songs','albums','singers'));
        // } elseif ($user) {
        //     return view('welcome', compact('songs','user','albums','singers','cancionesConMasLikes'));
        // } else {
        return view('welcome', compact('songs','user','albums','singers','cancionesConMasLikes'));
        // }
        
    }

    public function like():JsonResponse{
        $song = Song::find(request()->id);

        if($song->isLikedByLoggedInUser()){
            //dislike
            $result = Like::where([
                'user_id' => auth()->user()->id,
                'song_id' => request()->id
            ])->delete();
            return response()->json([
                'count' =>Song::find(request()->id)->likes->count(),
                'color' => 'text-dark'
            ], 200);

        }else{
            //like
            $like = new Like();
            $like->user_id = auth()->user()->id;
            $like->song_id = request()->id;
            $like->save();
            return response()->json([
                'count' =>Song::find(request()->id)->likes->count(),
                'color' => 'text-danger'
            ], 200);
        }
    }

    function likeList(){
        return view('likeList');
    }
    
}
