<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PDFs;

class PdfController extends Controller
{
    public function index(Request $request)
    {
        $PDFs = PDFs::get();
        return response()->json($PDFs);
    }   
    public function destroy($id)
    {
        $PDFs = PDFs::find($id);
        $PDFs->delete();
        return response()->json('PDFs deleted!');
    }
}
