<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
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
     * Show modules list
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $modules = Module::withTrashed()->orderBy('deleted_at', 'asc')->get();

        $data = [
            'modules' => $modules,
        ];

        return view('modules.index', $data);
    }

    /**
     * Show form to creeate new module
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Show module edit form
     *
     * @return Illuminate\View\View
     */
    public function edit(Module $module)
    {
        $data = [
            'module' => $module,
        ];

        return view('modules.edit', $data);
    }
}
