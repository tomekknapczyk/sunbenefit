<?php

namespace App\Http\Livewire\Attachments;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Show extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'documentDeleted' => '$refresh',
    ];

    /**
     * Collection of attachments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public $attachments;

    /**
     * Selected document
     *
     * @var mixed
     */
    public $selectedDocument;

    /**
     * Indicates if document deleting is being confirmed.
     *
     * @var bool
     */
    public $deleteDocument = false;

    /**
     * Confirm that the admin would like to change user status.
     *
     * @param  integer  $id
     * @return void
     */
    public function confirmDeleteDocument($id)
    {
        $this->selectedDocument = \App\Models\Attachment::findOrFail($id);
        $this->deleteDocument = true;
    }

    /**
    * Change module status
    *
    * @return void
    */
    public function deleteDocument()
    {
        Storage::delete('attachments/'.$this->selectedDocument->file_name);
        $this->selectedDocument->delete();
        $this->deleteDocument = false;
        $this->selectedDocument = null;

        $this->emit('documentDeleted');
    }

    public function render()
    {
        return view('livewire.attachments.show');
    }
}
