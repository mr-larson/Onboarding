<?php

namespace App\Http\Enums;

enum EmployeeStatus: string
{
    case Onboarding = 'Onboarding';
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Suspended = 'Suspended';
    case Terminated = 'Terminated';
}
