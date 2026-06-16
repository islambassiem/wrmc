<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'doctors' => $this->doctors(),
        ]);
    }

    /**
     * @return Collection<int, Doctor>
     */
    private function doctors(): Collection
    {
        return Doctor::query()
            ->where(function ($query): void {
                $query->whereNull('resignation_date')
                    ->orWhere('resignation_date', '>=', CarbonImmutable::now()->startOfDay()->format('Y-m-d'));
            })
            ->select('id', 'name', 'slug', 'title', 'image')
            ->get();
    }
}
