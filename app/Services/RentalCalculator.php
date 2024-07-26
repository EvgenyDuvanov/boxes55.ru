<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Set;
use Carbon\Carbon;

class RentalCalculator
{
    public function calculate($equipmentId, $startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        $numberOfDays = $endDate->diffInDays($startDate);
        if ($numberOfDays === 0) {
            $numberOfDays = 1;
        }

        list($type, $itemId) = explode('_', $equipmentId);

        if ($type === 'product') {
            $item = Product::find($itemId);
        } elseif ($type === 'set') {
            $item = Set::find($itemId);
        } else {
            return ['error' => 'Invalid request'];
        }

        if ($numberOfDays <= 3) {
            $totalCost = $numberOfDays * $item->price_3_days;
        } else {
            $totalCost = $numberOfDays * $item->price_over_3_days;
        }

        return [
            'item' => $item->name,
            'type' => $type,
            'startDate' => $startDate->toDateString(),
            'endDate' => $endDate->toDateString(),
            'numberOfDays' => $numberOfDays,
            'totalCost' => $totalCost,
        ];
    }
}
