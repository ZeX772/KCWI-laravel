<div class="d-inline-block">
    @if(! isset($route) )
        <button id="{{ $id }}" class="btn btn-light fw-semibold custom-btn_secondary {{ $customStyle ?? '' }}" type="{{ $type }}" data-bs-dismiss="{{ $dismiss ?? '' }}" data-bs-toggle="{{ $toggle ?? '' }}" data-bs-target="{{ $target ?? '' }}">
            <div class="text-nowrap d-flex align-items-center ml-3 mr-3">
                @if( isset($withIcon) && $withIcon )
                    <span class="{{ $title != '' ? 'mr-2' : '' }}"><x-svg-icon icon="{{ $icon }}"  /></span>
                @endif
                {{ $title }}
            </div>
        </button>
    @endif

    @if( isset($route) )
        <a href="{{ $route }}" id="{{ $id }}" class="btn btn-light fw-semibold custom-btn_secondary d-flex {{ $customStyle ?? '' }}">
            @if( isset($withIcon) && $withIcon )
                <span class="{{ $title != '' ? 'mr-2' : '' }}"><x-svg-icon icon="{{ $icon }}"  /></span>
            @endif
            <span>{{ $title }}</span>
        </a>
    @endif
</div>