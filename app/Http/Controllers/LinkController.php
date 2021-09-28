<?php

namespace App\Http\Controllers;
use App\Models\Links;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index() {
        $Links = Links::get();
        return response()->json($Links);
    }
    public function store(Request $request) {
        $tab = $request->get('New_Tab');
       
        $Links = new Links([
            'Link_Title' => $request->input('Link_Title'),
            'Link' => $request->input('Link'),
            'New_Tab' => $tab,
        ]);
        $Links->save();

        return response()->json('Links created!');
    }
    public function show($id)
    {
        $Links = Links::find($id);
        return response()->json($Links);
    }
}
