<?php

namespace App\DataObjects\Project;

class BusinessDay
{
    public function __construct(
        public readonly bool $monday,
        public readonly bool $tuesday,
        public readonly bool $wednesday,
        public readonly bool $thursday,
        public readonly bool $friday,
        public readonly bool $saturday,
        public readonly bool $sunday,
    )
    {}

    public static function get(array $days): static
    {
        return new static(
            monday: in_array('monday', $days),
            tuesday: in_array('tuesday', $days),
            wednesday: in_array('wednesday', $days),
            thursday: in_array('thursday', $days),
            friday: in_array('friday', $days),
            saturday: in_array('saturday', $days),
            sunday: in_array('sunday', $days),
        );
    }

    public function open(): bool
    {
        $today = strtolower(now()->englishDayOfWeek);

        return $this->$today;
    }
}
