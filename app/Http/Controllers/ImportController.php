<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use SheetDB\SheetDB;


class ImportController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('import_list');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fileImport(Request $request)
    {
        $sheet_db = new SheetDB(env('SHEET_DB_ID'));
        $response = $sheet_db->get();
        Products::create($response);
        return  back()->with('success','Item created successfully!');
    }

}
