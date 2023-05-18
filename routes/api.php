<?php

use App\Custom\CustomResponse;
use App\Http\Controllers\Api\V1\ClasseController;
use App\Http\Controllers\Api\V1\CoursController;
use App\Http\Controllers\Api\V1\DocumentController;
use App\Mail\SendContactMessageEmail;
use App\Models\AnneeAcademique;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Document;
use App\Models\MailBox;
use App\Models\Niveau;
use App\Models\Specialite;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('V1')->group(function () {
    Route::get('numberOfSpecialites', function () {
        $specialites = Specialite::all()->count();
        return CustomResponse::buildSuccessResponse($specialites);
    });
    Route::get('numberOfClasses', function () {
        $classes = Classe::all()->count();
        return CustomResponse::buildSuccessResponse($classes);
    });
    Route::get('numberOfCourse', function () {
        $cours = Cour::all()->count();
        return CustomResponse::buildSuccessResponse($cours);
    });
    Route::get('numberOfDoc', function () {
        $documents = Document::all()->count();
        return CustomResponse::buildSuccessResponse($documents);
    });

    Route::get('types', function () {
        $types = Type::all();
        return CustomResponse::buildSuccessResponse($types);
    });

    Route::get('annee_academique', function () {
        $anneeAcademiques = AnneeAcademique::all();
        return CustomResponse::buildSuccessResponse($anneeAcademiques);
    });

    Route::get('niveaux', function () {
        $niveaux = Niveau::all();
        return CustomResponse::buildSuccessResponse($niveaux);
    });

    Route::get('classes', function () {
        $classes = Classe::all();
        return CustomResponse::buildSuccessResponse($classes);
    });

    Route::get('specialites', function () {
        $specialites = Specialite::all();
        return CustomResponse::buildSuccessResponse($specialites);
    });

    Route::apiResource('cours', CoursController::class)->only(['index', 'show']);

    Route::get('cours/classeCourse/{id}', [CoursController::class, 'findClasseCourse']);

    Route::get('cours/paginate/{itemPerPage}', [CoursController::class, 'paginate']);

    Route::get('cours/filtre/niveaux/{niveau}', [CoursController::class, 'filtreParNiveau']);

    Route::get('cours/filtre/classe/{classe}', [CoursController::class, 'filtreParClasse']);

    Route::get('cours/filtre/annee_academique/{annee_academique}', [CoursController::class, 'filtreParAnneeAcademique']);

    Route::get('classe/filtre/niveaux/{niveau}', [ClasseController::class, 'filtreParNiveau']);

    Route::get('classe/filtre/specialite/{specialite}', [ClasseController::class, 'filtreParSpecialite']);

    Route::get('classe/filtre/annee_academique/{annee_academique}', [ClasseController::class, 'filtreParAnneeAcademique']);

    Route::get('document/courseDocument/{id}', [DocumentController::class, 'findCourseDocument']);

    Route::post('document/paginate/{itemPerPage}', [DocumentController::class, 'paginate']);

    Route::get('document/filtre/type/{typeId}/{coursId}', [DocumentController::class, 'filtrerParType']);

    Route::post('new-email', function (Request $request) {
        $validators = Validator::make($request->all(), [
            'email' => 'required|unique:mail_boxes|email:rfc,dns'
        ]);
        if ($validators->fails()) {
            return CustomResponse::buildValidationErrorResponse($validators->errors());
        }
        DB::beginTransaction();
        try {
            $newEmail = new MailBox();
            $newEmail->email = $request->email;
            $newEmail->saveOrFail();
            DB::commit();
        } catch (\Throwable $th) {
            return CustomResponse::buildErrorResponse("Une erreur est survenue lors de l'enregistrement...");
        }
        return CustomResponse::buildSuccessResponse("Email enregistré avec succès!");
    })->name('new-email');

    Route::post('contact/message', function (Request $request) {
        $validators = Validator::make($request->all(), [
            'objet' => 'required',
            'message' => 'required',
            'email' => 'required|email:rfc,dns'
        ]);
        if ($validators->fails()) {
            return CustomResponse::buildValidationErrorResponse($validators->errors());
        }
        try {
            $objet = $request->objet;
            $email = $request->email;
            $message = $request->message;
            Mail::to('janticipe0101@gmail.com')->send(new SendContactMessageEmail($objet, $email, $message));
        } catch (\Throwable $th) {
            return CustomResponse::buildErrorResponse("Une erreur est survenue lors de l'envoi...");
        }
        return CustomResponse::buildSuccessResponse("Message envoyé avec succès!");
    })->name('contact/message');
});
