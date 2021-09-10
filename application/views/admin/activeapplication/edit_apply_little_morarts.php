<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="offset-1 col-md-10">
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
                          <input type="hidden" name="apply_id" id="apply_id" value="<?= $apply_id; ?>">
                          <label class="title mr-2">Audition Center:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_name" id="audition_name" value="<?= $little_morart[0]['audition_name']; ?>">
                          <input type="hidden" name="audition_id" id="audition_id" value="<?= $little_morart[0]['id']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Available for Application:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" readonly class="form-control form-control-sm" name="audition_status" id="audition_status" value="<?= $little_morart[0]['is_active'] ? 'Open' : 'Close'; ?>">
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
                          <label class="title mr-2">Application Deadline</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="date" readonly class="form-control form-control-sm" name="audition_deadline" id="audition_deadline" value="<?= $little_morart[0]['audition_deadline']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Audition Fee</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="number" readonly class="form-control form-control-sm" name="late_fee" id="late_fee" value="<?= $little_morart[0]['late_fee']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-12">
                        <div class="form-group mb-2">
                          <!-- <label>Special Request:</label> -->
                          <input type="checkbox" name="isonline" id="isonline" <?php if($little_morart[0]['isonline'] == 1) { echo "checked"; } ?>> Online Video
                        </div>
                      </div>
                    </div>
                    <div id="online_video_section">
                      <div class="row">
                        <div class="col-12 col-md-3">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Video link:</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-9">
                          <div class="form-group flex-group mb-2">
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="video_link" id="video_link">
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
                          <input type="checkbox" name="special_request" id="special_request" <?php if($little_morart[0]['special_request'] == 1) { echo "checked"; } ?>> Do you have a special request?
                        </div>
                      </div>
                    </div>
                    <div id="special_section">
                      <div class="row">
                        <div class="col-12 col-md-3">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Request Date:</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-9">
                          <div class="form-group flex-group mb-2">
                            <input style="width: 20%;" readonly type="date" class="form-control form-control-sm" name="request_date" id="request_date" value="<?= $little_morart[0]['audition_date'] ?>">
                            <label class="title mr-2 mt-1 ml-3">Time</label>
                            <select style="width: 30%;" class="form-control" name="request_time" id="request_time">
                              <option value="1" <?php if($little_morart[0]['request_time'] == 1) { echo "selected"; } ?>>Between 9:00 AM and 1:00PM</option>
                              <option value="2" <?php if($little_morart[0]['request_time'] == 2) { echo "selected"; } ?>>After 2:00 PM</option>
                            </select>
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="."></i>
                           <!--  <input style="width: 20%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm ml-3" name="request_hour" id="request_hour" value="<?= explode('-', $little_morart[0]['request_time'])[0]; ?>">
                            <label class="title mr-2 mt-1">hour</label>
                            <input style="width: 20%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm ml-3" name="request_minute" id="request_minute" value="<?= explode('-', $little_morart[0]['request_time'])[1]; ?>">
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
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="request_reason" id="request_reason" value="<?= $little_morart[0]['request_reason'] ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" value="<?= $little_morart[0]['teacher']; ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_email" id="teacher_email" value="<?= $little_morart[0]['teacher_email']; ?>">
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
                              <option value="<?= $country['id']; ?>" <?php if($little_morart[0]['teacher_country_id'] == $country['id']) { echo "selected"; } ?>><?= $country['name'] ?></option>
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" value="<?= $little_morart[0]['teacher_address']; ?>">
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
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="teacher_mobile_no" id="teacher_mobile_no" value="<?= $little_morart[0]['teacher_mobile']; ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_name" id="student_name" value="<?= $little_morart[0]['student_name']; ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_email" id="student_email" value="<?= $little_morart[0]['student_email']; ?>">
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
                              <option value="<?= $country['id']; ?>" <?php if($little_morart[0]['country_id'] == $country['id']) { echo "selected"; } ?>><?= $country['name'] ?></option>
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_address" id="student_address" value="<?= $little_morart[0]['address']; ?>">
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
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="student_mobile_no" id="student_mobile_no" value="<?= $little_morart[0]['mobile_no']; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student mobile no."></i>
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
                          <input style="width: 65%;" type="date" class="form-control form-control-sm" name="student_birthday" id="student_birthday" value="<?= $little_morart[0]['birthday']; ?>" min="1950-01-01" max="2050-12-31">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the student birthday."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Student Age:</label>
                        </div>
                      </div>.
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="number" class="form-control form-control-sm" name="student_age" id="student_age" value="<?= $crescendo[0]['student_age']; ?>">
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
                          <input style="width: 65%;" type="number" min="0" max="20" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="studying_year" id="studying_year" value="<?= $little_morart[0]['studying_year']; ?>">
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
                            <option value="1" <?php if($little_morart[0]['level'] == 1) { echo "selected"; } ?>>Intermediate</option>
                            <option value="2" <?php if($little_morart[0]['level'] == 2) { echo "selected"; } ?>>Junior</option>
                            <option value="3" <?php if($little_morart[0]['level'] == 3) { echo "selected"; } ?>>Advance</option>
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
                              <option value="<?= $instrument['id']; ?>" <?php if($little_morart[0]['instrument'] == $instrument['id']) { echo "selected"; } ?> ><?= $instrument['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div id="instrument_section">
                      <div class="row">
                        <div class="col-12 col-md-3">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Other Instrument:</label>
                          </div>
                        </div>
                        <div class="col-12 col-md-9">
                          <div class="form-group flex-group mb-2">
                            <input style="width: 65%" type="text" class="form-control form-control-sm" name="other_instrument" id="other_instrument" value="<?= $little_morart[0]['other_instrument']; ?>">
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
                              <input type="radio" name="performance_type" id="solo" value="1" <?php if($little_morart[0]['performance_type'] == 1) { echo "checked"; } ?> >
                              Solo (USD <?= $little_morart[0]['fee_solo'] ?>)
                              <input type="hidden" name="solo_price" id="solo_price" value="<?= $little_morart[0]['fee_solo']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="duet" value="2" <?php if($little_morart[0]['performance_type'] == 2) { echo "checked"; } ?>>
                              Duet (USD <?= $little_morart[0]['fee_duet'] ?>)
                              <input type="hidden" name="duet_price" id="duet_price" value="<?= $little_morart[0]['fee_duet']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="trio" value="3" <?php if($little_morart[0]['performance_type'] == 3) { echo "checked"; } ?>>
                              Trio (USD <?= $little_morart[0]['fee_trio'] ?>)
                              <input type="hidden" name="trio_price" id="trio_price" value="<?= $little_morart[0]['fee_trio']; ?>">
                          </label>
                          <!-- <label>
                              <input type="radio" name="performance_type" id="quartet" value="4" <?php if($little_morart[0]['performance_type'] == 4) { echo "checked"; } ?>>
                              Quartet (USD <?= $little_morart[0]['fee_quartet'] ?>)
                              <input type="hidden" name="quartet_price" id="quartet_price" value="<?= $little_morart[0]['fee_quartet']; ?>">
                          </label> -->
                          <label>
                              <input type="radio" name="performance_type" id="ensemble" value="4" <?php if($little_morart[0]['performance_type'] == 4) { echo "checked"; } ?>>
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
                            <input type="text" class="form-control form-control-sm" name="co_performers" id="co_performers" value="<?= $little_morart[0]['co_performers']; ?>">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument1:</label>
                            <select class="form-control" name="co_instrument" id="co_instrument">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>" <?php if($little_morart[0]['co_instrument'] == $instrument['id']) { echo "selected"; } ?> ><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument1:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument" id="co_other_instrument" value="<?= $little_morart[0]['co_other_instrument']; ?>">
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
                            <input type="text" class="form-control form-control-sm" name="co_performers2" id="co_performers2" value="<?= $little_morart[0]['co_performers2']; ?>">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument2:</label>
                            <select class="form-control" name="co_instrument2" id="co_instrument2">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>" <?php if($little_morart[0]['co_instrument2'] == $instrument['id']) { echo "selected"; } ?> ><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section2" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument2:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument2" id="co_other_instrument2" value="<?= $little_morart[0]['co_other_instrument2']; ?>">
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
                            <input type="text" class="form-control form-control-sm" name="co_performers3" id="co_performers3" value="<?= $little_morart[0]['co_performers3']; ?>">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument3:</label>
                            <select class="form-control" name="co_instrument3" id="co_instrument3">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>" <?php if($little_morart[0]['co_instrument3'] == $instrument['id']) { echo "selected"; } ?> ><?= $instrument['name'] ?></option>
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
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument3" id="co_other_instrument3" value="<?= $little_morart[0]['co_other_instrument3']; ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="exist_section"></div>
                      <div id="extra_section"></div>
                      <input type="hidden" name="co_extra_data" id="co_extra_data" value="<?= $co_extra_data; ?>">
                    </div>
<!--                     <div id="quartet_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers4" id="co_performers4" value="<?= $little_morart[0]['co_performers']; ?>">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument:</label>
                            <select class="form-control" name="co_instrument4" id="co_instrument4">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>" <?php if($little_morart[0]['co_instrument'] == $instrument['id']) { echo "selected"; } ?> ><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section4" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument4" id="co_other_instrument4" value="<?= $little_morart[0]['co_other_instrument']; ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="ensemble_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers5" id="co_performers5" value="<?= $little_morart[0]['co_performers']; ?>">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument:</label>
                            <select class="form-control" name="co_instrument5" id="co_instrument5">
                              <?php
                                foreach($instruments as $instrument):
                              ?>
                                <option value="<?= $instrument['id']; ?>" <?php if($little_morart[0]['co_instrument'] == $instrument['id']) { echo "selected"; } ?> ><?= $instrument['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div id="co_instrument_section5" style="display: none; width: 40%;">
                          <div class="col-12 col-md-12">
                            <div class="form-group flex-group mb-2">
                              <label class="title mr-2">Other Instrument:</label>
                              <input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument5" id="co_other_instrument5" value="<?= $little_morart[0]['co_other_instrument']; ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
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
                          <label class="title mr-2">Teacher:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" value="<?= $little_morart[0]['teacher']; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher name."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Teacher Email:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_email" id="teacher_email" value="<?= $little_morart[0]['teacher_email']; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the teacher email."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Country:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <select style="width: 65%;" class="form-control" name="teacher_country_id" id="teacher_country_id">
                            <?php
                              foreach($countries as $country):
                            ?>
                              <option value="<?= $country['id']; ?>" <?php if($little_morart[0]['teacher_country_id'] == $country['id']) { echo "selected"; } ?>><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Address:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" value="<?= $little_morart[0]['teacher_address']; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Mobile Number:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="teacher_mobile_no" id="teacher_mobile_no" value="<?= $little_morart[0]['teacher_mobile']; ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="composer" id="composer" value="<?= $little_morart[0]['composer']; ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="title" id="title" value="<?= $little_morart[0]['title']; ?>">
                          <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Music title."></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2"><i style="color: red;">*</i>Duration(in minutes):</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <div style="display: flex; align-items: center; width: 65%;">
                            <input type="number" readonly class="form-control form-control-sm mr-1" name="student_time" id="student_time" value="<?= $little_morart[0]['duration']; ?>">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter accurate time of piece as this will be the allotted time allowed."></i>
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
                              <input type="radio" name="payment_type" id="paypal" value="1" <?php if($little_morart[0]['payment_type'] == 1) { echo "checked"; } ?> >
                              Paypal
                          </label>
                          <label>
                              <input type="radio" name="payment_type" id="order_check" value="2" <?php if($little_morart[0]['payment_type'] == 2) { echo "checked"; } ?> >
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
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="transaction_id" id="transaction_id" value="<?= $little_morart[0]['transaction_id']; ?>">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the transaction ID."></i>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Transaction Date:</label>
                            <input style="width: 65%;" type="date" class="form-control form-control-sm" name="transaction_date" id="transaction_date" value="<?= $little_morart[0]['transaction_date']; ?>" min="1950-01-01" max="<?= date('Y-m-d'); ?>">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the transaction date."></i>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Paid Amount:</label>
                            <input style="width: 65%;" type="number" class="form-control form-control-sm" name="paid_amount" id="paid_amount" value="<?= $little_morart[0]['paid_amount']; ?>">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Paid Amount."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="order_section">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Paid Amount:</label>
                            <input style="width: 65%;" type="number" class="form-control form-control-sm" name="order_paid_amount" id="order_paid_amount" value="<?= $little_morart[0]['paid_amount']; ?>">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the Paid Amount."></i>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Payment Code:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="payment_code" id="payment_code" value="<?= $little_morart[0]['payment_code']; ?>">
                            <i class="fa fa-info-circle pt-2" aria-hidden="true" data-toggle="tooltip" title="Enter the payment code."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>            
                  <div class="row">
                    <input type="hidden" name="inx" id="inx">
                    <div class="col-12 col-md-6">
                      <div class="form-group flex-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_little_morarts px-4 py-2" style="background: #EEA400; border: none; border-radius: 16px; width: 100%;" value="Submit">
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-group flex-group mt-4">
                        <a type="button" style="border: none; border-radius: 16px; width: 100%;" class="btn btn-sm btn-danger cancel px-4 py-2" id="cancel" href="<?= site_url(); ?>admin/activeapplication/index">Cancel</a>
                      </div>
                    </div>
                  </div>
                <!-- </div> -->
              </form>
            <!-- </div> -->
        </div>    
      </div><!--/ row --> 

    </section>  
</div>

<script type="text/javascript">
  $(document).ready(function() {
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

    if($('#paypal').is(':checked')){
      $('#paypal_section').show()
      $('#order_section').hide()
    }else{
      $('#paypal_section').hide()
      $('#order_section').show()
    }

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

    if($('#special_request').is(':checked')){
      $('#special_section').show()
    }else{
      $('#special_section').hide()
    }

    if($('#isonline').is(':checked')){
      $('#online_video_section').show()
    }else{
      $('#online_video_section').hide()
    }

    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#teacher_name').val() && $('#teacher_email').val() && $('#student_name').val() && $('#student_email').val() && $('#student_address').val() && $('#student_mobile_no').val() && $('#student_birthday').val() && $('#student_birthday').val().split('-')[0] < 2050 && $('#student_birthday').val().split('-')[0] > 1950 && $('#composer').val() && $('#title').val() && $('#student_time').val()){
        if($('#paypal').is(':checked') && ($('#transaction_date').val().split('-')[0] < 1950 || $('#transaction_date').val().split('-')[0] > 2050)){
          toastr.warning('Please fill the correct date in Transaction Date Field.');
          return;
        }else{
          var formData = new FormData(this);
          $.ajax({
            url: '<?= site_url(); ?>admin/activeapplication/update_little_morarts_application',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
              var result = JSON.parse(response);
              if(!result || result == 0){
                toastr.warning('Saving the data is failed.');
              }else{
                toastr.success('The data is saved successfully.');
                setTimeout(function(){
                  window.location.href = '<?= site_url(); ?>admin/activeapplication/index';
                }, 600);
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
    var inx = 3;
    var co_extra_data = $('#co_extra_data').val()
    if(co_extra_data != ''){
      var co_extra_data_arr = JSON.parse(co_extra_data)
      $('#inx').val(co_extra_data_arr.length+inx)
      console.log(co_extra_data_arr)
      for(var i = 0; i < co_extra_data_arr.length; i++){
        inx++;
        var html = '<div class="row">'+
                      '<div class="col-12 col-md-6">'+
                        '<div class="form-group flex-group mb-2">'+
                          '<label class="title mr-2">Co_performers'+inx+':</label>'+
                          '<input type="text" class="form-control form-control-sm" name="co_performers'+inx+'" id="co_performers'+inx+'" value="'+co_extra_data_arr[i]['co_performer']+'">'+
                        '</div>'+
                      '</div>'+
                      '<div class="col-12 col-md-4">'+
                        '<div class="form-group flex-group mb-2">'+
                          '<label class="title mr-2">Instrument'+inx+':</label>'+
                          '<select class="form-control" name="co_instrument'+inx+'" id="co_instrument'+inx+'">'+
                            '<?php
                              foreach($instruments as $instrument):
                            ?>'+
                              '<option value="<?= $instrument['id']; ?>" <?php if($co_extra_data[i]['co_instrument'] == $instrument['id']) { echo "selected"; } ?>><?= $instrument['name'] ?></option>'+
                            '<?php endforeach; ?>'+
                          '</select>'+
                        '</div>'+
                      '</div>'+
                      '<div id="co_instrument_section'+inx+'" style="display: none; width: 40%;">'+
                        '<div class="col-12 col-md-12">'+
                          '<div class="form-group flex-group mb-2">'+
                            '<label class="title mr-2">Other Instrument'+inx+':</label>'+
                            '<input style="width: 50%;" type="text" class="form-control form-control-sm" name="co_other_instrument'+inx+'" id="co_other_instrument'+inx+'" value="'+co_extra_data_arr[i]['co_other_instrument']+'">'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'
        $('#extra_section').append(html)
      }
    }
    
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