<?php

namespace App\Http\Livewire\Documents;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $document;
    public $name;

    /**
     * Validate and create a new document.
     *
     * @param  array  $input
     * @return \App\Models\Document
     */
    public function createDocument()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'document' => ['mimes:jpeg,bmp,png,csv,txt,pdf,xls,xlm,doc,docx,xml,json,xlsx', 'max:10240'],
        ]);

        $name = Str::snake($this->name."_".time()).'.'.$this->document->extension();
        $this->document->storeAs('documents', $name);

        \App\Models\Document::create([
            'name' => $this->name,
            'file_name' => $name,
            'type' => $this->document->getMimeType(),
        ]);

        notify()->success('Dokument zapisany!', 'Sukces');
        
        return redirect()->route('documents');
    }

    public function render()
    {
        return view('livewire.documents.create');
    }
}
