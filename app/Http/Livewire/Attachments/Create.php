<?php

namespace App\Http\Livewire\Attachments;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $attachment;
    public $name;

    /**
     * Validate and create a new document.
     *
     * @param  array  $input
     * @return \App\Models\Attachment
     */
    public function createAttachment()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'attachment' => ['mimes:jpeg,bmp,png,csv,txt,pdf,xls,xlm,doc,docx,xml,json,xlsx', 'max:10240'],
        ]);

        $name = Str::snake($this->name."_".time()).'.'.$this->attachment->extension();
        $this->attachment->storeAs('attachments', $name);

        \App\Models\Attachment::create([
            'name' => $this->name,
            'file_name' => $name,
        ]);

        notify()->success('Dokument zapisany!', 'Sukces');
        
        return redirect()->route('attachments');
    }

    public function render()
    {
        return view('livewire.attachments.create');
    }
}
