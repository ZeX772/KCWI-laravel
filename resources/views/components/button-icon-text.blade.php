<div class="d-inline-block">
    <button type="{{ $type }}" id="{{ $id }}" class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap btn-icon-text">
        @if( $icon == 'plus' )
            <x-svg-icon icon="plus" />
        @endif
        {{ $title }}
    </button>
</div>