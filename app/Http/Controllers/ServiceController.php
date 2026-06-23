<?php

namespace App\Http\Controllers;

use Throwable;
use App\Actions\CreateServiceAction;
use App\Actions\DeleteServiceAction;
use App\Actions\UpdateServiceAction;
use App\Data\ServiceData;
use App\Enums\Permission;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.services.index', [
            'services' => Service::query()->get(),
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
    public function store(StoreServiceRequest $request): RedirectResponse
    {
        resolve(CreateServiceAction::class)->handle(
            new ServiceData(
                name: $request->string('name')->value(),
                image: $request->file('image'),
                parent_id: $request->filled('parent_id') ? $request->integer('parent_id') : null,
            )
        );

        return back()->with('success', 'Service created successfully');
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
    public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
    {
        resolve(UpdateServiceAction::class)->handle(
            new ServiceData(
                name: $request->string('name')->value(),
                image: $request->file('image'),
                parent_id: $request->filled('parent_id') ? $request->integer('parent_id') : null,
            ),
            $service
        );

        return back()->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        try {
            resolve(DeleteServiceAction::class)->handle($service);

            return back()->with('success', 'Service deleted successfully');
        } catch (Throwable $throwable) {
            return back()->with('error', $throwable->getMessage());
        }
    }

    public function deleteImage(Service $service): RedirectResponse
    {
        Gate::authorize(Permission::SERVICE_UPDATE);

        if (! empty($service->image) && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
            $service->image = null;
            $service->save();
        }

        return back()->with('success', 'Image deleted successfully');
    }
}
