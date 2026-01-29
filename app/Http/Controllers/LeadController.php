<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'personal_data_consent' => ['required', 'accepted'],
        ]);

        Lead::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'status' => 'new',
        ]);

        return back()->with('lead_success', true);
    }
}
