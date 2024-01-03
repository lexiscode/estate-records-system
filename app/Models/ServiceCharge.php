<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_name', 'apartment', 'status',
        'payment_date','debt_amount', 'debt_due_date',
        'charge_due_date', 'payment_method', 'payment_proof', 'notes'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}

