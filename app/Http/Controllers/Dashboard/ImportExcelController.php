<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
            'model' => 'required|string'
        ]);

        $modelImport = "App\Imports\\" . $request->model . "import";

        if(!class_exists($modelImport)) return redirect()->back()->with('error', 'model import not exist');

        try {
            Excel::import(new $modelImport, $request->file('file'));
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->with('error', 'error happended while importing file');
        }
        return redirect()->back()->with('success', 'All good');
    }
}
