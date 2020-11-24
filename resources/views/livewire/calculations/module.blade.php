<div class="col-span-3 sm:col-span-1 w-full bg-gray-400 p-4 rounded-sm">
    <p>{{ $module->name }}</p>
    @if($module->file_name)
        <img src="{{ asset('storage/photos/' . $module->file_name) }}" class="w-full h-auto mb-2">
    @endif

    <p>{{ $price }} PLN</p>
    <p>{{ $price_opt }} PLN</p>
    <p>{{ $actual_power }} kWp</p>
    <p>{{ $qty }} szt.</p>
</div>