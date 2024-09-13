<?php

namespace App\Http\Enums;

enum EmployeeStatus
{
    case Onboarding;
    case Active;
    case Inactive;
    case Suspended;
    case Terminated;

    public static function getValues(): array
    {
        return [
            self::Onboarding,
            self::Active,
            self::Inactive,
            self::Suspended,
            self::Terminated,
        ];
    }
}
