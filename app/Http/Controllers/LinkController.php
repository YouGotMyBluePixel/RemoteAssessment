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
        $id = $request->get('id');
        
        return Links::updateOrCreate(
            ['id'=>$id],
            [
            'id'=>$id,
            'Link_Title' => $request->input('Link_Title'),
            'Link' => $request->input('Link'),
            'New_Tab' => $tab,
        ]);
        
    }
    public function show($id)
    {
        $Links = Links::find($id);
        return response()->json($Links);
    }
    public function destroy($id)
    {
        $Links = Links::find($id);
        $Links->delete();

        return response()->json('Links deleted!');
    }
}
