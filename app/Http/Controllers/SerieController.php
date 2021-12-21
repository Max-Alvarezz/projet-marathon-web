<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Episode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class SerieController extends Controller
{
    function index()
    {
        $series = Serie::all();

        return view('series.listeSeries', ['serie' => $series]);
    }

    function index2($genre)
    {
        $series = Serie::where('genre',$genre)->get();
        return view('series.listeSeries', ['serie' => $series]);
    }

    function indexNote()
    {
        $series = Serie::select('*')->from('series')->where('note','!=','null')->orderBy('note', 'desc')->orderBy('nom', 'asc')->take(5)->get();

        $series2 = Serie::orderBy('premiere','DESC')->take(5) ->get();
        return view('series.echantillon', ['serie' => $series],['autreSerie' => $series2]);
    }


    function detail($id)
    {
        $serie = Serie::findOrFail($id);
        $e = Episode::whereRaw("serie_id=$id")->get();


        $serieTrie = [];

        foreach($e as $episode){
            if (array_key_exists($episode->saison,$serieTrie))
                $serieTrie  [$episode->saison][] = $episode;
            else
                $serieTrie [$episode->saison]  = [$episode];
        }


        return view('series.detail',['serie' => $serie],['serieTrie'=>$serieTrie]);
    }

    function updateDBViewEpisode($episodeId){
        $user = Auth::user();
        $episode = Episode::findOrFail($episodeId);
        $d=new \DateTime('now');
        $user->seen()->attach($episodeId,['date_seen'=>$d->format('Y-m-d')]);
        return redirect()->route('serie.detail',[$episode->serie->id]);
    }
    static function unseen($episodeId){
        $user = Auth::user();
        return $user->seen()->where('id', $episodeId)->first() === null;
    }

    /*function updateDBViewSerie($serieId){
        $user = Auth::user();
        $serie = Serie::findOrFail($serieId);
        $episodes = $serie->episodes;
        $d=new \DateTime('now');


        foreach($episodes as $episode){
            $user->seen()->attach($episode->id,['date_seen'=>$d->format('Y-m-d')]);
        }

        return redirect()->route('serie.detail',[$serie->serie->id]);
    }
    */

    public function store(Request $request){
        $this-> validate($request,['commentaire' => 'required',
            'note' => 'required']);
        $comments = new Comment();
        $comments -> content = request('commentaire');
        $comments -> note = request($_POST['note']);
        $comments -> user_id = Auth::user()->id;
        $comments -> validated = 0;
        $comments -> serie_id = request('id');
        $comments-> save();
        return back();
    }
}
