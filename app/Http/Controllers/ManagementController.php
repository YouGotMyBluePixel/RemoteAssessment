<?php

namespace App\Http\Controllers;
use App\Models\Html;
use App\Models\Links;
use App\Models\PDFs;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // File Upload
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);
         $File = new File;
         if($request->file()) {
             $file_name = time().'_'.$request->file->getClientOriginalName();
             $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
 
             $File->name = time().'_'.$request->file->getClientOriginalName();
             $File->path = '/storage/' . $file_path;
             $File->save();
 
             return response()->json(['success'=>'File uploaded successfully.']);
         }
    }
    public function getHtml(Request $request)
    {
        $Html = Html::get();
        return response()->json($Html);
    }    
    public function getLinks(Request $request)
    {
        $Links = Links::get();
        return response()->json($Links);
    }    
    public function getPdfs(Request $request)
    {
        $PDFs = PDFs::get();
        return response()->json($PDFs);
    }   
       
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
