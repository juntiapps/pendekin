<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    //
    public function index()
    {
        return view('landing');
    }

    public function create()
    {
        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

        $shortURLObject = $builder->destinationUrl(request()->url)->make();
        $shortURL = $shortURLObject->default_short_url;
        // $urls = \AshAllenDesign\ShortURL\Models\ShortURL::latest()->first();
        // dd($shortURLObject);
        // return back()->with('success','URL shortened successfully. ');
        return response()->json(['status'=>200,'id'=>$shortURLObject->id]);
    }

    public function update($id)
    {
        $url = \AshAllenDesign\ShortURL\Models\ShortURL::find($id);
        $url->url_key = request()->url;
        $url->destination_url = request()->destination;
        $url->save();
    
        return back()->with('success','URL updated successfully. ');
    }
    public function result($id){
        $urls = \AshAllenDesign\ShortURL\Models\ShortURL::find($id);

        return response()->json(['url'=>$urls]);

    }
}
