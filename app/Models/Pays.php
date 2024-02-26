<?php

namespace App\Models;
use App\Models\TypeVisa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function typeVisas()
    {
        return $this->belongsToMany(TypeVisa::class, 'pays_type_visa', 'pays_id', 'type_visa_id');
    }

}
