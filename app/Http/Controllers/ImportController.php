<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

use App\Models\Order;

class ImportController
{
    public function index()
    {
        return view('import');
    }

    public function importCsv(Request $request)
    {
        $date = now()->format('Ymd');
        $filePath = storage_path("csv/orders_{$date}.csv");

        if (!file_exists($filePath)) {
            Log::info("CSVファイルが見つかりませんでした: {$filePath}");
            return back()->withErrors(['CSVファイルが見つかりませんでした。']);
        }

        $rows = array_map('str_getcsv', file($filePath));
        $header = array_map('trim', $rows[0]);
        unset($rows[0]);

        foreach ($rows as $row) {
            $data = array_combine($header, $row);

            Order::create([
                'ordered_at' => $data['timestamp'],
                'order_type' => $data['order_type'],
                'price' => (int) $data['price'],
                'vwap' => (float) $data['vwap'],
            ]);
        }

        Log::info('CSVのインポートが完了しました。');
        return back()->with('success', 'CSVのインポートが完了しました。');
    }


}