<?php

namespace App\Http\Controllers;
use App\Models\Html;

use Illuminate\Http\Request;

class HtmlController extends Controller
{
    public function store( Request $request)
    {
        $id = $request->get('id');
        $Snippet=$request->get('Html_Snippet');
        $Title=$request->get('Html_Title');
        $Description=$request->get('Snippet_Description');

        return Html::updateOrCreate(
            ['id'=>$id],
            [
            'id'=>$id,
            'Html_Snippet' =>$Snippet,
            'Html_Title' => $Title,
            'Snippet_Description' => $Description,
            
            ]);
    }
    public function index(Request $request)
    {
        $Html = Html::get();
        return response()->json($Html);
    }    
    public function show($id)
    {
        $Html = Html::find($id);
        return response()->json($Html);
    }
    public function destroy($id)
    {
        $Html = Html::find($id);
        $Html->delete();

        return response()->json('Html deleted!');
    }
    
       
}
