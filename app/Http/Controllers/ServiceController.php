<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Post;
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.services.index', [
            'services' => Service::query()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request): void
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): void
    {
        //
    }
}
