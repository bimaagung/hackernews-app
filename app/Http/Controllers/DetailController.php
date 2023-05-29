<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id) {
        $client = new Client();
        $response = $client->get('https://dark-readers-cross-quietly.a276.dcdg.xyz/api/news/story/'. $id);
        $data = $response->getBody()->getContents();
        $data = json_decode($data, true);
        if ($data === null) {
            return response()->json(['error' => 'Invalid JSON'], 400);
        }
        
        $formattedData = $this->formatData($data);
        if (!is_array($formattedData)) {
            return response()->json(['error' => 'Invalid data format'], 400);
        }

        return view('home.detail', ['data' => $formattedData["data"]]);
    }

    private function formatData($data)
    {
        return $data;
    }
}
