var mSortingString = [];
        var disableSortingColumn = 4;
        mSortingString.push({ "bSortable": false, "aTargets": [disableSortingColumn] });
$(function() {
    var table = $('#example').DataTable({
        "paging": true,
        "ordering": false,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "aoColumnDefs": mSortingString,
        "columnDefs": [
            {
                "targets": -1, // The last column
                "data": null,
                "defaultContent": '<button class="view-button"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="margin-right:20px;color:#3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg></button> <button class="edit-button"><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="margin-right:20px;color:#3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg></button> <button class="delete-button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color:#3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></button>'
            }
        ]
    });

    // Add event listeners for the buttons
    $('#example').on('click', '.view-button', function() {
        var rowData = table.row($(this).closest('tr')).data();
         redirectToAnotherPage(rowData); // Redirect to another page with row data
    });

    $('#example').on('click', '.edit-button', function() {
        var rowData = table.row($(this).closest('tr')).data();
        showModal2('Edit Data', rowData); // Pass the row data to the modal
    });

    $('#example').on('click', '.delete-button', function() {
        var rowData = table.row($(this).closest('tr')).data();
        showModal('Delete Data', rowData); // Pass the row data to the modal
    });


  function redirectToAnotherPage(rowData) {
        // Modify this line to specify the URL you want to redirect to
        var redirectUrl = 'http://127.0.0.1:8000/admin-main/view-course'; // Change this to your desired URL
        
        // Add query parameters with row data if needed
        // For example, if you want to pass an ID from rowData, you can do something like this:
        // var id = rowData.id;
        // redirectUrl += '?id=' + id;

        // Redirect to the specified URL
        window.location.href = redirectUrl;
    }



    function showModal(title, rowData) {

        // Create a Bootstrap modal
        var modal = `
            <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to delete this item?</p>
                        <p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;"><b style="text-decoration: underline;">Coach Ng</b> has a time clash with another class at this period.</p>
                    </div>
                    <div class="modal-footer justify-content-between" style="border-top-style: none;"><button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button><button class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button></div>
                </div>
            </div>
        </div>
        `;

        // Append the modal HTML to the body
        $('body').append(modal);

        // Show the modal
        $('#myModal').modal('show');

        // Remove the modal from the DOM when closed
        $('#myModal').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    }

    function showModal2(title, rowData) {

        // Create a Bootstrap modal
        var modal2 = `
  
                      <div class="modal fade" role="dialog" tabindex="-1" id="myModal2">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom-style: none;">
                        <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Course</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col" style="width: 100%;">
                            <div class="container" style="padding: 0px;color: #636363;">
                                <form class="form-inline">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Course Level</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                            <option value="">Ripplet Starter 1</option>
                                            <option value="">Ripplet Starter 2</option>
                                            <option value="">Ripplet Starter</option>
                                            <option value="">Beginner 1</option>
                                            <option value="">Beginner 2</option>
                                            <option value="">Intermediate 1</option>
                                            <option value="">Intermediate 2</option>
                                            <option value="">Club Training</option>
                                            <option value="">Adult (Non-Swimmer)</option>
                                        </select></div>
                                </form>
                            </div>
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Default Venue</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                            <option value="">VSA</option>
                                            <option value="">GSH</option>
                                        </select></div>
                                </form>
                                <form class="form-inline" style="width: 100%;margin-left: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Default Facility</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                            <option value="">VSA Main pool</option>
                                            <option value="">VSA Public Pool</option>
                                            <option value="">VSA Teaching pool </option>
                                            <option value="">VSA Toddlers' pool </option>
                                        </select></div>
                                </form>
                            </div>
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Class Size (Maximum Number of Students)</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;"></div>
                                </form>
                                <form class="form-inline" style="width: 100%;margin-left: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Fee (HK$) Per Class</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;"></div>
                                </form>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363;">
                                <form class="form-inline">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Assign Coach</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                            <option value="">Coach Ng</option>
                                            <option value="">Coach Chan</option>
                                            <option value="">Coach Lee</option>
                                            <option value="">Coach Cheung</option>
                                            <option value="">Coach Wong</option>
                                            <option value="">Coach Ho</option>
                                            <option value="">Intermediate 2</option>
                                            <option value="">Coach Leung</option>
                                            <option value="">Coach Law</option>
                                        </select><input class="form-control" type="text" data-role="tagsinput" data-class="label-info" style="border-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;"></div>
                                </form>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363;">
                                <form class="form-inline">
                                    <div class="form-group" style="margin-bottom: 20px;"><label class="form-label" style="color: #636363;font-size: 14px;">Course Category</label>
                                        <div class="d-xxl-flex justify-content-around align-items-xxl-center">
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">ASA</h1><input type="radio">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Club</h1><input type="radio">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Group</h1><input type="radio">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-xxl-flex justify-content-around align-items-xxl-center" style="margin-top: 10px;">
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Private</h1><input type="radio">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Run</h1><input type="radio">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Swim Team</h1><input type="radio">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363;">
                                <form class="form-inline">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Add Class</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="d-xxl-flex justify-content-between align-items-xxl-center card-title" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class #01<svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
                                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                        <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                                                    </svg></h4>
                                                <div class="d-xxl-flex align-items-xxl-center">
                                                    <div class="col" style="margin-right: 10px;">
                                                        <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                                                                <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                                        </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col" style="margin-right: 10px;margin-left: 10px;">
                                                        <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start time</label>
                                                                <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                            <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                        </svg></span><input class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col" style="margin-left: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;">End time</label>
                                                        <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                    <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                </svg></span><input class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                                                    </div>
                                                </div>
                                                <div class="col d-xxl-flex align-items-xxl-center">
                                                    <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" for="formCheck-10" style="color: #3B3B3B;font-size: 14px;">Change Coach (only this class)</label></div>
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" for="formCheck-11" style="color: #3B3B3B;font-size: 14px;">Change Venue / Facility (only this class)</label></div>
                                                </div>
                                                <div class="col d-xxl-flex justify-content-around align-items-xxl-center" style="margin-top: 20px;">
                                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Coach</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                            <option value="">Coach Ng</option>
                                                            <option value="">Coach Chan</option>
                                                            <option value="">Coach Lee</option>
                                                            <option value="">Coach Cheung</option>
                                                            <option value="">Coach Wong</option>
                                                            <option value="">Coach Ho</option>
                                                            <option value="">Intermediate 2</option>
                                                            <option value="">Coach Leung</option>
                                                            <option value="">Coach Law</option>
                                                        </select><input class="form-control" type="text" data-role="tagsinput" data-class="label-info" style="border-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;"></div>
                                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Venue</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                            <option value="">GSH</option>
                                                            <option value="">VSA</option>
                                                        </select><input class="form-control" type="text" data-role="tagsinput" data-class="label-info" style="border-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;"></div>
                                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Facility</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                            <option value="">VSA Main pool</option>
                                                            <option value="">VSA Public Pool</option>
                                                            <option value="">VSA Teaching pool </option>
                                                            <option value="">VSA Toddlers' pool </option>
                                                        </select><input class="form-control" type="text" data-role="tagsinput" data-class="label-info" style="border-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>




                          <div class="container" style="margin-top: 10px; padding-left: 0px;">
    <div class="row">
        <div class="col-auto">
            <button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25); margin-right: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                </svg>
                Add Class
            </button>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);" data-bs-toggle="modal" data-bs-target="#modal-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                </svg>
                Add Bulk Class
            </button>
        </div>
    </div>
</div>





                            <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Status</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                            <option value="">Published</option>
                                            <option value="">Private</option>
                                        </select></div>
                                </form>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Remark</label><textarea class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between" style="border-top-style: none;"><button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button><button class="btn btn-primary" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button></div>
                </div>
            </div>
        </div>      
        `;

        // Append the modal HTML to the body
        $('body').append(modal2);

        // Show the modal
        $('#myModal2').modal('show');

        // Remove the modal from the DOM when closed
        $('#myModal2').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    }
});
