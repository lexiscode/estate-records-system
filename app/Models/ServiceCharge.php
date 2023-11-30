<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_name', 'apartment', 'status', 'generator_fee',
        'nepa_light_fee', 'sockaway_fee', 'borehole_fee', 'payment_date',
        'debt_amount', 'debt_due_date', 'charge_due_date',
        'payment_method', 'payment_proof', 'notes'
    ];
}

