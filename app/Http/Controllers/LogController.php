<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'orders'); // orders, signals, errors
        $files = collect(File::files(storage_path("app/output")))
            ->filter(fn($file) => str_contains($file->getFilename(), $type))
            ->sortByDesc(fn($file) => $file->getMTime());

        return view('logs.index', compact('files', 'type'));
    }

    public function show(Request $request, string $filename)
    {
        $path = storage_path("app/output/{$filename}");
        if (!File::exists($path)) abort(404);

        $rows = array_map('str_getcsv', file($path));
        return view('logs.show', [
            'rows' => $rows,
            'filename' => $filename
        ]);
    }
}
