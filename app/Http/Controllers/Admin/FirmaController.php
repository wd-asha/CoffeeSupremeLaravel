<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Firma;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FirmasImport;
use App\Exports\FirmasExport;

class FirmaController extends Controller
{
    public function __construct()
    {
        /* actions for admin only */
        $this->middleware('admin');
    }

    /* ------------------ */
    /*   Show all firms   */
    /* ------------------ */
    public function index()
    {
        $firmas = Firma::latest()->paginate(5);
        return view('admin.firma.index', compact('firmas'));
    }
    /* end show all firms */

    /* --------------------- */
    /*    Create new firm    */
    /* --------------------- */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'title' => 'required|unique:firmas|min:2'
        ],
            [
                'title.required' => 'Please input firm name',
                'title.min' => 'Firma name less then 2 chars'
            ]);
        /* create firm */
        Firma::create([
            'title' => $request->title,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        /* to page with list firms */
        $notification = array(
            'message' => 'Firma added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end create new firm */

    /* ----------------- */
    /*    Delete firm    */
    /* ----------------- */
    public function delete($id)
    {
        Firma::find($id)->delete();
        /* to page with list firms */
        $notification = array(
            'message' => 'Firma removed',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end delete firm */

    /*public function fileImportExport()
    {
        return view('file-import');
    }*/

    /* ------------------------------- */
    /* Import firms from external file */
    /* ------------------------------- */
    public function fileImport(Request $request)
    {
        Excel::import(new FirmasImport, $request->file('file')->store('temp'));
        return back();
    }

    /* ----------------------------- */
    /* Export firms in external file */
    /* ----------------------------- */
    public function fileExport()
    {
        return Excel::download(new FirmasExport, 'firmas-export.xlsx');
    }
}
