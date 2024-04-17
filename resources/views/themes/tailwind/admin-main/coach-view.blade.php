@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Coach Management" 
        :withButton="false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#place-video-modal" 
        buttonType="button"
        buttonId="video-modal_id"
        buttonTitle="Place Video"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">BASIC INFORMATION</a>
        </li>

        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">TEACHING HISTORY</a>
        </li>

        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">COACH COMMENT</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane active basic-info_tab" role="tabpanel">
            <x-coach-basic-info :entry="$entry"/>
        </div>
        <div id="tab-2" class="tab-pane teaching-history_tab" role="tabpanel">
            <x-coach-teaching-history :teachingHistory="$teaching_history" :entry="$entry" :coaches="$coaches" />
        </div>
        <div id="tab-3" class="tab-pane coach-comments_tab" role="tabpanel">
            <x-coach-comments :coachComments="$coach_comments"/>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        
    });
</script>
@endsection