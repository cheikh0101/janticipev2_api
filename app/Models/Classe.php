<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classe extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'classes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    protected $appends = ['libelle'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the annee_academique that owns the Classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annee_academique(): BelongsTo
    {
        return $this->belongsTo(AnneeAcademique::class);
    }

    /**
     * Get the niveau that owns the Classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function niveau(): BelongsTo
    {
        return $this->belongsTo(Niveau::class);
    }

    /**
     * Get the specialite that owns the Classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialite(): BelongsTo
    {
        return $this->belongsTo(Specialite::class);
    }

    /**
     * Get all of the cours for the Classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cours(): HasMany
    {
        return $this->hasMany(Cour::class);
    }

    public function responsableClasse(): HasMany
    {
        return $this->hasMany(ResponsableClasse::class);
    }

    public function getLibelleAttribute()
    {
        return $this->niveau->libelle . "-" . $this->specialite->libelle . "-" . $this->annee_academique->libelle;
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
