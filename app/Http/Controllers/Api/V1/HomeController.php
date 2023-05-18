<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\ResponsableClasse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $responsableClasses = ResponsableClasse::where('user_id', Auth::id())->get();
        $nbreDocuments = Document::where('user_id', Auth::id())->count();
        return view('home', compact('responsableClasses', 'nbreDocuments'));
    }
}
