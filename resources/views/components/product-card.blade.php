<?php
    $productCover = "";
    foreach ($data['images'] as $key => $value) {
        if( $value['is_cover'] == 1 )
            $productCover = $value['image_path'];
    }
?>
<div class="product-card">
    <div class="product-header p-3">
        <div class="d-flex justify-content-between align-items-center">
            <span class="badge custom-badge bg-{{ $data['status'] == 'available' ? 'success' : 'danger' }}">{{ ucFirst($data['status']) }}</span>
            <span><input type="checkbox" name="products_checkbox" data-id="{{ $data['id'] }}" data-container="{{ $container ?? '' }}"></span>
        </div>
    </div>
    <div class="product-body border-bottom open-modal"  data-id="{{ $data['id'] }}" data-bs-toggle="modal" data-bs-target="#product-info-modal">
        <img src="{{ $productCover }}" alt="">
    </div>
    <div class="product-footer text-left p-3 open-modal" data-id="{{ $data['id'] }}" data-bs-toggle="modal" data-bs-target="#product-info-modal">
        <p>{{ $data['name'] }}</p>
        <div class="d-flex justify-content-between align-items-center pt-3">
            <span>{{ formatDate($data['created_at']) }}</span>
            <span class="d-flex align-items-center gap-2">
                @foreach( $data['tags'] as $tag )
                    <span>{{ $tag['name'] }},</span>
                @endforeach
            </span>
            <span>${{ $data['price'] }}</span>
        </div>
    </div>
</div>

<script>
    $('.product-card').on('click', 'input[name=products_checkbox]', function(){
        const isChecked = $(this).is(':checked');
        const container = $(this).data('container');

        if( isChecked ) {
            window.product_selected_from = container;
        }
    });
</script>