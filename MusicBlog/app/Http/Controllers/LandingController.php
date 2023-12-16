<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Like;
use Illuminate\Http\JsonResponse;

class LandingController extends Controller
{
    //
    public function index(){
        $songs = Song::all();
        return view('welcome', compact("songs"));
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
}
