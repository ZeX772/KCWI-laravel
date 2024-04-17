<div>
    <div class="row pl-3">
        <!-- Table List -->
        <div class="col-9 page-content-col">
            <div class="p-3 pt-4">
                <div class="row table-custom-filter">
                    <div class="col-12 position-relative d-flex align-items-end">
                        <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
                    </div>
                </div>
                <div class="table-responsive table-custom with-custom-search mt-4">
                    <table class="table table-hover w-100" id="coach-comments_table">
                        <thead>
                            <tr>
                                <th class="text-left"><input type="checkbox" class="check-all"></th>
                                <th class="text-left">LEVEL</th>
                                <th class="text-left">CHARACTERISTICS</th>
                                <th class="text-left">STUDENT</th>
                                <th class="text-left">COMMENT DATE</th>
                                <th class="text-left">TITLE</th>
                                <th class="text-left">STATUS</th>
                                <th class="text-center" style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $coachComments as $coachComment )
                                <tr data-row_id="{{ $coachComment['id'] }}">
                                    <td class="text-left"><input type="checkbox" class="check-all"></td>
                                    <td class="text-left">{{ $coachComment['level']['name'] }}</td>
                                    <td class="text-left">{{ $coachComment['characteristic']['name'] }}</td>
                                    <td class="text-left"><p>{{ $coachComment['student']['name'] }} <br><small>({{ $coachComment['student']['id'] }})</small></p></td>
                                    <td class="text-left">{{ formatDate($coachComment['created_at']) }}</td>
                                    <td class="text-left">{{ $coachComment['title'] }}</td>
                                    <td class="text-left {{ $coachComment['status'] == 'archived' ? 'text-danger' : 'text-success' }}">{{ ucfirst($coachComment['status']) }}</td>
                                    <td class="text-center">
                                        <div>
                                            <button type="button" class="view-button" data-row_id="{{ $coachComment['id'] }}" data-bs-toggle="modal" data-bs-target="#comment-modal">
                                                <x-svg-icon icon="view" width="20" height="20" />
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Table Information -->
        <div class="col-3">
            <div class="card">
                <div class="card-body main-page_normal_card_info">
                    <div class="col mb-4">
                        <div>
                            <h1 class="fw-semibold card-heading text-center">Coach Comment</h1>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
                    </div>
                    <div class="col coach-comment-detail_container">
                        <ul class="list-group border-none">
                            <li class="list-group-item d-xxl-flex p-0 border-bottom" style="border-style: none;">
                                <div class="container p-0">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Level</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-level" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Characteristics</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-characteristics" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Student</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-student" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Class Date</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-class_date" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Class Time</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-class_time" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Comment Date</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-comment_date" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Comment Time</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-comment_time" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Status</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-status" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="comment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Coach Comment</h4>
                <div class="d-flex align-items-center gap-2">
                    <span class="small-icon_btn p-2 cursor-pointer cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <div id="preview-form">
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('themes/tailwind/images/clipboard-image-7.png') }}" style="width: 24px;" alt="">
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-coach">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-student">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-level">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <x-svg-icon icon="calendar" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-class_datetime">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <x-svg-icon icon="calendar" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-comment_date_time">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: flex-start; justify-content: center;" class="pt-1">
                            <i class="fa-solid fa-square"></i>
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-title" style="font-weight: 500; font-size: 16px;">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: flex-start; justify-content: center;" class="pt-1">
                            <x-svg-icon icon="list" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-comment">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <div class="form-inline w-100">
                            <p class="preview-status">Status: <span>Active</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        var customTable = $('#coach-comments_table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0,7],
                    orderable: false
            }]
        });

        // Event listener for custom search input
        $('.table-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            customTable.search(searchTerm).draw();
        });

        $('#coach-comments_table tbody').on('click', 'tr', function(){
            const rowID = $(this).data('row_id');
            if(! rowID )
                return;

            const systemComments = <?= json_encode($coachComments) ?>;
            const comment = systemComments.find(value => value.id == rowID);

            $('.coach-comment-detail_container #info-level').text(comment.level.name);
            $('.coach-comment-detail_container #info-characteristics').text(comment.characteristic.name);
            $('.coach-comment-detail_container #info-student').text(comment.student.name);
            $('.coach-comment-detail_container #info-class_date').text(comment.class_data.start_date);
            $('.coach-comment-detail_container #info-class_time').text(comment.class_data.start_time + " - " + comment.class_data.end_time);
            $('.coach-comment-detail_container #info-comment_date').text(moment(comment.created_at).format('l'));
            $('.coach-comment-detail_container #info-comment_time').text(moment(comment.created_at).format('hh:mm A'));
            $('.coach-comment-detail_container #info-status').text(ucfirst(comment.status));
            $('.coach-comment-detail_container #info-status').removeClass('text-danger text-success');
            $('.coach-comment-detail_container #info-status').addClass(comment.status == 'archived' ? 'text-danger' : 'text-success');
        });

        $('#coach-comments_table').on('click', '.view-button', function(){
            const rowID = $(this).data('row_id');
            const systemComments = <?= json_encode($coachComments) ?>;
            const comment = systemComments.find(value => value.id == rowID);

            $('#comment-modal .preview-coach').text(comment.coach.name);
            $('#comment-modal .preview-student').text(comment.student.name);
            $('#comment-modal .preview-level').text(comment.level.name + "/" + comment.characteristic.name);
            $('#comment-modal .preview-class_datetime').text(comment.class_data.start_date + " " + comment.class_data.start_time + " - " + comment.class_data.end_time);
            $('#comment-modal .preview-comment_date_time').text(moment(comment.created_at).format('l hh:mm A'));

            $('#comment-modal .preview-title').text(comment.title);
            $('#comment-modal .preview-comment').text(comment.comment);
            $('#comment-modal .preview-status span').text(ucfirst(comment.status));
            $('#comment-modal .preview-status span').removeClass('text-danger text-success');
            $('#comment-modal .preview-status span').addClass(comment.status == 'archived' ? 'text-danger' : 'text-success');
        });
    });
</script>