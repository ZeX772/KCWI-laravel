@if( $type != 'date' && $type != 'password' )
    <div class="form-inline" style="width: 100%;">
        <div class="form-group position-relative">
            <label for="{{ $id }}" class="form-label form-input-label">{{ $label }} @if( $isRequired == 'true' )<span class="text-danger">*</span>@endif</label>
            <input name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder ?? '' }}" class="form-control form-input-{{ $type }} {{ $customClass ?? '' }}" type="{{ $type }}" value="{{ $value ?? '' }}" tabindex="{{ $tabindex ?? '' }}" {{ isset($disabled) && $disabled == 'true' ? "disabled" : "" }}>
        </div>
    </div>
@endif

@if( $type == 'date' )
    <div class="form-inline" style="width: 100%;">
        <div class="form-group position-relative">
            <label for="{{ $id }}" class="form-label form-input-label">{{ $label }} @if( $isRequired == 'true' )<span class="text-danger">*</span>@endif</label>
            <div class="input-group">
                <span class="input-group-text" style="background: #F5F5F5;border-style: none;">
                    <x-svg-icon icon="calendar" />
                </span>
                <input name="{{ $name }}" id="{{ $id }}" class="form-control datepicker form-input-{{ $type }} {{ $customClass ?? '' }}" type="{{ $type }}" value="{{ $value ?? '' }}" style="background: #F5F5F5;border-style: none; height: 48px;" {{ $required ?? '' }}>
            </div>
        </div>
    </div>
@endif

@if( $type == 'password' )
    <div class="form-inline" style="width: 100%;">
        <div class="form-group position-relative password-{{ $name }}-container">
            <label for="{{ $id }}" class="form-label form-input-label">{{ $label }} @if( $isRequired == 'true' )<span class="text-danger">*</span>@endif</label>
            <div class="password-container" style="width: 100%;">
                <input name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder ?? '' }}" class="form-control form-input-{{ $type }} {{ $customClass ?? '' }}" type="{{ $type }}" value="{{ $value ?? '' }}" tabindex="{{ $tabindex ?? '' }}" {{ isset($disabled) && $disabled == 'true' ? "disabled" : "" }}>
                <i class="fa-solid fa-eye" id="eye" style="color: #3B3B3B;"></i>
            </div>
        </div>
    </div>
    <script>
        $(`.password-{{ $name }}-container`).on('click', '#eye', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");

            const passwordInput = $(`.password-{{ $name }}-container input[name={{ $name }}]`);

            var newType = (passwordInput.attr("type") === "password") ? "text" : "password";

            passwordInput.attr("type", newType);
        });
    </script>
@endif

