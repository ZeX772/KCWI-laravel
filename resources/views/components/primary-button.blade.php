<div class="d-inline-block">
    <button class="btn btn-primary custom-btn_{{ $color ?? 'primary' }} {{ $customClass ?? '' }}" {{ $attribute ?? '' }} id="{{ $id }}" type="{{ $type }}" data-bs-toggle="{{ $toggle }}" data-bs-target="{{ $target }}">
        <div class="text-nowrap d-flex align-items-center ml-3 mr-3">
            @if( isset($withIcon) && $withIcon )
                <span class="{{ $title != '' ? 'mr-2' : '' }}"><x-svg-icon icon="{{ $icon }}"  /></span>
            @endif
            {{ $title }}
        </div>
    </button>
</div>