<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $client = new Client();
        $response = $client->get('http://localhost:8080/api/news');
        $data = $response->getBody()->getContents();
        $data = json_decode($data, true);
        if ($data === null) {
            return response()->json(['error' => 'Invalid JSON'], 400);
        }
        
        $formattedData = $this->formatData($data);
        if (!is_array($formattedData)) {
            return response()->json(['error' => 'Invalid data format'], 400);
        }

        return view('news', ['items' => $formattedData["data"]]);
    }

     private function formatData($data)
    {
        return $data;
    }
}
