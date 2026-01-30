<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Services\PhoneNormalizer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PhoneCheckController extends Controller
{
    public function check(Request $request): JsonResponse
    {
        $phone = trim($request->input('phone', ''));
        if ($phone === '') {
            return response()->json(['found' => false]);
        }
        $normalized = PhoneNormalizer::normalize($phone);
        if (strlen($normalized) < 11) {
            return response()->json(['found' => false]);
        }
        $phoneRecord = Phone::query()
            ->where('is_active', true)
            ->where('normalized_phone', $normalized)
            ->first();
        if ($phoneRecord !== null) {
            return response()->json([
                'found' => true,
                'phone' => [
                    'phone_number' => $phoneRecord->phone_number,
                    'description' => $phoneRecord->description,
                ],
            ]);
        }
        return response()->json(['found' => false]);
    }
}
