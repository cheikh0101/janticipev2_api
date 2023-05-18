<?php

namespace App\Http\Controllers\Api\V1;

use App\Custom\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\AnneeAcademique;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Niveau;
use App\Models\Type;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cour::inRandomOrder()->get();
        return CustomResponse::buildSuccessResponse($cours);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cour $cour)
    {
        $types = Type::all();
        $anneeAcademiques = AnneeAcademique::all();
        return CustomResponse::buildSuccessResponse($cour);
    }

    public function paginate($itemPerPage)
    {
        $cours = Cour::inRandomOrder()->paginate($itemPerPage);
        return CustomResponse::buildSuccessResponse($cours);
    }

    public function filtreParNiveau(Request $request)
    {
        $niveau = Niveau::find($request->niveau);
        $cours = Cour::whereRelation('classe', function ($query) use ($niveau) {
            $query->whereRelation('niveau', 'code', $niveau->code);
        })->inRandomOrder()->paginate(18);
        return CustomResponse::buildSuccessResponse($cours);
    }

    public function filtreParAnneeAcademique(Request $request)
    {
        $anneeAcademique = AnneeAcademique::find($request->annee_academique);
        $cours = Cour::whereRelation('classe', function ($query) use ($anneeAcademique) {
            $query->whereRelation('annee_academique', 'code', $anneeAcademique->code);
        })->inRandomOrder()->paginate(18);
        return CustomResponse::buildSuccessResponse($cours);
    }

    public function filtreParClasse(Request $request)
    {
        $classe = Classe::find($request->classe);
        $cours = Cour::whereRelation('classe', 'classe_id', $classe->id)->inRandomOrder()->paginate(18);
        return CustomResponse::buildSuccessResponse($cours);
    }

    public function findClasseCourse(Request $request)
    {
        $cours = Cour::where('classe_id', $request->id)->get();
        return CustomResponse::buildSuccessResponse($cours);
    }
}
