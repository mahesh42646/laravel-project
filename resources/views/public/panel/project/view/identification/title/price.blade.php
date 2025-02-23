<div class="d-md-flex justify-content-md-between align-items-md-center">
    <div class="d-flex align-items-center text-dark">
        <h1 class="font-weight-bold mb-0 mr-4">3</h1>
        <h5 class="mb-0">
            VALOR DO PROJETO
            @if ($isRequireds[2])
                <span class="text-danger">*</span> 
            @endif
        </h5>
    </div>
    <div class="d-flex" data-price-status>
        <span class="d-flex align-items-center mr-2" 
            style="border: 1px solid #ccc; border-radius: 10px; padding: 3px {{ $project->identification_price_status_id->value === 0 ? '4' : '9' }}px;"
        >
            {!! $project->identification_price_status_id->getIcon() !!}
            <span class="text-dark ml-1">{{ $project->identification_price_status_id->getName() }}</span>
        </span>
        <span type="button" class="d-flex align-items-center" data-toggle="modal" data-target="#openModal"
            style="border: 1px solid #ccc; border-radius: 10px; padding: 3px {{ $project->identification_price_status_id->value === 0 ? '4' : '20' }}px;"
            onclick="toggleIdentificationContainer('[data-price-container]')"
        >
            {!! $project->identification_price_status_id->getIconAction() !!}
            <span class="text-dark ml-1">{{ $project->identification_price_status_id->getNameAction() }}</span>
        </span>
    </div>
</div>
<hr class="my-2">
