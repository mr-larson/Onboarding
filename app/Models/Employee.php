<?php

namespace App\Models;

use App\Http\Enums\EmployeeStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use InvalidArgumentException;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employees';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'Onboarding_status',
    ];

    public function setStatusAttribute($value)
    {
        if (in_array($value, EmployeeStatus::getValues())) {
            $this->attributes['Onboarding_status'] = $value;
        } else {
            throw new InvalidArgumentException("Invalid status");
        }
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function establishments(): BelongsToMany
    {
        return $this->belongsToMany(Establishment::class, 'contracts');
    }
}
