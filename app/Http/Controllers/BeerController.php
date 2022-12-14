<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class BeerController extends Controller
{
    public function show() {

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.session('beers_api_token'),
        ];

        $response = Http::withHeaders($headers)->get('http://localhost:8000/api/products');

        $beers = $this->paginate(json_decode($response, false)->data);

        return view('beers', compact('beers'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
