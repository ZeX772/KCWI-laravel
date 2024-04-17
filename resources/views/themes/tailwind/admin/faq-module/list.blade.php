@extends('theme::layouts.app')

@section('style')
<style>
    #question_list td {
        color: #3B3B3B;
        font-family: Poppins, sans-serif;
        font-size: 12px;
    }

    #question_list th {
        white-space: nowrap;
        color: #7A7A7A;
        font-size: 12px;
        line-height: 21px;
        letter-spacing: 0.02em;
        text-align: left;
    }

    #question_list .dataTables_wrapper .dataTables_paginate {
        text-align: right !important;
    }
</style>
@endsection


@section('content')
<div>
    <div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
    <div class="row g-0 d-xxl-flex justify-content-between">
        <div class="col-auto">
            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">FAQ Management</h1>
        </div>
        <div class="col-auto">

            <!--add FAQ-->
            <button class="btn btn-primary text-nowrap d-flex align-items-center" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);" data-bs-toggle="modal" data-bs-target="#addFAQModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-right: 12px;">
                    <path d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z" fill="currentColor"></path>
                </svg>Add FAQ
            </button>

        </div>
    </div>

        <div class="row d-xxl-flex" style="text-align: left;">
            <div class="col d-xxl-flex justify-content-xxl-start" style="border-bottom: 1px solid #E8E8E8;">
                <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-end" role="tablist" style="border-style: none;border-left-style: none;">
                    <li class="nav-item" role="presentation" style="border-left-style: none;"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none;border-left-style: none;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 600;color: #7A7A7A;">ALL</a></li>
                </ul>
            </div>
        </div>



        
        <div class="row" style="margin-top: 15px;">
            <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                <div class="tab-content" style="padding: 15px;">
                    <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                        <div class="table-responsive" style="height: auto;max-height: none;">
                            <table class="table table-hover" id="question_list" style="width: 100%;">
                                <thead>
                                    <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                        <th><input type="checkbox" id="selectAll" onclick="toggleCheckboxes()"></th>
                                        <th>ID</th>
                                        <th>QUESTION</th>
                                        <th>ANSWER</th>
                                        <th>CREATED_AT</th>
                                        <th>UPDATED_AT</th>
                                    </tr>
                                </thead>
                                <tbody style="height: auto;">

                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td><input type="checkbox" name="selectedFaqs[]" value="{{ $faq->id }}"></td>
                                            <td>{{ $faq->id }}</td>
                                            <td>{{ $faq->question }}</td>
                                            <td>{{ $faq->answer }}</td>
                                            <td>{{ $faq->created_at }}</td>
                                            <td>{{ $faq->updated_at }}</td>
                                            <!--update/delete button-->
                                            <td>
                                                <div class="table-acitions_container d-flex gap-2">
                                                    
                                                    <!--edit button-->
                                                    <button type="button" class="update-button" 
                                                            data-question-id="{{ $faq->id }}" 
                                                            data-question="{{ $faq->question }}"
                                                            data-answer="{{ $faq->answer }}">
                                                        <x-svg-icon icon="edit" width="16" height="14" />
                                                    </button>

                                                    
                                                    <!--delete button-->
                                                    <button type="button" class="delete-button" data-question-id="{{ $faq->id }}">
                                                        <x-svg-icon icon="delete" width="16" height="14" />
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
            </div>
        </div>
        
    </div>
</div>






<!--Add FAQ Modal-->
<form action="{{route('cms.faq-add')}}" method="post">
    <div class="modal fade" role="dialog" tabindex="-1" id="addFAQModal">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                
                <!--Add FAQ modal header-->
                <div class="modal-header" style="border-bottom-style: none;">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add FAQ</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <!--Add FAQ modal body-->
                <div class="modal-body">
                    <div class="col" style="width: 100%;">
                        <div class="container" style="padding: 0px; color: #636363;">
                            <!-- Question -->
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363; font-size: 14px;">Question</label>
                                    <input required name="question" class="form-control" type="text" style="color: #3B3B3B; font-size: 14px; font-family: Poppins, sans-serif; background: #F5F5F5; border-style: none; height: 48px;">
                                </div>
                            </div>
                
                            <!-- Answer -->
                            <div class="form-inline" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363; font-size: 14px;">Answer</label>
                                    <textarea required name="answer" class="form-control" placeholder="Answer..." style="background: #F5F5F5; border-style: none; height: 133px; color: #3B3B3B; font-size: 14px; font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Add FAQ modal footer-->
                <div class="modal-footer justify-content-between" style="border-top-style: none;">
                    <button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
                    <button class="btn btn-primary" type="submit" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Delete FAQ modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="deleteFAQModal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            
            <!-- Delete FAQ modal header -->
            <div class="modal-header" style="border-bottom-style: none;">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Delete FAQ</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>

            <!-- Delete FAQ modal body -->
            <div class="modal-body">
                <p>Are you sure you want to delete this FAQ?</p>
            </div>
            
            <!-- Delete FAQ modal footer -->
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
                <button id="confirmDeleteButton" class="btn btn-danger" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #FF0000;border-style: none;box-shadow: 0px 4px #171c25;">Delete</button>
            </div>
        </div>
    </div>
</div>



<!-- Update FAQ modal -->
<form action="{{ route('cms.faq-update', ['id' => $faq->id]) }}" method="PUT" id="updateQuestionForm">
    @csrf
    @method('PUT')

    <div class="modal fade" role="dialog" tabindex="-1" id="updateFAQModal">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                
                <!-- Update FAQ modal header -->
                <div class="modal-header" style="border-bottom-style: none;">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Update FAQ</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <!-- Update FAQ modal body -->
                <div class="modal-body">
                    <div class="col" style="width: 100%;">
                        <div class="container" style="padding: 0px; color: #636363;">
                            <!-- Question -->
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363; font-size: 14px;">Question</label>
                                    <input required name="question" class="form-control" type="text" value="{{ $faq->question }}" style="color: #3B3B3B; font-size: 14px; font-family: Poppins, sans-serif; background: #F5F5F5; border-style: none; height: 48px;">
                                </div>
                            </div>
                
                            <!-- Answer -->
                            <div class="form-inline" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363; font-size: 14px;">Answer</label>
                                    <textarea required name="answer" class="form-control" style="background: #F5F5F5; border-style: none; height: 133px; color: #3B3B3B; font-size: 14px; font-family: Poppins, sans-serif;">{{ $faq->answer }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update FAQ modal footer -->
                <div class="modal-footer justify-content-between" style="border-top-style: none;">
                    <button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
                    <button class="btn btn-primary" type="submit" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection














@section('script')
{{-- so adding it here is double importing, which causes your js script to not run --}}
<script>

    //checkbox function
    function toggleCheckboxes() {
        var checkboxes = document.querySelectorAll('input[name="selectedFaqs[]"]');
        
        var selectAllCheckbox = document.getElementById('selectAll');

        checkboxes.forEach(function (checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }





























    
    document.addEventListener('DOMContentLoaded', function () {
        var updateButtons = document.querySelectorAll('.update-button');

        updateButtons.forEach(function (button) {
            button.addEventListener('click', function () {

                var questionId = button.getAttribute('data-question-id');
                var question = button.getAttribute('data-question');
                var answer = button.getAttribute('data-answer');

                // Set values in the form
                document.querySelector('#updateQuestionForm [name="question"]').value = question;
                document.querySelector('#updateQuestionForm [name="answer"]').value = answer;

                // Open the update modal (assuming you have an ID for the modal)
                var updateModal = new bootstrap.Modal(document.getElementById('updateFAQModal'));
                updateModal.show();
            });
        });

        // Update form submission
        document.querySelector('#updateQuestionForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var form = event.target;

            fetch(form.action, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    _method: 'PUT', // Laravel method override
                    question: form.querySelector('[name="question"]').value,
                    answer: form.querySelector('[name="answer"]').value,
                }),
            })

            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                // Handle the response from the server
                // Optionally, you can reload the page or update the UI
                // window.location.reload();
            })
            .catch(error => {
                console.error('Error:', error.message);
                // Optionally, display an error message to the user
            });
        });
    });
</script>

@endsection
