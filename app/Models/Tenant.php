<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_name', 'apartment','type'];

    public function serviceCharge()
    {
        return $this->hasMany(ServiceCharge::class);
    }

    public function remittance()
    {
        return $this->hasMany(Remittance::class);
    }
}
