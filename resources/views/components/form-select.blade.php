<div class="form-inline {{ $customContainerClass ?? 'w-100' }}" style="{{ $customContainerStyle ?? '' }}">
    <div class="form-group">
        @if( isset($label) && $label !== '' )
            <label for="{{ $id }}" class="form-label" style="color: #636363;font-size: 14px;">{{ $label ?? '' }} @if( $isRequired == 'true' )<span class="text-danger">*</span>@endif</label>
        @endif
        <select id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}" {{ $dataAttribute ?? "" }} {{ $required ?? "" }} class="form-control {{ $customClass ?? '' }}" style="background-color: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
            {{ $slot }}
        </select>
    </div>
</div>