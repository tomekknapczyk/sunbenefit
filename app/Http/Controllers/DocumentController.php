<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show documents list
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $documents = Document::get();

        $data = [
            'documents' => $documents,
        ];

        return view('documents.index', $data);
    }

    /**
     * Show form to creeate new documents
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('documents.create');
    }

    public function getDocument($filename){
        $url = storage_path('app/documents/'.$filename);

        return response()->file($url);
    }
}