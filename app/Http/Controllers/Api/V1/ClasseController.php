<?php

namespace App\Http\Controllers\Api\V1;

use App\Custom\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\AnneeAcademique;
use App\Models\Classe;
use App\Models\Niveau;
use App\Models\Specialite;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        //
    }

    public function filtreParNiveau(Request $request)
    {
        $niveau = Niveau::find($request->niveau);
        $classes = Classe::whereRelation('niveau', 'niveau_id', $niveau->id)->inRandomOrder()->get();
        return CustomResponse::buildSuccessResponse($classes);
    }

    public function filtreParAnneeAcademique(Request $request)
    {
        $anneeAcademique = AnneeAcademique::find($request->annee_academique);
        $classes = Classe::whereRelation('annee_academique', 'annee_academique_id', $anneeAcademique->id)->get();
        return CustomResponse::buildSuccessResponse($classes);
    }

    public function filtreParSpecialite(Request $request)
    {
        $specialite = Specialite::find($request->specialite);
        $classes = Classe::whereRelation('specialite', 'specialite_id', $specialite->id)->get();
        return CustomResponse::buildSuccessResponse($classes);
    }
}
