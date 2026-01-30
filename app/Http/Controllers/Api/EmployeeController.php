<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $q = trim($request->input('q', ''));
        if (strlen($q) < 2) {
            return response()->json(['docs' => []]);
        }
        $like = '%' . str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $q) . '%';
        $docs = Employee::query()
            ->where('is_active', true)
            ->where(function ($query) use ($like) {
                $query->where('employee_id', 'like', $like)
                    ->orWhere('full_name', 'like', $like);
            })
            ->limit(10)
            ->get()
            ->map(fn (Employee $e) => [
                'fullName' => $e->full_name,
                'position' => $e->position,
                'employeeId' => $e->employee_id,
                'isActive' => $e->is_active,
            ])
            ->values()
            ->all();
        return response()->json(['docs' => $docs]);
    }
}
