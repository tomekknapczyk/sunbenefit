<div>
    <form wire:submit.prevent="saveAum">
        <div class="max-w-7xl mx-auto">
            <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                <x-jet-section-title>
                    <x-slot name="title">Arkusz ustaleń montażowych pod instalację fotowoltaiczną</x-slot>
                    <x-slot name="description"></x-slot>
                </x-jet-section-title>

                <div class="mt-5 lg:mt-0 lg:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-gray-900 sm:p-6">
                            <div>
                                <div class="grid grid-cols-3 gap-3">
                                    <x-jet-label value="{{ __('Lokalizacja inwestycji') }}" class="col-span-3 text-lg" />
                                    <label for="l1" class="flex items-center col-span-1">
                                        <input id="l1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Budynek prywatny"
                                            wire:model.defer="location.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Budynek prywatny') }}</span>
                                    </label>
                                    <label for="l2" class="flex items-center col-span-1">
                                        <input id="l2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Grunt"
                                            wire:model.defer="location.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Grunt') }}</span>
                                    </label>
                                    <label for="l3" class="flex items-center col-span-1">
                                        <input id="l3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Budynek przemysłowy"
                                            wire:model.defer="location.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Budynek przemysłowy') }}</span>
                                    </label>
                                    <label for="l4" class="flex items-center col-span-1">
                                        <input id="l4"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="1"
                                            wire:model.defer="location.4"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Działka, numer i obręb') }}</span>
                                    </label>
                                    <div class="col-span-2">
                                        <x-jet-input id="l4_info" type="text" class="mt-1 block w-full" wire:model.defer="l4_info"/>
                                        <x-jet-input-error for="l4_info" class="mt-2" />
                                    </div>

                                    <label for="l5" class="flex items-center col-span-1">
                                        <input id="l5"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="1"
                                            wire:model.defer="location.5"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Inny rodzaj budynku:') }}</span>
                                    </label>
                                    <div class="col-span-2">
                                        <x-jet-input id="l5_info" type="text" class="mt-1 block w-full" wire:model.defer="l5_info"/>
                                        <x-jet-input-error for="l5_info" class="mt-2" />
                                    </div>

                                    <div class="col-span-3 grid grid-cols-3 gap-3 items-center">
                                        <x-jet-label for="azimuth" value="Azymut" class="col-span-1"/>
                                        <x-jet-input id="azimuth" type="text" class="mt-1 block w-full col-span-2" wire:model.defer="azimuth"/>
                                        <x-jet-input-error for="azimuth" class="mt-2" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-4 gap-4 mt-4">
                                    <x-jet-label value="{{ __('Status nieruchomości') }}" class="col-span-4 text-lg" />
                                    <label for="s1" class="flex items-center col-span-1">
                                        <input id="s1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Własność"
                                            wire:model.defer="status.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Własność') }}</span>
                                    </label>
                                    <label for="s2" class="flex items-center col-span-1">
                                        <input id="s2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Najem"
                                            wire:model.defer="status.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Najem') }}</span>
                                    </label>
                                    <label for="s3" class="flex items-center col-span-1">
                                        <input id="s3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dzierżawa"
                                            wire:model.defer="status.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dzierżawa') }}</span>
                                    </label>
                                    <label for="s4" class="flex items-center col-span-1">
                                        <input id="s4"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Obiekt pod nadzorem konserwatora zabytków"
                                            wire:model.defer="status.4"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Obiekt pod nadzorem konserwatora zabytków') }}</span>
                                    </label>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-3 gap-4 items-center">
                                    <x-jet-label value="{{ __('Poszycie dachu') }}" class="col-span-3 text-lg" />
                                    <label for="r1" class="flex items-center col-span-1">
                                        <input id="r1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Papa"
                                            wire:model.defer="roof.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Papa') }}</span>
                                    </label>
                                    <label for="r2" class="flex items-center col-span-1">
                                        <input id="r2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Blachodachówka"
                                            wire:model.defer="roof.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Blachodachówka') }}</span>
                                    </label>
                                    <label for="r3" class="flex items-center col-span-1">
                                        <input id="r3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Eternit"
                                            wire:model.defer="roof.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Eternit') }}</span>
                                    </label>
                                    <label for="r4" class="flex items-center col-span-1">
                                        <input id="r4"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dachówka ceramiczna"
                                            wire:model.defer="roof.4"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dachówka ceramiczna') }}</span>
                                    </label>
                                    <label for="r5" class="flex items-center col-span-1">
                                        <input id="r5"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Gont"
                                            wire:model.defer="roof.5"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Gont') }}</span>
                                    </label>
                                    <label for="r6" class="flex items-center col-span-1">
                                        <input id="r6"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Gont bitumiczny"
                                            wire:model.defer="roof.6"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Gont bitumiczny') }}</span>
                                    </label>
                                    <label for="r7" class="flex items-center col-span-1">
                                        <input id="r7"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Płyta warstwowa"
                                            wire:model.defer="roof.7"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Płyta warstwowa') }}</span>
                                    </label>
                                    <label for="r8" class="flex items-center col-span-1">
                                        <input id="r8"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Eurofala"
                                            wire:model.defer="roof.8"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Eurofala') }}</span>
                                    </label>
                                    <label for="r9" class="flex items-center col-span-1">
                                        <input id="r9"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Blacha obornicka"
                                            wire:model.defer="roof.9"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Blacha obornicka') }}</span>
                                    </label>
                                    <label for="r10" class="flex items-center col-span-1">
                                        <input id="r10"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dachówka karpiówka"
                                            wire:model.defer="roof.10"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dachówka karpiówka') }}</span>
                                    </label>
                                    <label for="r11" class="flex items-center col-span-1">
                                        <input id="r11"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="1"
                                            wire:model.defer="roof.11"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Blacha trapezowa') }}</span>
                                    </label>
                                    <div class="col-span-1 grid grid-cols-2 gap-2 items-center">
                                        <x-jet-label value="Rozstaw trapezu:" class="col-span-1"/>
                                        <div class="col-span-1">
                                            <x-jet-input id="r11_info" type="text" class="mt-1 block w-full" wire:model.defer="r11_info"/>
                                            <x-jet-input-error for="r11_info" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-span-3 grid grid-cols-4 gap-4">
                                        <label for="r12" class="flex items-center col-span-1">
                                            <input id="r12"
                                                type="checkbox"
                                                class="form-checkbox"
                                                value="1"
                                                wire:model.defer="roof.12"
                                            >
                                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Inne') }}</span>
                                        </label>
                                        <div class="col-span-3">
                                            <x-jet-input id="r12_info" type="text" class="mt-1 block w-full" wire:model.defer="r12_info"/>
                                            <x-jet-input-error for="r12_info" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-span-3 grid grid-cols-3 gap-3 items-center">
                                        <x-jet-label for="roofManufacturer" value="Producent poszycia dachu" class="col-span-1"/>
                                        <x-jet-input id="roofManufacturer" type="text" class="mt-1 block w-full col-span-2" wire:model.defer="roofManufacturer"/>
                                        <x-jet-input-error for="roofManufacturer" class="mt-2" />
                                    </div>

                                    <div class="col-span-3 grid grid-cols-3 gap-3 items-center">
                                        <x-jet-label for="rootAdditionalNotes" value="Dodatkowe uwagi" class="col-span-1"/>
                                        <x-jet-input id="rootAdditionalNotes" type="text" class="mt-1 block w-full col-span-2" wire:model.defer="rootAdditionalNotes"/>
                                        <x-jet-input-error for="rootAdditionalNotes" class="mt-2" />
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-6 gap-4 items-center">
                                    <x-jet-label value="{{ __('Konstrukcja dachu') }}" class="col-span-6 text-2xl" />
                                    <label for="c1" class="flex items-center col-span-2">
                                        <input id="c1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Krokwie"
                                            wire:model.defer="construction.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Krokwie') }}</span>
                                    </label>
                                    <label for="c2" class="flex items-center col-span-2">
                                        <input id="c2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Łaty"
                                            wire:model.defer="construction.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Łaty') }}</span>
                                    </label>
                                    <div class="col-span-2 grid grid-cols-3 gap-4">
                                        <label for="c3" class="flex items-center col-span-1">
                                            <input id="c3"
                                                type="checkbox"
                                                class="form-checkbox"
                                                value="1"
                                                wire:model.defer="construction.3"
                                            >
                                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Inne') }}</span>
                                        </label>
                                        <div class="col-span-2">
                                            <x-jet-input id="c3_info" type="text" class="mt-1 block w-full" wire:model.defer="c3_info"/>
                                            <x-jet-input-error for="c3_info" class="mt-2" />
                                        </div>
                                    </div>

                                    <x-jet-label value="{{ __('Materiał') }}" class="col-span-6 text-lg" />
                                    <label for="cm1" class="flex items-center col-span-1">
                                        <input id="cm1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Drewno"
                                            wire:model.defer="constructionMaterial.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Drewno') }}</span>
                                    </label>
                                    <label for="cm2" class="flex items-center col-span-1">
                                        <input id="cm2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Stal"
                                            wire:model.defer="constructionMaterial.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Stal') }}</span>
                                    </label>
                                    <label for="cm3" class="flex items-center col-span-1">
                                        <input id="cm3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Beton"
                                            wire:model.defer="constructionMaterial.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Beton') }}</span>
                                    </label>
                                    <div class="col-span-3 grid grid-cols-3 gap-4">
                                        <label for="cm4" class="flex items-center col-span-1">
                                            <input id="cm4"
                                                type="checkbox"
                                                class="form-checkbox"
                                                value="1"
                                                wire:model.defer="constructionMaterial.4"
                                            >
                                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Inne') }}</span>
                                        </label>
                                        <div class="col-span-2">
                                            <x-jet-input id="cm4_info" type="text" class="mt-1 block w-full" wire:model.defer="cm4_info"/>
                                            <x-jet-input-error for="cm4_info" class="mt-2" />
                                        </div>
                                    </div>

                                    <x-jet-label value="{{ __('Rodzaj konstrukcji na gruncie') }}" class="col-span-6 text-lg" />
                                    <label for="cg1" class="flex items-center col-span-2">
                                        <input id="cg1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dwa rzędy orientacji w pionie"
                                            wire:model.defer="constructionGround.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dwa rzędy orientacji w pionie') }}</span>
                                    </label>
                                    <label for="cg2" class="flex items-center col-span-2">
                                        <input id="cg2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Trzy rzędy orientacji w poziomie"
                                            wire:model.defer="constructionGround.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Trzy rzędy orientacji w poziomie') }}</span>
                                    </label>
                                    <label for="cg3" class="flex items-center col-span-2">
                                        <input id="cg3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Cztery rzędy orientacji w poziomie"
                                            wire:model.defer="constructionGround.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Cztery rzędy orientacji w poziomie') }}</span>
                                    </label>
                                    <div class="col-span-6 grid grid-cols-3 gap-3 items-center">
                                        <x-jet-label for="constructionAdditionalNotes" value="Dodatkowe uwagi:" class="col-span-1"/>
                                        <x-jet-input id="constructionAdditionalNotes" type="text" class="mt-1 block w-full col-span-2" wire:model.defer="constructionAdditionalNotes"/>
                                        <x-jet-input-error for="constructionAdditionalNotes" class="mt-2" />
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-4 gap-4 items-center">
                                    <x-jet-label value="{{ __('Budynek / działka') }}" class="col-span-4 text-2xl" />
                                    <x-jet-label value="Wysokość budynku [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingHeight" type="text" class="mt-1 block w-full" wire:model.defer="buildingHeight"/>
                                        <x-jet-input-error for="buildingHeight" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Wysokość do okapu [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingHeight2" type="text" class="mt-1 block w-full" wire:model.defer="buildingHeight2"/>
                                        <x-jet-input-error for="buildingHeight2" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Długość dachu [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingRoofLength" type="text" class="mt-1 block w-full" wire:model.defer="buildingRoofLength"/>
                                        <x-jet-input-error for="buildingRoofLength" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Długość krawędzi dachu [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingRoofLength2" type="text" class="mt-1 block w-full" wire:model.defer="buildingRoofLength2"/>
                                        <x-jet-input-error for="buildingRoofLength2" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Długość grzbietu [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingTopLength" type="text" class="mt-1 block w-full" wire:model.defer="buildingTopLength"/>
                                        <x-jet-input-error for="buildingTopLength" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Kąt pochylenia dachu [˚]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingRoofAngle" type="text" class="mt-1 block w-full" wire:model.defer="buildingRoofAngle"/>
                                        <x-jet-input-error for="buildingRoofAngle" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Długość [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingLength" type="text" class="mt-1 block w-full" wire:model.defer="buildingLength"/>
                                        <x-jet-input-error for="buildingLength" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Szerokość [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="buildingWidth" type="text" class="mt-1 block w-full" wire:model.defer="buildingWidth"/>
                                        <x-jet-input-error for="buildingWidth" class="mt-2" />
                                    </div>

                                    <x-jet-label value="{{ __('Typ dachu') }}" class="col-span-4 text-lg" />
                                    <label for="rt1" class="flex items-center col-span-1">
                                        <input id="rt1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dach czterospadowy"
                                            wire:model.defer="roofType.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dach czterospadowy') }}</span>
                                    </label>
                                    <label for="rt2" class="flex items-center col-span-1">
                                        <input id="rt2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dach jednospadowy"
                                            wire:model.defer="roofType.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dach jednospadowy') }}</span>
                                    </label>
                                    <label for="rt3" class="flex items-center col-span-1">
                                        <input id="rt3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dach płaski"
                                            wire:model.defer="roofType.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dach płaski') }}</span>
                                    </label>
                                    <label for="rt4" class="flex items-center col-span-1">
                                        <input id="rt4"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Dach dwuspadowy (dwupołaciowy)"
                                            wire:model.defer="roofType.4"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Dach dwuspadowy (dwupołaciowy)') }}</span>
                                    </label>
                                    <label for="rt5" class="flex items-center col-span-4">
                                        <input id="rt5"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Grunt"
                                            wire:model.defer="roofType.5"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Grunt') }}</span>
                                    </label>

                                    <x-jet-label value="Numer licznika 1:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="counterNr" type="text" class="mt-1 block w-full" wire:model.defer="counterNr"/>
                                        <x-jet-input-error for="counterNr" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Lokalizacja skrzynki z licznikiem:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="counterLocation" type="text" class="mt-1 block w-full" wire:model.defer="counterLocation"/>
                                        <x-jet-input-error for="counterLocation" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Numer PPE 1:" class="col-span-1"/>
                                    <div class="col-span-3">
                                        <x-jet-input id="ppe1" type="text" class="mt-1 block w-full" wire:model.defer="ppe1"/>
                                        <x-jet-input-error for="ppe1" class="mt-2" />
                                    </div>

                                    <x-jet-label value="{{ __('Rodzaj konstrukcji montażowej na dachu płaskim') }}" class="col-span-4 text-lg" />
                                    <label for="crt1" class="flex items-center col-span-1">
                                        <input id="crt1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Inwazyjna"
                                            wire:model.defer="constructionRoofType.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Inwazyjna') }}</span>
                                    </label>
                                    <label for="crt2" class="flex items-center col-span-1">
                                        <input id="crt2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Balastowa"
                                            wire:model.defer="constructionRoofType.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Balastowa') }}</span>
                                    </label>

                                    <x-jet-label value="{{ __('Informacje o gruncie:') }}" class="col-span-4 text-lg" />
                                    <x-jet-label value="Długość [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="groundWidth" type="text" class="mt-1 block w-full" wire:model.defer="groundWidth"/>
                                        <x-jet-input-error for="groundWidth" class="mt-2" />
                                    </div>
                                    <x-jet-label value="Szerokość [m]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="groundLength" type="text" class="mt-1 block w-full" wire:model.defer="groundLength"/>
                                        <x-jet-input-error for="groundLength" class="mt-2" />
                                    </div>

                                    <label for="piercing" class="flex items-center col-span-1">
                                        <input id="piercing"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="1"
                                            wire:model.defer="piercing"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Wymagany przekop') }}</span>
                                    </label>
                                    <x-jet-label value="Długość przekopu [m]:" class="col-span-1"/>
                                    <div class="col-span-2">
                                        <x-jet-input id="piercingLength" type="text" class="mt-1 block w-full" wire:model.defer="piercingLength"/>
                                        <x-jet-input-error for="piercingLength" class="mt-2" />
                                    </div>

                                    <x-jet-label value="Dodatkowe uwagi:" class="col-span-1"/>
                                    <div class="col-span-3">
                                        <x-jet-input id="groundAdditionalNotes" type="text" class="mt-1 block w-full" wire:model.defer="groundAdditionalNotes"/>
                                        <x-jet-input-error for="groundAdditionalNotes" class="mt-2" />
                                    </div>

                                    <x-jet-label value="{{ __('Obecne przyłączenie do sieci:') }}" class="col-span-4 text-lg" />
                                    <label for="con1" class="flex items-center col-span-1">
                                        <input id="con1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Niskie napięcie"
                                            wire:model.defer="connection.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Niskie napięcie') }}</span>
                                    </label>
                                    <label for="con2" class="flex items-center col-span-1">
                                        <input id="con2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Średnie napięcie"
                                            wire:model.defer="connection.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Średnie napięcie') }}</span>
                                    </label>
                                    <label for="con3" class="flex items-center col-span-1">
                                        <input id="con3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Wysokie napięcie"
                                            wire:model.defer="connection.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Wysokie napięcie') }}</span>
                                    </label>
                                    <label for="con4" class="flex items-center col-span-1">
                                        <input id="con4"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Brak"
                                            wire:model.defer="connection.4"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Brak') }}</span>
                                    </label>

                                    <x-jet-label value="{{ __('Rodzaje przyłącza:') }}" class="col-span-4 text-lg" />
                                    <label for="cont1" class="flex items-center col-span-1">
                                        <input id="cont1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Napowietrzna"
                                            wire:model.defer="connectionType.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Napowietrzna') }}</span>
                                    </label>
                                    <label for="cont2" class="flex items-center col-span-1">
                                        <input id="cont2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Podziemna"
                                            wire:model.defer="connectionType.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Podziemna') }}</span>
                                    </label>

                                    <div class="col-span-2 grid grid-cols-3 gap-4 items-center">
                                        <x-jet-label value="Obecna moc przyłączeniowa:" class="col-span-2"/>
                                        <div class="col-span-1">
                                            <div class="flex items-center">
                                                <x-jet-input id="connectionPower" type="text" class="mt-1 block w-full" wire:model.defer="connectionPower"/>
                                                <span class="text-gray-600 dark:text-gray-400 ml-2">kW</span>
                                            </div>
                                            <x-jet-input-error for="connectionPower" class="mt-2" />
                                        </div>
                                    </div>

                                    <x-jet-label value="{{ __('Instalacja fotowoltaiczna:') }}" class="col-span-4 text-lg" />
                                    <label for="pv1" class="flex items-center col-span-1">
                                        <input id="pv1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="1-fazowa"
                                            wire:model.defer="pvType.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('1-fazowa') }}</span>
                                    </label>
                                    <label for="pv2" class="flex items-center col-span-1">
                                        <input id="pv2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="3-fazowa"
                                            wire:model.defer="pvType.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('3-fazowa') }}</span>
                                    </label>

                                    <x-jet-label value="{{ __('Zabezpieczenie przeciwprzepięciowe po stronie AC:') }}" class="col-span-4 text-lg" />
                                    <label for="protection1" class="flex items-center col-span-1">
                                        <input id="protection1"
                                            type="radio"
                                            class="form-radio"
                                            value="1"
                                            name="protection"
                                            wire:model.defer="protection"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Tak') }}</span>
                                    </label>
                                    <label for="protection2" class="flex items-center col-span-1">
                                        <input id="protection2"
                                            type="radio"
                                            class="form-radio"
                                            value="0"
                                            name="protection"
                                            wire:model.defer="protection"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Nie') }}</span>
                                    </label>

                                    <x-jet-label value="Bezpieczniki przy liczniku głównym:" class="col-span-4 text-lg"/>
                                    <div class="col-span-1">
                                        <div class="flex items-center">
                                            <x-jet-input id="fuse" type="text" class="mt-1 block w-full" wire:model.defer="fuse"/>
                                            <span class="text-gray-600 dark:text-gray-400 ml-2">A</span>
                                        </div>
                                        <x-jet-input-error for="fuse" class="mt-2" />
                                    </div>

                                    <x-jet-label value="{{ __('Instalacja odgromowa:') }}" class="col-span-4 text-lg" />
                                    <label for="lightning1" class="flex items-center col-span-1">
                                        <input id="lightning1"
                                            type="radio"
                                            class="form-radio"
                                            value="1"
                                            wire:model.defer="lightning"
                                            name="lightning"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Tak') }}</span>
                                    </label>
                                    <label for="lightning2" class="flex items-center col-span-3">
                                        <input id="lightning2"
                                            type="radio"
                                            class="form-radio"
                                            value="0"
                                            wire:model.defer="lightning"
                                            name="lightning"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Nie') }}</span>
                                    </label>

                                    <x-jet-label value="Dodatkowe uwagi:" class="col-span-1"/>
                                    <div class="col-span-3">
                                        <x-jet-input id="connectionAdditionalNotes" type="text" class="mt-1 block w-full" wire:model.defer="connectionAdditionalNotes"/>
                                        <x-jet-input-error for="connectionAdditionalNotes" class="mt-2" />
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-5 gap-4 items-center">
                                    <x-jet-label value="{{ __('Izolacja dachu') }}" class="col-span-5 text-2xl" />
                                    <label for="i1" class="flex items-center col-span-1">
                                        <input id="i1"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Wełna"
                                            wire:model.defer="insulation.1"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Wełna') }}</span>
                                    </label>
                                    <label for="i2" class="flex items-center col-span-1">
                                        <input id="i2"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Pianka"
                                            wire:model.defer="insulation.2"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Pianka') }}</span>
                                    </label>
                                    <label for="i3" class="flex items-center col-span-1">
                                        <input id="i3"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Papa"
                                            wire:model.defer="insulation.3"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Papa') }}</span>
                                    </label>
                                    <label for="i4" class="flex items-center col-span-1">
                                        <input id="i4"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Styropian"
                                            wire:model.defer="insulation.4"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Styropian') }}</span>
                                    </label>
                                    <label for="i5" class="flex items-center col-span-1">
                                        <input id="i5"
                                            type="checkbox"
                                            class="form-checkbox"
                                            value="Brak izolacji"
                                            wire:model.defer="insulation.5"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Brak izolacji') }}</span>
                                    </label>

                                    <x-jet-label value="Grubość izolacji [mm]:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <x-jet-input id="insulationSize" type="text" class="mt-1 block w-full" wire:model.defer="insulationSize"/>
                                        <x-jet-input-error for="insulationSize" class="mt-2" />
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-3 gap-4 items-center">
                                    <x-jet-label value="{{ __('Panele fotowoltaiczne') }}" class="col-span-3 text-2xl" />

                                    <x-jet-label value="Wskazanie pożądanej mocy:" class="col-span-1"/>
                                    <div class="col-span-1">
                                        <div class="flex items-center">
                                            <x-jet-input id="pvPower" type="text" class="mt-1 block w-full" wire:model.defer="pvPower"/>
                                            <span class="text-gray-600 dark:text-gray-400 ml-2">kWp</span>
                                        </div>
                                        <x-jet-input-error for="pvPower" class="mt-2" />
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-3 gap-4 items-center">
                                    <x-jet-label value="{{ __('Inwertery') }}" class="col-span-3 text-2xl" />

                                    <x-jet-label value="{{ __('Miejsce montażu:') }}" class="col-span-1" />
                                    <label for="in1" class="flex items-center col-span-1">
                                        <input id="in1"
                                            type="radio"
                                            class="form-radio"
                                            value="Wewnątrz"
                                            wire:model.defer="inverter"
                                            name="inverter"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Wewnątrz') }}</span>
                                    </label>
                                    <label for="in2" class="flex items-center col-span-1">
                                        <input id="in2"
                                            type="radio"
                                            class="form-radio"
                                            value="Na zewnątrz"
                                            wire:model.defer="inverter"
                                            name="inverter"
                                        >
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Na zewnątrz') }}</span>
                                    </label>
                                    
                                    <x-jet-label value="Dodatkowe uwagi:" class="col-span-1"/>
                                    <div class="col-span-2">
                                        <x-jet-input id="inverterAdditionalNotes" type="text" class="mt-1 block w-full" wire:model.defer="inverterAdditionalNotes"/>
                                        <x-jet-input-error for="inverterAdditionalNotes" class="mt-2" />
                                    </div>
                                </div>

                                <x-jet-section-border />

                                <div class="grid grid-cols-3 gap-4 items-center">
                                    <x-jet-label value="{{ __('Dodatkowe materiały') }}" class="col-span-3 text-2xl" />
                                    
                                    <x-jet-label value="Dodatkowe uwagi:" class="col-span-1"/>
                                    <div class="col-span-2">
                                        <x-jet-input id="additionalNotes" type="text" class="mt-1 block w-full" wire:model.defer="additionalNotes"/>
                                        <x-jet-input-error for="additionalNotes" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center jutify-start sm:justify-between flex-col sm:flex-row flex-wrap px-4 py-3 bg-gray-200 dark:bg-gray-800 text-right sm:px-6 mt-10">
            <div>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500">{{ $error }}</p>
                    @endforeach
                @endif
            </div>


            <div class="flex items-center justify-end">
                <x-jet-action-message class="mr-3 text-white bg-green-200 p-2 rounded" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>