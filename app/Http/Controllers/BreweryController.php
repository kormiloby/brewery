<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BreweryService;

class BreweryController extends Controller
{
    private $service;

    /**
     * [__construct description]
     */
    public function __construct(BreweryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->getBreweries();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->service->getBrewery($id);
    }
}
