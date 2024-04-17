@extends('theme::layouts.app')

@section('content')
<div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
    <div class="row g-0 d-xxl-flex justify-content-between">
        <div class="col-auto">
            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Level Management</h1>
        </div>
        <div class="col-auto">
            <button id="add-level-btn" class="btn btn-primary text-nowrap d-flex align-items-center" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);" data-bs-toggle="modal" data-bs-target="#level-modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-right: 3px;">
                    <path d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z" fill="currentColor"></path>
                </svg>
                Add Level
            </button>
        </div>
    </div>
    <div class="row d-xxl-flex" style="text-align: left;">
        <div class="col d-xxl-flex justify-content-xxl-start" style="border-bottom: 1px solid #E8E8E8;">
            <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-end" role="tablist" style="border-style: none;border-left-style: none;">
                <li class="nav-item" role="presentation" style="border-left-style: none;">
                    <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none;border-left-style: none;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 600;color: #7A7A7A;">ALL</a>
                </li>
            </ul>
         </div>
     </div>
     <div class="row" style="margin-top: 15px;">
        <!-- Table View -->
         <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
             <div class="tab-content custom-datatable_container" style="padding: 15px;">
                 <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                     <div class="table-responsive" style="height: auto;max-height: none;">
                         <table class="table table-hover custom-datatable" id="level-table" style="width: 100%;">
                             <thead>
                                 <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                     <th class="text-center"><input type="checkbox"></th>
                                     <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COURSE LEVEL</th>
                                     <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COURSE LEVEL CODE</th>
                                     <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COLOR</th>
                                     <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">AGE</th>
                                     <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
                                     <th></th>
                                 </tr>
                             </thead>
                             <tbody style="height: auto;">
                                @foreach($data as $key => $value)
                                    <tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="<?= $key ?>">
                                        <td class="text-center"><input type="checkbox"></td>
                                        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $value['name'] }}</td>
                                        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $value['abbreviation'] }}</td>
                                        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;"><div class="color cursor-pointer" data-color="{{ $value['color'] }}" style="border: 12px solid {{ $value['color'] }}"></div></td>
                                        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $value['age'] }}</td>
                                        <td class="{{ $value['status'] == 'Published' ? 'text-success' : 'text-danger' }}" style="font-family: Poppins, sans-serif;font-size: 12px; font-weight: 700;">{{ ucfirst($value['status']) }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div id="edit-btn" data-row_index="<?= $key ?>" data-bs-toggle="modal" data-bs-target="#level-modal" class="cursor-pointer">
                                                    <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                    </svg>
                                                </div>
                                                @if( $value['status'] != 'archived' )
                                                    <div id="delete-btn" data-row_index="<?= $key ?>" data-bs-toggle="modal" data-bs-target="#delete-modal" class="cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;">
                                                            <path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path>
                                                            <path d="M9 9H11V17H9V9Z" fill="currentColor"></path>
                                                            <path d="M13 9H15V17H13V9Z" fill="currentColor"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                @if( isSuperAdmin() && $value['status'] == 'archived' )
                                                    <div data-id="{{ $value['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal" class="cursor-pointer unarchive-btn">
                                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                                    </div>
                                                @endif
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
         <!-- Information View -->
         <div class="col">
             <div class="card">
                 <div class="card-body">
                     <div class="col">
                         <div>
                             <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Level</h1>
                         </div>
                     </div>
                     <div>
                         <h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
                     </div>
                     <div class="col mt-3">
                         <ul class="list-group" style="border-style: none;">
                             <li class="list-group-item d-xxl-flex" style="border-style: none;padding: 0px;">
                                 <div class="container" style="padding: 0px;">
                                     <div class="row" style="margin-bottom: 10px;">
                                         <div class="col-md-6">
                                             <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Level</h1>
                                         </div>
                                         <div class="col-md-6">
                                             <h1 id="detail-level_name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-bottom: 10px;">
                                         <div class="col-md-6">
                                             <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Abbreviation</h1>
                                         </div>
                                         <div class="col-md-6">
                                             <h1 id="detail-level_abbreviation" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-bottom: 10px;">
                                         <div class="col-md-6">
                                             <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Age</h1>
                                         </div>
                                         <div class="col-md-6">
                                             <h1 id="detail-level_age" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-bottom: 10px;">
                                         <div class="col-md-6">
                                             <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Characteristics</h1>
                                         </div>
                                         <div class="col-md-6">
                                             <ul id="detail-level_characteristics_container" style="padding: 0px;">
                                                <li style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;"><span style="color: rgb(122, 122, 122);">-</span></li>
                                            </ul>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-bottom: 10px;">
                                         <div class="col-md-6">
                                             <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Remark</h1>
                                         </div>
                                         <div class="col-md-6">
                                             <h1 id="detail-level_remarks" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-bottom: 10px;">
                                         <div class="col-md-6">
                                             <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified by</h1>
                                         </div>
                                         <div class="col-md-6">
                                             <h1 id="detail-modified_by" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                         </div>
                                     </div>
                                     <div class="row" style="margin-bottom: 10px;">
                                         <div class="col-md-6">
                                             <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified Date</h1>
                                         </div>
                                         <div class="col-md-6">
                                             <h1 id="detail-updated_at" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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

 <!-- Modal for ADD and UPDATE Data -->
 <div class="modal fade" role="dialog" tabindex="-1" id="level-modal">
     <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
         <div class="modal-content">
             <div class="modal-header" style="border-bottom-style: none;">
                 <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Level Information</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="col" style="width: 100%;">
                    <form id="modal-level-form">
                        <input type="hidden" name="status" value="Published">
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Level <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;" value="">
                                </div>
                            </div>
                            <div class="form-inline" style="width: 100%;margin-left: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Level Short Form <span class="text-danger">*</span></label>
                                    <input type="text" name="abbreviation" class="form-control" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;" value="">
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Class Size</label>
                                    <input type="text" name="class_size" class="form-control" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;" value="">
                                </div>
                            </div>
                            <div class="form-inline" style="width: 100%;margin-left: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Age <span class="text-danger">*</span></label>
                                    <input type="text" name="age" class="form-control" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;" value="">
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Duration (in minutes)</label>
                                    <input type="text" name="duration_in_minutes" class="form-control amount-input" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;" value="">
                                </div>
                            </div>
                            <div class="form-inline" style="width: 100%;margin-left: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Cost (per class)<span class="text-danger">*</span></label>
                                    <input type="text" name="default_price" class="form-control amount-input" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;" value="">
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Prerequisite</label>
                                    <input type="text" name="prerequisite" class="form-control" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;" value="">
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Banner</label>
                                    <input type="file" class="form-control" id="banner-field" name="banner">
                                    <img src="" alt="" id="banner-preview" class="mt-3 w-50">
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Characteristics</label>
                                    <div id="characteristics-container" class="d-flex flex-wrap gap-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container characteristic-container d-none" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="card">
                                <div class="card-body">
                                    <input type="text" name="characteristic_name" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;width: 100%;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                                    <div class="col" style="margin-top: 20px;">
                                        <button class="btn btn-light fw-semibold hide-characteristic_container" type="button" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);margin-right: 20px;">Cancel</button>
                                        <button id="save-characteristic" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="margin-top: 10px; padding-left: 0px;">
                            <div class="row">
                                <div class="col-auto">
                                    <button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap show-characteristic_container" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                                            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                                        </svg>
                                        Add Characteristic
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Represent Color (Will show in the timetable)</label>
                                    <input type="hidden" name="color" value="#FFCC00">
                                    <div id="colors-container" class="d-xxl-flex align-items-xxl-center gap-3">
                                        <div class="color color-1 cursor-pointer selected" data-color="#FFCC00"></div>
                                        <div class="color color-2 cursor-pointer" data-color="#CCFFFF"></div>
                                        <div class="color color-3 cursor-pointer" data-color="#00CCFF"></div>
                                        <div class="color color-4 cursor-pointer" data-color="#99CCFF"></div>
                                        <div class="color color-5 cursor-pointer" data-color="#CCFFCC"></div>
                                        <div class="color color-6 cursor-pointer" data-color="#99CC00"></div>
                                        <div class="color color-7 cursor-pointer" data-color="#33CCCC"></div>
                                        <div class="color color-8 cursor-pointer" data-color="#FF99CC"></div>
                                        <div class="color color-9 cursor-pointer" data-color="#FFD2F7"></div>
                                        <div class="color color-10 cursor-pointer" data-color="#FFEEF9"></div>
                                        <div class="color color-11 cursor-pointer" data-color="#CC99FF"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Remark</label>
                                    <textarea name="remarks" class="form-control level-remarks" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                 </div>
             </div>
             <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
                <button id="save-level" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
            </div>
         </div>
     </div>
 </div>

 <!-- Modal for Delete Confirmation -->
 <div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to archive this level?</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
					<b style="text-decoration: underline;" id="label-delete-level-name">Coach Ng</b> has a time clash with another class at this period.
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-delete-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="archive-level" class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal for Unarchive Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="text-warning" style="font-size: 20px;font-family: Poppins, sans-serif;">Are you sure you want to unarchive <b style="text-decoration: underline;" id="label-unarchive-name">[coach name]</b>?</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
					[Message here]
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="process-unarchive" class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>
 @endsection

 @section('script')
 <script type="text/javascript">
    var mSortingString = [];
 	var disableSortingColumn = 4;
	var characteristicData = [];
	var formAction = '';
	var selectedLevelID = '';
	var selectedCharacteristicIndex = null;
    var selectedData = {};
	var modalTitle = "Level Information";

     mSortingString.push({
         "bSortable": false,
         "aTargets": [disableSortingColumn]
     });

     $(function() {
        /** Initialize Datatable */
        let table = $('#level-table').DataTable({
 			"paging": true,
 			"ordering": true,
 			"info": true,
 			"aaSorting": [],
 			"orderMulti": true,
 			"aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0,3,6],
                    orderable: false
            }]
 		});

        $('#level-table').on('click', '.unarchive-btn', function(){
            
			const id = $(this).data('id');
            

			const pageData = <?= json_encode($data) ?>;

			const level = pageData.find((data) => data.id == id);
			
			selectedData = level;
            
			$('#label-unarchive-name').text( selectedData.name );
		});

        /**
		 * ------------------
		 * EVENTS
		 * ------------------
		 */
		/** SELECT ROW
		 * Process the population of information section when viewing specific data row */
		$('#level-table tbody').on('click', 'tr', function() {
			const rowIndex = $(this).data('row_index');
            if(! rowIndex && rowIndex < 0 )
                return;

 			const levelData = <?= json_encode($data) ?>;
			const rowData = levelData[rowIndex];

			// Update Details on the Level Information Section
			$("#detail-level_name").text(rowData.name);
			$("#detail-level_abbreviation").text(rowData.abbreviation);
			$("#detail-level_age").text(rowData.age);

            // To fill the details for characteristics
            $("#detail-level_characteristics_container").empty();
            rowData.level_characteristics.forEach(value => {
                $("#detail-level_characteristics_container").append( generateCharacteristicDetail(value.name) )       
            });

            if( rowData.level_characteristics.length <= 0 ) {
                $("#detail-level_characteristics_container").append("-")
            }

			$("#detail-level_remarks").text(rowData.remarks ?? '-');
            $('#detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        /** MODAL (HIDE & SHOW) CHARACTERISTIC FORM CONTAINER */
		$('#level-modal').on('click', '.show-characteristic_container', function() {
			$(".characteristic-container").toggleClass('d-none');
			$(".show-characteristic_container").toggleClass('d-none');
			$(".edit-characteristic").toggleClass('d-none');

            $( "input[name=characteristic_name]" ).removeClass('border border-danger');
            if( $( "input[name=characteristic_name]" ).next().is('p') )
				$( "input[name=characteristic_name]" ).next().remove();
 		});

		$('#level-modal').on('click', '.hide-characteristic_container', function() {
			$(".characteristic-container").toggleClass('d-none');
			$(".show-characteristic_container").toggleClass('d-none');
			$(".edit-characteristic").toggleClass('d-none');
 		});

        $('#level-modal').on('click', '.remove-characteristic', function() {
			const characteristicIndex = $(this).data('characteristic_id');

			if ( formAction == 'update' && characteristicData[characteristicIndex].id != '' )
				characteristicData[characteristicIndex].removed = true;

			else
				characteristicData.splice(characteristicIndex, 1);
			
            refreshCharacteristicList();
 		});

		$('#level-modal').on('click', '.edit-characteristic', function() {
            refreshCharacteristicList();

			const characteristicIndex = $(this).data('characteristic_id');

			selectedCharacteristicIndex = characteristicIndex;

			// Fill the characteristic input field
			$("input[name=characteristic_name]").val(characteristicData[characteristicIndex].name);
 		});

        /** MODAL (ADD & UPDATE) Characteristic
		 * Add and Update School Level Characteristic */
		$('#level-modal').on('click', '#save-characteristic', function() {
			const characteristicName = $( "input[name=characteristic_name]" ).val();
			
            const requiredFields = [
                'characteristic_name'
            ];

			const formData = [
				{
					name: 'characteristic_name',
					value: characteristicName,
				}
			];
            
			if( processErrorValidation(formData, requiredFields) )
				return;

			// If selectedCharacteristic variable has value, meaning action would be updating of characteristic
			if ( selectedCharacteristicIndex != null ) {
				characteristicData[selectedCharacteristicIndex].name = characteristicName;
				selectedCharacteristicIndex = null;

				refreshCharacteristicList();
			} else {
				const characteristicsData = {
					name: characteristicName,
					id: '',
					removed: false,
				};

				characteristicData.push(characteristicsData);

				characteristics(characteristicsData, characteristicData.length - 1)
			}
			// reset field
			$( "input[name=characteristic_name]" ).val("");
 		});

        /** SHOW ADD MODAL
		 * Set Action ( Add or Update ) on Modal */
		$('#add-level-btn').on('click', function() {
            resetModalForm();

			formAction = 'add';

			$("#level-modal .modal-title").text("Add " + modalTitle);

            // Set field status to Published as Default
            $('#modal-level-form input[name=status]').val('Published');
 		});

        /** DELETE ROW
		 * Process the data configuration when deleting data */
 		$('#level-table').on('click', '#delete-btn', function() {
			const rowIndex = $(this).data('row_index');
 			const levelData = <?= json_encode($data) ?>;
			const selectedData = levelData[rowIndex];

			selectedLevelID = selectedData.id;

			$("#label-delete-level-name").text( selectedData.name );
 		});

        /** UPDATE ROW
		 * Process the edit of School Level by Populating the fields on the modal */
 		$('#level-table').on('click', '#edit-btn', function() {
            resetModalForm();

			$("#level-modal .modal-title").text("Update " + modalTitle);

			formAction = 'update';
			const rowIndex = $(this).data('row_index');
 			const levelData = <?= json_encode($data) ?>;
			const selectedData = levelData[rowIndex];
			const rowData = Object.entries(selectedData).map(([key, value]) => {
				return { key, value };
			});

			selectedLevelID = selectedData.id;

			// Fill the input field with the selected data
			rowData.forEach(element => {
				if( element.key == 'remarks' )
					$(`.level-remarks`).val(element.value);
                
                if( element.key == 'color' ) {
                    $('#colors-container .color').removeClass('selected');
                    $(`[data-color="${element.value}"]`).toggleClass('selected');
                    $('input[name=color]').val(element.value);
                } else {
                    if( element.key != 'banner' )
                        $(`input[name=${element.key}]`).val(element.value);
                    if( element.key == 'banner' )
                        $('#banner-preview').attr('src', element.value);
                }
			});
			
			// Map characteristicData if the selected row has characteristics
            characteristicData = [];
            refreshCharacteristicList();
            
			if ( selectedData?.level_characteristics.length ) {
				selectedData?.level_characteristics.forEach(element => {
					characteristicData.push({
						name: element.name,
						id: element.id,
						removed: false
					});
				});

				characteristicData.forEach((element, key) => {
					characteristics(element, key);
				});

				$(".edit-characteristic").toggleClass('d-none');
			}
 		});

        /** FORM COLOR
         * Action to change selected color
         */
        $('#colors-container').on('click', '.color', function() {
            $('#colors-container .color').removeClass('selected');

            $(this).toggleClass('selected');

            // Fill the color field
            const colorValue = $(this).data('color');

            $('input[name=color]').val(colorValue)
        });

        /** STORE AND UPDATE DATA
		 * EVENTS with API REQUESTS */
		$("#save-level").on('click', async function() {
			$(this).attr('disabled', 'true');
			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#modal-level-form').serializeArray();

            const requiredFields = [
                'name', 'abbreviation', 'age',
                'default_price'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
                if( item.name == 'color' ) {
                    if( item.value == '' )
                        transformedData[item.name] = "#FFCC00";
                    else
                        transformedData[item.name] = item.value;
                } else {
                    transformedData[item.name] = item.value;
                }
			});

			if ( characteristicData.length )
				transformedData['characteristics'] = characteristicData;

            let formattedFormData = new FormData()

            Object.entries(transformedData).forEach(function(item) {
                if( item[0] == 'characteristics' ) {
                    formattedFormData.append(`characteristics`, JSON.stringify(item[1]))
                } else {
                    formattedFormData.append(item[0], item[1])
                }
 			});

 			const banner = document.getElementById('banner-field').files[0];

 			if ( banner )
 				formattedFormData.append('banner', banner)

            // return;

			if ( selectedLevelID == '' && formAction == 'add' )
				// API Request to save level
				await axios.post(`${getApiUrl()}/level/add`, formattedFormData, {
						headers: {
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
                        $('#level-modal #cancel-btn').click();

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = window.location
                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");
                        }
					})
					.catch(error => {
						$(this).removeAttr('disabled');

						if( error.response.status == 400 || error.response.status == 422 ) {
                            let errorMessages = "";
                            Object.keys(error.response.data.errors).forEach(key => {
                                error.response.data.errors[key].forEach(value => {
                                    errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                    toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                                });
                            });
                        }

                        if( error.response.status == 404 ) {
                            toastTopEnd("Cant' Process", error.response.data.message, "warning");
                        }

                        if( error.response.status == 500 ) {
                            toastTopEnd("System Error", error.response.data.message, "error");
                        }

                        if( error.response.status == 401 ) {
                            alert("Your session expired!");
                            window.location = window.location;
                        }
                        
						console.error('Error fetching data:', error);
					});
			
			if ( selectedLevelID != '' && formAction == 'update' ) {
                formattedFormData.append('id', selectedLevelID)
				// API Request to update vanue
				await axios.post(`${getApiUrl()}/level/update`, formattedFormData, {
						headers: {
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
                        $('#level-modal #cancel-btn').click();

						if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = window.location
                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");
                        }
					})
					.catch(error => {
						$(this).removeAttr('disabled');

						if( error.response.status == 400 || error.response.status == 422 ) {
                            let errorMessages = "";
                            Object.keys(error.response.data.errors).forEach(key => {
                                error.response.data.errors[key].forEach(value => {
                                    errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                    toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                                });
                            });
                        }

                        if( error.response.status == 404 ) {
                            toastTopEnd("Cant' Process", error.response.data.message, "warning");
                        }

                        if( error.response.status == 500 ) {
                            toastTopEnd("System Error", error.response.data.message, "error");
                        }

                        if( error.response.status == 401 ) {
                            alert("Your session expired!");
                            window.location = window.location;
                        }
                        
						console.error('Error fetching data:', error);
					});
			}
				
		});

		$("#archive-level").on('click', async function() {
			$(this).attr('disabled', 'true');

			const userToken = getUserToken();

			const formData = {
				id: selectedLevelID
			};

			await axios.post(`${getApiUrl()}/level/archive`, formData, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(res => {
                    $('#delete-modal #cancel-delete-btn').click();

                    if (! res.data.success ) {
                        toastInfo("Cant' Archive", res.data.message, "warning");
                    } else {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    }
				})
				.catch(error => {
					$(this).removeAttr('disabled');

                    if( error.response.status == 400 || error.response.status == 422 ) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if( error.response.status == 404 ) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if( error.response.status == 500 ) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if( error.response.status == 401 ) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }
                    
                    console.error('Error fetching data:', error);
				});
		});

        $('#process-unarchive').on('click', async function(){
			$(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			const transformedData = {
				id: selectedData.id
			};

			await axios.post(`${getApiUrl()}/level/unarchive`, transformedData, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(res => {
                    $('#unarchive-modal #cancel-btn').click();

                    if( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    }
				})
				.catch(error => {
					$(this).removeAttr('disabled');

                    if( error.response.status == 400 || error.response.status == 422 ) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if( error.response.status == 404 ) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if( error.response.status == 500 ) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if( error.response.status == 401 ) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }
                    
                    console.error('Error fetching data:', error);
				});
		});

        /**
		 * ------------------
		 * FUNCTIONS
		 * ------------------
		 */
		function characteristics( characteristicData, index ) {
			const template = generateCharacteristicsData(characteristicData, index)
			
			if (! characteristicData?.removed )
				$('#characteristics-container').append(template);
		}

		function generateCharacteristicsData( data, index ) {
			return `
				<div class="d-xxl-flex align-items-xxl-center" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;">
					<div class="col-xxl-11 w-auto mr-4">
						<label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${data.name}</label>
					</div>
					<div class="col cursor-pointer d-flex gap-1">
						<div class="edit-characteristic" data-characteristic_id="${index}">
							<svg id="" class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="width: 16px; height: 16px;color: #3B3B3B;">
								<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
							</svg>
						</div>
						<div class="remove-characteristic" data-characteristic_id="${index}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
								<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
								<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
							</svg>
						</div>
					</div>
				</div>
			`;
		}

        function generateCharacteristicDetail( name ) {
            return `<li style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;"><span style="color: rgb(122, 122, 122);">${name}</span></li>`;
        }

        function refreshCharacteristicList() {
			$('#characteristics-container').empty();
			characteristicData.forEach((element, key) => {
				characteristics(element, key)
			});
		}

        function resetModalForm() {
            $('#modal-level-form input').val('');
            $('#modal-level-form .level-remarks').val('');

            $(".characteristic-container").addClass('d-none');
			$(".show-characteristic_container").removeClass('d-none');
			$(".edit-characteristic").addClass('d-none');

            $('#modal-level-form input.form-control').removeClass('border border-danger');
            if( $('#modal-level-form input.form-control').next().is('p') )
                $('#modal-level-form input.form-control').next().remove();

            $('#modal-level-form select').removeClass('border border-danger');
            if( $('#modal-level-form select').next().is('p') )
                $('#modal-level-form select').next().remove();

            $('#modal-level-form textarea').removeClass('border border-danger');
            if( $('#modal-level-form textarea').next().is('p') )
                $('#modal-level-form textarea').next().remove();

            characteristicData = [];
            selectedLevelID = "";
            selectedCharacteristicIndex = null;

            refreshCharacteristicList();
        }

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
			errors = [];

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					if( item.value == "" ){
						errors.push({
							field_name: item.name,
							message: formatString(item.name) + " is required."
						});
					}
				}
			});

			if ( errors.length > 0 ) {
				renderErrors();

				return true;
			}

			return false;
		}

		function renderErrors() {
			if ( errors.length > 0 ) {
                const hasParentFields = ['dob'];

				errors.forEach((element) => {
                    const fieldSelector = $(`[name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();

                    if ( fieldSelector.parent().next().is('p') )
                        fieldSelector.parent().next().remove();

                    if (! hasParentFields.includes(element.field_name) ) {
                        fieldSelector.addClass('border border-danger');
					    fieldSelector.after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    } else {
                        fieldSelector.parent().addClass('border border-danger');
					    fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    }
				});
			}
		}

        function formatString(inputString) {
			// Split the string into words using underscores as separators
			let words = inputString.split('_');

			// Capitalize the first letter of each word
			let capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));

			// Join the words back together with a space between them
			let formattedString = capitalizedWords.join(' ');

			return formattedString;
		}

        function initializeInputClearEvent() {
            $('input').on('change', function(){
                $(this).removeClass('border border-danger');
                $(this).parent().removeClass('border border-danger');

                if ( $(this).next().is('p') )
                    $(this).next().remove();

                if ( $(this).parent().next().is('p') )
                    $(this).parent().next().remove();
            })

            $('select').on('change', function(){
                $(this).removeClass('border border-danger');
                $(this).parent().removeClass('border border-danger');

                if ( $(this).next().is('p') )
                    $(this).next().remove();

                if ( $(this).parent().next().is('p') )
                    $(this).parent().next().remove();
            })

            $('textarea').on('change', function(){
                $(this).removeClass('border border-danger');
                $(this).parent().removeClass('border border-danger');

                if ( $(this).next().is('p') )
                    $(this).next().remove();

                if ( $(this).parent().next().is('p') )
                    $(this).parent().next().remove();
            })
        }

        initializeInputClearEvent();
     });
 </script>@endsection