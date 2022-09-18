<?php

namespace App\Casts\Project;

use App\DataObjects\Project\BusinessDay;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BusinessDaysCast implements CastsAttributes
{

    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return BusinessDay::get(
            days: json_decode($value),
        );
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value);
    }
}
