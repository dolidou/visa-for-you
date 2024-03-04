<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeRdv extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

    public function typeVisa()
    {
        return $this->belongsTo(TypeVisa::class);
    }

    public function statuts()
{
    return $this->hasMany(Statut::class, 'demande_rdv_id', 'id');
}

public function uploads()
{
    return $this->hasMany(Upload::class, 'demande_rdv_id', 'id');
}

}
