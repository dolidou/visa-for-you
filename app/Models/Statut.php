<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function demandeRdv()
    {
        return $this->belongsTo(DemandeRdv::class);
    }

}
