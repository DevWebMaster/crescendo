<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <label><h3><?= $title; ?></h3></label>
            <hr>
            <!-- <div class="card"> -->
              <form method="post" enctype="multipart/form-data" id="uploadForm">
                <!-- <div class="card-body"> -->
                  <fieldset>
                    <legend>Audition Information:</legend>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Audition Name:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%" type="text" readonly class="form-control form-control-sm" name="audition_name" id="audition_name" value="<?= $little_morart[0]['audition_name']; ?>">
                          <input type="hidden" name="audition_id" id="audition_id" value="<?= $little_morart[0]['id']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2"  style="text-align: right;">
                          <label class="title mr-2">Available for Application:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%" type="text" readonly class="form-control form-control-sm" name="audition_status" id="audition_status" value="<?= $little_morart[0]['is_active'] ? 'Open' : 'Close'; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Audition Center:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_location" id="audition_location" value="<?= $little_morart[0]['auditionlocation']; ?>">
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Audition Date:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_status" id="audition_status" value="<?= $little_morart[0]['audition_date']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Application Deadline:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%" type="date" readonly class="form-control form-control-sm" name="audition_deadline" id="audition_deadline" value="<?= $little_morart[0]['audition_deadline']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Late Fee</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%" type="number" readonly class="form-control form-control-sm" name="late_fee" id="late_fee" value="<?= $little_morart[0]['late_fee']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <!-- <label>Special Request:</label> -->
                          <input type="checkbox" name="isonline" id="isonline"> Online Video
                        </div>
                      </div>
                    </div>
                    <div id="online_video_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-3">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Video link:</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-9">
                          <div class="form-group flex-group mb-2">
                            <input style="width: 65%" type="text" class="form-control form-control-sm" name="video_link" id="video_link">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the video link."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend>Special Request:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <!-- <label>Special Request:</label> -->
                          <input type="checkbox" name="special_request" id="special_request"> Do you have a special request?
                        </div>
                      </div>
                    </div>
                    <div id="special_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-12">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Request Time:</label>
                              <input style="width: 20%;" readonly type="date" class="form-control form-control-sm" name="request_date" id="request_date" value="<?= $little_morart[0]['audition_date']; ?>">
                              <label class="title mr-2 mt-1 ml-3">Time</label>
                              <input style="width: 20%;" type="time" class="form-control form-control-sm ml-3 mt-1" name="request_time" id="request_time">
                              <!-- <select style="width: 30%;" class="form-control" name="request_time" id="request_time">
                                <option value="1">Between 9:00 AM and 1:00PM</option>
                                <option value="2">After 2:00 PM</option>
                              </select> -->
                            <!--<input style="width: 20%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm ml-3 mt-1" name="request_hour" id="request_hour">
                            <label class="title mr-2 mt-1">hour</label>
                            <input style="width: 20%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm ml-3 mt-1" name="request_minute" id="request_minute">
                            <label class="title mr-2 mt-1">minute</label> -->
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-3">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Request Need:</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-9">
                          <div class="form-group flex-group mb-2">
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="request_reason" id="request_reason" placeholder="ex. help for handicap, or autistic students">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the request reason."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <?php
                    if($this->session->userdata('admin_role_id') != 4):
                  ?>
                  <fieldset>
                    <legend>Teacher Information:</legend>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Teacher:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" placeholder="Enter correct full name as it will be shown as it appears on the Programme." value="<?= $role_id != 4 ? $user_info['username'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher name."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Teacher Email:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_email" id="teacher_email" value="<?= $role_id != 4 ? $user_info['email'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher email."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Country:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <select style="width: 65%;" class="form-control" name="teacher_country_id" id="teacher_country_id">
                            <?php
                              foreach($countries as $country):
                            ?>
                              <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Teacher Address:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" value="<?= $role_id != 4 ? $user_info['address'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher address."></i>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Mobile Number:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="teacher_mobile_no" id="teacher_mobile_no" value="<?= $role_id != 4 ? $user_info['mobile_no'] : ''; ?>">
                        </div>
                      </div>
                    </div> -->
                  </fieldset>
                  <hr>
                  <?php
                    endif;
                  ?>
                  <fieldset>
                    <legend>Student Information:</legend>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Student Name:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_name" id="student_name" placeholder="Enter correct full name as it will be shown as it appears on the Programme." value="<?= $role_id == 4 ? $user_info['username'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student name."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Student Email:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_email" id="student_email" value="<?= $role_id == 4 ? $user_info['email'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student email."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Country:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <select style="width: 65%;" class="form-control" name="country_id" id="country_id">
                            <?php
                              foreach($countries as $country):
                            ?>
                              <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Address:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_address" id="student_address" value="<?= $role_id == 4 ? $user_info['address'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student address."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Mobile Number:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="student_mobile_no" id="student_mobile_no" value="<?= $role_id == 4 ? $user_info['mobile_no'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student mobile number."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Student Birthday:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="date" min="1950-01-01" max="2050-12-31" class="form-control form-control-sm" name="student_birthday" id="student_birthday">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student birthday."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Student Age:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="number" class="form-control form-control-sm" name="student_age" id="student_age">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student age."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Years of Study:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="number" min="0" max="20" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="studying_year" id="studying_year">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student's studying year."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Level:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <select style="width: 65%;" class="form-control" name="level" id="level">
                            <option value="1">Intermediate</option>
                            <option value="2">Junior</option>
                            <option value="3">Advance</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Instrument:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <select style="width: 65%;" class="form-control" name="instrument" id="instrument">
                            <?php
                              foreach($instruments as $instrument):
                            ?>
                              <option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div id="instrument_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-3">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Other Instrument:</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-9">
                          <div class="form-group flex-group mb-2">
                            <input style="width: 65%" type="text" class="form-control form-control-sm" name="other_instrument" id="other_instrument">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group flex-group mb-2">
                          <label style="font-weight: bold;"><i style="color: red;">*</i>Performance:</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="radio" style="display: flex; justify-content: space-between; padding-bottom: 8px;">
                          <label>
                              <input type="radio" name="performance_type" id="solo" value="1" checked="checked">
                              Solo (USD <?= $little_morart[0]['fee_solo'] ?>)
                              <input type="hidden" name="solo_price" id="solo_price" value="<?= $little_morart[0]['fee_solo']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="duet" value="2">
                              Duet (USD <?= $little_morart[0]['fee_duet'] ?>)
                              <input type="hidden" name="duet_price" id="duet_price" value="<?= $little_morart[0]['fee_duet']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="trio" value="3">
                              Trio (USD <?= $little_morart[0]['fee_trio'] ?>)
                              <input type="hidden" name="trio_price" id="trio_price" value="<?= $little_morart[0]['fee_trio']; ?>">
                          </label>
                          <!-- <label>
                              <input type="radio" name="performance_type" id="quartet" value="4">
                              Quartet (USD <?= $little_morart[0]['fee_quartet'] ?>)
                              <input type="hidden" name="quartet_price" id="quartet_price" value="<?= $little_morart[0]['fee_quartet']; ?>">
                          </label> -->
                          <label>
                              <input type="radio" name="performance_type" id="ensemble" value="4">
                              Ensemble of 4 or more participants(fee per each performer) (USD <?= $little_morart[0]['fee_ensemble'] ?>)
                              <input type="hidden" name="ensemble_price" id="ensemble_price" value="<?= $little_morart[0]['fee_ensemble']; ?>">
                          </label>
                        </div>
                      </div>
                    </div>
                    <div id="solo_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers1:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers" id="co_performers">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument1:</label>
                            <select class="form-control" name="co_instrument" id="co_instrument">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument1:</label>
                              <input style="width:  50%;" type="text" class="form-control form-control-sm" name="co_other_instrument" id="co_other_instrument">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="duo_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers2:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers2" id="co_performers2">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument2:</label>
                            <select class="form-control" name="co_instrument2" id="co_instrument2">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section2" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument2:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument2" id="co_other_instrument2">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="trio_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers3:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers3" id="co_performers3">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument3:</label>
                            <select class="form-control" name="co_instrument3" id="co_instrument3">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 col-md-1">
                          <div class="form-group mb-2">
                            <button type="button" class="btn btn-sm btn-info add_more px-2 py-2" style="background: #EEA400; border: none; border-radius: 8px;" id="add_more">Add More</button>
                          </div>
                        </div>
                        <div id="co_instrument_section3" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument3:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument3" id="co_other_instrument3">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="extra_section"></div>
                    </div>
                    <!-- <div id="quartet_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers4:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers4" id="co_performers4">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument4:</label>
                            <select class="form-control" name="co_instrument4" id="co_instrument4">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section4" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument4:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument4" id="co_other_instrument4">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <!-- <div id="ensemble_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers5:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers5" id="co_performers5">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument5:</label>
                            <select class="form-control" name="co_instrument5" id="co_instrument5">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section5" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument5:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument5" id="co_other_instrument5">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </fieldset>
                  <hr>
                  <?php
                    if($this->session->userdata('admin_role_id') == 4):
                  ?>
                  <fieldset>
                    <legend>Teacher Information:</legend>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Teacher:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" placeholder="Enter correct full name as it will be shown as it appears on the Programme." value="<?= $role_id != 4 ? $user_info['username'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher name."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Teacher Email:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_email" id="teacher_email" value="<?= $role_id != 4 ? $user_info['email'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher email."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Country:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <select style="width: 65%;" class="form-control" name="teacher_country_id" id="teacher_country_id">
                            <?php
                              foreach($countries as $country):
                            ?>
                              <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Address:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" value="<?= $role_id != 4 ? $user_info['address'] : ''; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher address."></i>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Mobile Number:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="teacher_mobile_no" id="teacher_mobile_no" value="<?= $role_id != 4 ? $user_info['mobile_no'] : ''; ?>">
                        </div>
                      </div>
                    </div> -->
                  </fieldset>
                  <hr>
                  <?php
                    endif;
                  ?>
                  <fieldset>
                    <legend>REPERTOIRE:</legend>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Composer:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="composer" id="composer" placeholder="L.Beethoven">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the composer name."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Title(Op., No., mov., key):</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Sonata No.8, Op.13, C minor, I mov.">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the music title."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Duration(in Minutes):</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <div style="display: flex; align-items: center; width: 65%;">
                            <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm mr-1" name="student_time" id="student_time">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="'Enter accurate time of piece as this will be the allotted time allowed."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend><i style="color: red;">*</i>Payment:</legend>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="radio" style="display: flex; justify-content: space-around; padding-bottom: 8px;">
                          <label>
                              <input type="radio" name="payment_type" id="paypal" value="1" checked="checked">
                              Paypal
                          </label>
                          <label>
                              <input type="radio" name="payment_type" id="order_check" value="2">
                              Money order/check
                          </label>
                        </div>
                      </div>
                    </div>
                    <div id="paypal_section">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Transaction ID:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="transaction_id" id="transaction_id">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Paypal transaction ID."></i>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Transaction Date:</label>
                            <input style="width: 65%;" type="date" class="form-control form-control-sm" name="transaction_date" id="transaction_date" min="1950-01-01" max="<?= date('Y-m-d'); ?>">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Paypal transaction date."></i>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Paid Amount:</label>
                            <input style="width: 65%;" type="number" class="form-control form-control-sm" name="paid_amount" id="paid_amount" placeholder="Enter the Paid Amount">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Paid Amount."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="order_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Paid Amount:</label>
                            <input style="width: 65%;" type="number" class="form-control form-control-sm" name="order_paid_amount" id="order_paid_amount" placeholder="Enter the Paid Amount">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Paid Amount."></i>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Payment Code:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="payment_code" id="payment_code">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Payment code."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>  
                  <hr>                
                  <div class="row">
                    <input type="hidden" name="inx" id="inx">
                    <input type="hidden" name="role_id" id="role_id" value="<?= $role_id; ?>">
                    <div class="col-12 col-md-6">
                      <div class="form-group flex-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_little_morarts px-4 py-2" style="background: #EEA400; border: none; border-radius: 16px; width: 100%;" value="Submit">
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group flex-group mt-4">
                        <a type="button" style="border: none; border-radius: 16px; width: 100%;" class="btn btn-sm btn-danger cancel px-4 py-2" id="cancel" href="<?= site_url(); ?>admin/applyauditions/index">Cancel</a>
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
              </form>
            <!-- </div> -->
        </div>    
      </div><!--/ row --> 
      <!--------  modal ----------> 
      <div class="modal fade" id="confirm_little_morarts" tabindex="-1" role="dialog" aria-labelledby="confirm_little_morartsLabel">
      <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="confirm_little_morartsLabel">Confirmation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form method="post" enctype="multipart/form-data" id="confirmForm">
            <div class="modal-body">
              <div class="row">
              <div class="col-md-12">
                <label>Would you like to add another application?</label>
                </div>    
            </div><!--/ row -->
            <div class="loader" style="margin-left: 40%; display: none;"></div>
            </div><!--/body -->
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-info add_label_no px-3" id="btn_confirm" data-dismiss="modal">Yes</button>
              <button type="button" class="btn btn-default" id="btn_close" data-dismiss="modal">No</button>
            </div><!--/footer -->
          </form>
      </div>
      </div>
      </div>
      <!---------modal---------->
    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var inx = 3;
    var user_role_id = $('#role_id').val();
    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#teacher_name').val() && $('#teacher_email').val() && $('#student_name').val() && $('#student_email').val() && $('#student_address').val() && $('#student_mobile_no').val() && $('#student_birthday').val() && $('#student_birthday').val().split('-')[0] < 2050 && $('#student_birthday').val().split('-')[0] > 1950 && $('#composer').val() && $('#title').val() && $('#student_time').val()){
        if($('#paypal').is(':checked') && ($('#transaction_date').val().split('-')[0] < 1950 || $('#transaction_date').val().split('-')[0] > 2050)){
          toastr.warning('Please fill the correct date in Transaction Date Field.');
          return;
        }else{
          var formData = new FormData(this);
          $.ajax({
            url: '<?= site_url(); ?>admin/applyauditions/save_little_morarts',
            type: 'POST',
            data: formData,       
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              var result = JSON.parse(response);
              if(!result || result == 0){
                toastr.warning('Saving the data is failed.');
              }else if(result == 'closed'){
                toastr.warning('Apply for audition is finished.');
              }else{
                toastr.success('The data is saved successfully.');
                if(user_role_id != 4){
                  $('#confirm_little_morarts').modal("show")
                }else {
                  setTimeout(function(){
                    window.location.href = '<?= site_url(); ?>admin/activeapplication/index';
                  }, 600);
                }
              }
            }
          })
        }
      }else if($('#teacher_name').val() === ''){
        toastr.warning('Please fill Teacher Name correctly.');
        return;
      }else if($('#teacher_email').val() === ''){
        toastr.warning('Please fill Teacher Email correctly.');
        return;
      }else if($('#student_name').val() === ''){
        toastr.warning('Please fill Student Name correctly.');
        return;
      }else if($('#student_email').val() === ''){
        toastr.warning('Please fill Student Email correctly.');
        return;
      }else if($('#student_address').val() === ''){
        toastr.warning('Please fill Student Address correctly.');
        return;
      }else if($('#student_mobile_no').val() === ''){
        toastr.warning('Please fill Student Mobile Number correctly.');
        return;
      }else if($('#student_birthday').val() === ''){
        toastr.warning('Please fill Student Birthday correctly.');
        return;
      }else if($('#composer').val() === ''){
        toastr.warning('Please fill Composer correctly.');
        return;
      }else if($('#title').val() === ''){
        toastr.warning('Please fill Title correctly.');
        return;
      }else if($('#student_time').val() === ''){
        toastr.warning('Please fill Student Time correctly.');
        return;
      }else if($('#student_birthday').val().split('-')[0] > 2050 || $('#student_birthday').val().split('-')[0] < 1950){
        toastr.warning('Please type the correct date in Birthday field.');
        return;
      }
      
    });
    $('#btn_confirm').click(function(){
      var audition_id = $('#audition_id').val()
      window.location.href = '<?= site_url(); ?>admin/applyauditions/apply_little_morarts/'+audition_id;
    })
    $('#btn_close').click(function(){
      window.location.href = '<?= site_url(); ?>admin/activeapplication/index';
    })

    $('#special_request').change(function() {
      if(this.checked){
        $('#special_section').show()
      }else{
        $('#special_section').hide()
      }
    })
    $('#isonline').change(function() {
      if(this.checked){
        $('#online_video_section').show()
      }else{
        $('#online_video_section').hide()
      }
    })
    $("input[name='performance_type']").click(function(){
      if($('#solo').is(':checked')){
        $('#solo_section').hide()
        $('#duo_section').hide()
        $('#trio_section').hide()
        // $('#quartet_section').hide()
        $('#ensemble_section').hide()
      }else if($('#duet').is(':checked')){
        $('#solo_section').show()
        $('#duo_section').hide()
        $('#trio_section').hide()
        // $('#quartet_section').hide()
        $('#ensemble_section').hide()
      }else if($('#trio').is(':checked')){
        $('#solo_section').show()
        $('#duo_section').show()
        $('#trio_section').hide()
        // $('#quartet_section').hide()
        $('#ensemble_section').hide()
      }else if($('#ensemble').is(':checked')){
        $('#solo_section').show()
        $('#duo_section').show()
        $('#trio_section').show()
        // $('#quartet_section').show()
        $('#ensemble_section').hide()
      }
    })
    
    $("input[name='payment_type']").click(function(){
      if($('#paypal').is(':checked')){
        $('#paypal_section').show()
        $('#order_section').hide()
      }else{
        $('#paypal_section').hide()
        $('#order_section').show()
      }
    })
    $('select').on('change', function(){
      if($('#instrument').val() == 31){
        $('#instrument_section').show()
      }else{
        $('#instrument_section').hide()
      }
      if($('#co_instrument').val() == 31){
        $('#co_instrument_section').show()
      }else{
        $('#co_instrument_section').hide()
      }
      if($('#instrument2').val() == 31){
        $('#instrument_section2').show()
      }else{
        $('#instrument_section2').hide()
      }
      if($('#co_instrument2').val() == 31){
        $('#co_instrument_section2').show()
      }else{
        $('#co_instrument_section2').hide()
      }
      if($('#instrument3').val() == 31){
        $('#instrument_section3').show()
      }else{
        $('#instrument_section3').hide()
      }
      if($('#co_instrument3').val() == 31){
        $('#co_instrument_section3').show()
      }else{
        $('#co_instrument_section3').hide()
      }
      if($('#instrument4').val() == 31){
        $('#instrument_section4').show()
      }else{
        $('#instrument_section4').hide()
      }
      if($('#co_instrument4').val() == 31){
        $('#co_instrument_section4').show()
      }else{
        $('#co_instrument_section4').hide()
      }
      
    })
    $(document).on('change','#extra_section select', function() {
      if($('#co_instrument'+inx).val() == 31){
        $('#co_instrument_section'+inx).show()
      }else{
        $('#co_instrument_section'+inx).hide()
      }
    });

    $('#add_more').click(function(){
      inx++;
      if(inx >= 4){
        var element = '<div class="row">'+
                        '<div class="col-12 col-md-6">'+
                          '<div class="form-group flex-group mb-2">'+
                            '<label class="title mr-2">Co_performers'+inx+':</label>'+
                            '<input type="text" class="form-control form-control-sm" name="co_performers'+inx+'" id="co_performers'+inx+'">'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-12 col-md-4">'+
                          '<div class="form-group flex-group mb-2">'+
                            '<label class="title mr-2">Instrument'+inx+':</label>'+
                            '<select class="form-control" name="co_instrument'+inx+'" id="co_instrument'+inx+'">'+
                              '<?php
                                foreach($instruments as $instrument):
                              ?>'+
                                '<option value="<?= $instrument['id']; ?>"><?= $instrument['name'] ?></option>'+
                              '<?php endforeach; ?>'+
                            '</select>'+
                          '</div>'+
                        '</div>'+
                        '<div id="co_instrument_section'+inx+'" style="display: none; width: 40%;">'+
                          '<div class="col-12 col-md-12">'+
                            '<div class="form-group flex-group mb-2">'+
                              '<label class="title mr-2">Other Instrument'+inx+':</label>'+
                              '<input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument'+inx+'" id="co_other_instrument'+inx+'">'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>'
        $('#extra_section').append(element)
        $('#inx').val(inx)
      }
      
    })

    // var deadline = new Date($('#audition_deadline').val());
    // var current_date = new Date();
    // if((deadline - current_date) < 0){

    // }
  });
</script>