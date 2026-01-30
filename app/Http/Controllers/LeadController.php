<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): RedirectResponse
    {
        Lead::create([
            'name' => $request->validated('name'),
            'phone' => $request->validated('phone'),
            'status' => 'new',
        ]);

        return back()->with('lead_success', true);
    }
}
