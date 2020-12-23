<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;

class AttachmentController extends Controller
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
     * Show attachments list
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $attachments = Attachment::get();

        $data = [
            'attachments' => $attachments,
        ];

        return view('attachments.index', $data);
    }

    /**
     * Show form to creeate new attachment
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('attachments.create');
    }
}