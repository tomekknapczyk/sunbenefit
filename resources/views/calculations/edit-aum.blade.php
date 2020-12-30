<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
                {{ __('Edycja arkusza ustaleń montażowych') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <livewire:calculations.aum
                :calculation="$calculation->id"
                :location="$calculation->aum->location"
                :azimuth="$calculation->aum->azimuth"
                :status="$calculation->aum->status"
                :roof="$calculation->aum->roof"
                :roofManufacturer="$calculation->aum->roofManufacturer"
                :rootAdditionalNotes="$calculation->aum->rootAdditionalNotes"
                :roofType="$calculation->aum->roofType"
                :construction="$calculation->aum->construction"
                :constructionMaterial="$calculation->aum->constructionMaterial"
                :constructionGround="$calculation->aum->constructionGround"
                :constructionAdditionalNotes="$calculation->aum->constructionAdditionalNotes"
                :constructionRoofType="$calculation->aum->constructionRoofType"
                :buildingHeight="$calculation->aum->buildingHeight"
                :buildingHeight2="$calculation->aum->buildingHeight2"
                :buildingRoofLength="$calculation->aum->buildingRoofLength"
                :buildingRoofLength2="$calculation->aum->buildingRoofLength2"
                :buildingTopLength="$calculation->aum->buildingTopLength"
                :buildingRoofAngle="$calculation->aum->buildingRoofAngle"
                :buildingWidth="$calculation->aum->buildingWidth"
                :buildingLength="$calculation->aum->buildingLength"
                :counterNr="$calculation->aum->counterNr"
                :counterLocation="$calculation->aum->counterLocation"
                :ppe1="$calculation->aum->ppe1"
                :groundWidth="$calculation->aum->groundWidth"
                :groundLength="$calculation->aum->groundLength"
                :piercing="$calculation->aum->piercing"
                :piercingLength="$calculation->aum->piercingLength"
                :groundAdditionalNotes="$calculation->aum->groundAdditionalNotes"
                :connection="$calculation->aum->connection"
                :connectionType="$calculation->aum->connectionType"
                :connectionPower="$calculation->aum->connectionPower"
                :pvType="$calculation->aum->pvType"
                :protection="$calculation->aum->protection"
                :fuse="$calculation->aum->fuse"
                :lightning="$calculation->aum->lightning"
                :connectionAdditionalNotes="$calculation->aum->connectionAdditionalNotes"
                :insulation="$calculation->aum->insulation"
                :insulationSize="$calculation->aum->insulationSize"
                :pvPower="$calculation->aum->pvPower"
                :inverter="$calculation->aum->inverter"
                :inverterAdditionalNotes="$calculation->aum->inverterAdditionalNotes"
                :additionalNotes="$calculation->aum->additionalNotes"
            />
        </div>
    </div>
</x-app-layout>