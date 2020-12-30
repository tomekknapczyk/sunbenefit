<?php

namespace App\Http\Livewire\Calculations;

use Livewire\Component;

class Aum extends Component
{
    /**
     * Component calculation.
     *
     * @return \App\Models\Calculation
     */
    public $calculation;
    
    public $location;
    public $azimuth;
    public $status;
    public $roof;
    public $roofManufacturer;
    public $rootAdditionalNotes;
    public $roofType;
    public $construction;
    public $constructionMaterial;
    public $constructionGround;
    public $constructionAdditionalNotes;
    public $constructionRoofType;
    public $buildingHeight;
    public $buildingHeight2;
    public $buildingRoofLength;
    public $buildingRoofLength2;
    public $buildingTopLength;
    public $buildingRoofAngle;
    public $buildingWidth;
    public $buildingLength;
    public $counterNr;
    public $counterLocation;
    public $ppe1;
    public $groundWidth;
    public $groundLength;
    public $piercing;
    public $piercingLength;
    public $groundAdditionalNotes;
    public $connection;
    public $connectionType;
    public $connectionPower;
    public $pvType;
    public $protection;
    public $fuse;
    public $lightning;
    public $connectionAdditionalNotes;
    public $insulation;
    public $insulationSize;
    public $pvPower;
    public $inverter;
    public $inverterAdditionalNotes;
    public $additionalNotes;

    public $l4_info;
    public $l5_info;
    public $r11_info;
    public $r12_info;
    public $c3_info;
    public $cm4_info;

    protected $rules = [
        'l4_info' => ['required_if:location.4, 1'],
        'l5_info' => ['required_if:location.5, 1'],
        'r12_info' => ['required_if:roof.12, 1'],
        'c3_info' => ['required_if:construction.3, 1'],
        'cm4_info' => ['required_if:constructionMaterial.4, 1'],
    ];

    protected $messages = [
        'l4_info.required_if' => 'Działka, numer i obręb jest wymagany',
        'l5_info.required_if' => 'Inny rodzaj budynku jest wymagany',
        'r12_info.required_if' => 'Inny rodzaj poszycia jest wymagany',
        'c3_info.required_if' => 'Inny rodzaj konstrukcji dachu jest wymagany',
        'cm4_info.required_if' => 'Inny rodzaj materiału jest wymagany',
    ];

    public function saveAum()
    {
        $this->validate();

        if ($this->calculation) {
            $edited = \App\Models\Calculation::where('id', $this->calculation)->first();

            if ($edited->getRawOriginal('status') != 1) {
                notify()->error('Nie można edytować arkusza', 'Błąd');

                return back();
            }

            \Storage::delete('aum/'. $edited->code . '.pdf');

            $aum = $edited->aum;

            if(isset($this->location) && array_key_exists(4, $this->location))
                $this->location['4'] = $this->location['4']?$this->l4_info:'';

            if(isset($this->location) && array_key_exists(5, $this->location))
                $this->location['5'] = $this->location['5']?$this->l5_info:'';

            if(isset($this->roof) && array_key_exists(11, $this->roof))
                $this->roof['11'] = $this->roof['11']?$this->r11_info:'';

            if(isset($this->roof) && array_key_exists(12, $this->roof))
                $this->roof['12'] = $this->roof['12']?$this->r12_info:'';

            if(isset($this->construction) && array_key_exists(3, $this->construction))
                $this->construction['3'] = $this->construction['3']?$this->c3_info:'';

            if(isset($this->constructionMaterial) && array_key_exists(4, $this->constructionMaterial))
                $this->constructionMaterial['4'] = $this->constructionMaterial['4']?$this->cm4_info:'';

            $aum->location = $this->location;
            $aum->azimuth = $this->azimuth;
            $aum->status = $this->status;
            $aum->roof = $this->roof;
            $aum->roofManufacturer = $this->roofManufacturer;
            $aum->rootAdditionalNotes = $this->rootAdditionalNotes;
            $aum->construction = $this->construction;
            $aum->constructionMaterial = $this->constructionMaterial;
            $aum->constructionGround = $this->constructionGround;
            $aum->constructionAdditionalNotes = $this->constructionAdditionalNotes;
            $aum->buildingHeight = $this->buildingHeight;
            $aum->buildingHeight2 = $this->buildingHeight2;
            $aum->buildingRoofLength = $this->buildingRoofLength;
            $aum->buildingRoofLength2 = $this->buildingRoofLength2;
            $aum->buildingTopLength = $this->buildingTopLength;
            $aum->buildingRoofAngle = $this->buildingRoofAngle;
            $aum->buildingWidth = $this->buildingWidth;
            $aum->buildingLength = $this->buildingLength;
            $aum->roofType = $this->roofType;
            $aum->counterNr = $this->counterNr;
            $aum->counterLocation = $this->counterLocation;
            $aum->ppe1 = $this->ppe1;
            $aum->constructionRoofType = $this->constructionRoofType;
            $aum->groundWidth = $this->groundWidth;
            $aum->groundLength = $this->groundLength;
            $aum->piercing = $this->piercing;
            $aum->piercingLength = $this->piercingLength;
            $aum->groundAdditionalNotes = $this->groundAdditionalNotes;
            $aum->connection = $this->connection;
            $aum->connectionType = $this->connectionType;
            $aum->connectionPower = $this->connectionPower;
            $aum->pvType = $this->pvType;
            $aum->protection = $this->protection;
            $aum->fuse = $this->fuse;
            $aum->lightning = $this->lightning;
            $aum->connectionAdditionalNotes = $this->connectionAdditionalNotes;
            $aum->insulation = $this->insulation;
            $aum->insulationSize = $this->insulationSize;
            $aum->pvPower = $this->pvPower;
            $aum->inverter = $this->inverter;
            $aum->inverterAdditionalNotes = $this->inverterAdditionalNotes;
            $aum->additionalNotes = $this->additionalNotes;
            $aum->save();

            notify()->success('Arkusz został zapisany!', 'Sukces');
        
            return redirect()->route('calculations');
        }

        return back();
    }

    public function mount()
    {
        if ($this->calculation) {
            $edited = \App\Models\Calculation::where('id', $this->calculation)->first();

            $this->l4_info = isset($this->location['4'])?$this->location['4']:'';
            $this->l5_info = isset($this->location['5'])?$this->location['5']:'';
            $this->r11_info = isset($this->roof['11'])?$this->roof['11']:'';
            $this->r12_info = isset($this->roof['12'])?$this->roof['12']:'';
            $this->c3_info = isset($this->construction['3'])?$this->construction['3']:'';
            $this->cm4_info = isset($this->constructionMaterial['4'])?$this->constructionMaterial['4']:'';
        }
    }

    public function render()
    {
        return view('livewire.calculations.aum');
    }
}
