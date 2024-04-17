<div class="row mt-3 custom-pagination">
    <div class="col-sm-12 col-md-5 pagination-info">
        <div class="dataTables_info" id="course-enrollment-table_info" role="status" aria-live="polite">Showing {{ $productData['from'] }} to {{ $productData['to'] }} of {{ $productData['total'] }} entries</div>
    </div>
    <div class="col-sm-12 col-md-7 pagination-buttons">
        <div class="dataTables_paginate paging_simple_numbers" id="course-enrollment-table_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous {{ $productData['prev_page_url'] ? '' : 'disabled' }}" id="course-enrollment-table_previous">
                    <a href="{{ route('wave.user.admin-main.products', ['tab'=>$tab, 'page'=> $productData['current_page'] - 1]) }}" aria-controls="course-enrollment-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                @for( $i = 1; $i <= $productData['last_page']; $i++ )
                    <li class="paginate_button page-item {{ $productData['current_page'] == $i ? 'active' : '' }}">
                        <a href="{{ route('wave.user.admin-main.products', ['tab'=>$tab, 'page'=> $i]) }}" aria-controls="course-enrollment-table" data-dt-idx="1" tabindex="0" class="page-link">{{ $i }}</a>
                    </li>
                @endfor
                <li class="paginate_button page-item next {{ $productData['next_page_url'] ? '' : 'disabled' }}" id="course-enrollment-table_next">
                    <a href="{{ route('wave.user.admin-main.products', ['tab'=>$tab, 'page'=> $productData['current_page'] + 1]) }}" aria-controls="course-enrollment-table" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>