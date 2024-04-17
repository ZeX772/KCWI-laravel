<div class="row g-0 d-xxl-flex justify-content-between page-header">
    <div class="col-auto">
        <h1 class="fw-semibold page-content-heading">{{ $heading }} @if( isset($headingSpan) )<span class="page-content-heading_span">{{ $headingSpan }}</span>@endif</h1>
    </div>
    <div class="col-auto d-flex gap-3 buttons-container {{ isset($buttonHidden) && $buttonHidden == 'true' ? 'd-none' : '' }}">
        @if( isset($withCustomDropdown) && $withCustomDropdown != "" )
            <div class="col-auto">
                <div class="d-inline-block">
                    <div>
                        <div class="dropdown custon-dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle d-flex gap-2" data-bs-toggle="dropdown" aria-expanded="false" data-popper-placement="bottom-end">
                                <span>
                                    <i class="fa-solid fa-download"></i>
                                </span>
                                <span>Export</span>
                            </button>
                            <ul class="dropdown-menu" data-popper-placement="bottom-end" style="position: absolute; left: -70px; top: 30px;">
                                <li>
                                    <a href="" class="dropdown-item overflow-hidden" data-value="excel" style="text-overflow: ellipsis" data-id="">
                                        <span>
                                            <i class="fa-solid fa-table"></i>
                                        </span>
                                        <span class="ms-2">Excel</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if( isset($withDropdownBtn) && $withDropdownBtn != "" )
            <div class="col-auto">
                <div class="d-inline-block">
                    <div>
                        <x-form-select
                            label="" 
                            name="{{ $dropdownBtnName }}"
                            id="{{ $dropdownBtnName }}"
                            isRequired="false"
                        >
                            <option value="" hidden>Export</option>
                            @foreach( $dropdownOptions as $dropdownOption )
                                <option value="{{ $dropdownOption['value'] }}">{{ $dropdownOption['label'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                </div>
            </div>
        @endif
        @if( isset($secondBtnRoute) && $secondBtnRoute != "" )
            <div class="col-auto">
                <div class="d-inline-block">
                    <a href="{{ $secondBtnRoute }}" class="btn btn-light custom-btn_secondary" id="{{ $secondButtonId }}" >
                        <div class="text-nowrap d-flex align-items-center ml-3 mr-3">
                            @if( isset($withIconSecondBtn) && $withIconSecondBtn == 'true' )
                                <span class="mr-2"><x-svg-icon icon="{{ $secondBtnIcon }}"  /></span>
                            @endif
                            {{ $secondBtnTitle }}
                        </div>
                    </a>
                </div>
            </div>
        @endif
        @if( isset($withButton) && $withButton == 'true' )
            <div class="col-auto">
                <x-primary-button type="{{ $buttonType }}" id="{{ $buttonId }}" title="{{ $buttonTitle }}" withIcon="{{ $withIcon ?? '' }}" icon="{{ $icon }}" toggle="{{ $toggle ?? 'modal' }}" target="{{ $buttonModalTarget }}"/>
            </div>
        @endif
        @if( isset($route) && $route != "" )
            <div class="col-auto">
                <div class="d-inline-block">
                    <a href="{{ $route }}" class="btn btn-primary custom-btn_primary" id="{{ $buttonId }}" >
                        <div class="text-nowrap d-flex align-items-center ml-3 mr-3">
                            @if( isset($withIcon) && $withIcon )
                                <span class="mr-2"><x-svg-icon icon="{{ $icon }}"  /></span>
                            @endif
                            {{ $buttonTitle }}
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>