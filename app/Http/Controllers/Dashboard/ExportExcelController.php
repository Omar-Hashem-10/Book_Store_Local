<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Doctrine\Inflector\InflectorFactory;

class ExportExcelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $modelExport = "App\Exports\\". $request->model . 'Export';
        if(!class_exists($modelExport)) return redirect()->back()->with('error', 'model export not exist!');
        $inflector = InflectorFactory::create()->build();
        $plural = $inflector->pluralize($request->model);
        return Excel::download(new $modelExport,  $plural .'.xlsx');
    }
}
