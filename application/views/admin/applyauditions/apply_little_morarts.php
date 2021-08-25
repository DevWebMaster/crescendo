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
                              <select style="width: 30%;" class="form-control" name="request_time" id="request_time">
                                <option value="1">Between 9:00 AM and 1:00PM</option>
                                <option value="2">After 2:00 PM</option>
                              </select>
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
                          <label class="title mr-2">Teacher:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" placeholder="Enter correct full name as it will be shown as it appears on the Programme." value="<?= $role_id != 4 ? $user_info['username'] : ''; ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_email" id="teacher_email" value="<?= $role_id != 4 ? $user_info['email'] : ''; ?>">
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
                              <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Address:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" value="<?= $role_id != 4 ? $user_info['address'] : ''; ?>">
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
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="teacher_mobile_no" id="teacher_mobile_no" value="<?= $role_id != 4 ? $user_info['mobile_no'] : ''; ?>">
                        </div>
                      </div>
                    </div>
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
                          <label class="title mr-2">Student Name:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_name" id="student_name" placeholder="Enter correct full name as it will be shown as it appears on the Programme." value="<?= $role_id == 4 ? $user_info['username'] : ''; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Student Email:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_email" id="student_email" value="<?= $role_id == 4 ? $user_info['email'] : ''; ?>">
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
                          <label class="title mr-2">Address:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="student_address" id="student_address" value="<?= $role_id == 4 ? $user_info['address'] : ''; ?>">
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
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="student_mobile_no" id="student_mobile_no" value="<?= $role_id == 4 ? $user_info['mobile_no'] : ''; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Student Birthday:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="date" min="1950-01-01" max="2050-12-31" class="form-control form-control-sm" name="student_birthday" id="student_birthday">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Student Age:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="number" class="form-control form-control-sm" name="student_age" id="student_age">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Years of Study:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="number" min="0" max="20" oninput="validity.valid||(value='');" class="form-control form-control-sm" name="studying_year" id="studying_year">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Level:</label>
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
                          <label class="title mr-2">Instrument:</label>
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
                          <label style="font-weight: bold;">Performance:</label>
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
                          <label>
                              <input type="radio" name="performance_type" id="quartet" value="4">
                              Quartet (USD <?= $little_morart[0]['fee_quartet'] ?>)
                              <input type="hidden" name="quartet_price" id="quartet_price" value="<?= $little_morart[0]['fee_quartet']; ?>">
                          </label>
                          <label>
                              <input type="radio" name="performance_type" id="ensemble" value="5">
                              Ensemble(5 participants) (USD <?= $little_morart[0]['fee_ensemble'] ?>)
                              <input type="hidden" name="ensemble_price" id="ensemble_price" value="<?= $little_morart[0]['fee_ensemble']; ?>">
                          </label>
                        </div>
                      </div>
                    </div>
                    <div id="solo_section" style="display: none;">
                      <div class="row">
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Co_performers:</label>
                            <input type="text" class="form-control form-control-sm" name="co_performers" id="co_performers">
                          </div>
                        </div>
                        <div class="col-12 col-md-4">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Instrument:</label>
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
                              <label class="title mr-2">Other Instrument:</label>
                              <input style="width:  50%;" type="text" class="form-control form-control-sm" name="co_other_instrument" id="co_other_instrument">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
                          <label class="title mr-2">Teacher:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_name" id="teacher_name" placeholder="Enter correct full name as it will be shown as it appears on the Programme." value="<?= $role_id != 4 ? $user_info['username'] : ''; ?>">
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
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_email" id="teacher_email" value="<?= $role_id != 4 ? $user_info['email'] : ''; ?>">
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
                              <option value="<?= $country['id']; ?>"><?= $country['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Address:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="teacher_address" id="teacher_address" value="<?= $role_id != 4 ? $user_info['address'] : ''; ?>">
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
                          <input style="width: 65%;" min="0" oninput="validity.valid||(value='');" type="number" class="form-control form-control-sm" name="teacher_mobile_no" id="teacher_mobile_no" value="<?= $role_id != 4 ? $user_info['mobile_no'] : ''; ?>">
                        </div>
                      </div>
                    </div>
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
                          <label class="title mr-2">Composer:</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="composer" id="composer" placeholder="L.Beethoven">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Title(Op., No., mov., key):</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <input style="width: 65%;" type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Sonata No.8, Op.13, C minor, I mov.">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-md-3">
                        <div class="form-group flex-group mb-2">
                          <label class="title mr-2">Duration(in Minutes):</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-9">
                        <div class="form-group flex-group mb-2">
                          <div style="display: flex; align-items: center; width: 65%;">
                            <input type="number" min="0" oninput="validity.valid||(value='');" class="form-control form-control-sm mr-1" name="student_time" id="student_time">
                            <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" title="'Enter accurate time of piece as this will be the allotted time allowed."></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <legend>Payment:</legend>
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
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Transaction Date:</label>
                            <input style="width: 65%;" type="date" class="form-control form-control-sm" name="transaction_date" id="transaction_date" min="1950-01-01" max="<?= date('Y-m-d'); ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="order_section" style="display: none;">
                      <div class="row">
                        <div class="offset-6 col-12 col-md-6">
                          <div class="form-group flex-group mb-2">
                            <label class="title mr-2">Payment Code:</label>
                            <input style="width: 65%;" type="text" class="form-control form-control-sm" name="payment_code" id="payment_code">
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>  
                  <hr>                
                  <div class="row">
                    <div class="col-12 col-md-12">
                      <div class="form-group flex-group mt-4">
                        <input type="submit" class="btn btn-sm btn-info add_little_morarts px-4 py-2" style="background: #EEA400; border: none; border-radius: 16px; width: 100%;" value="Submit">
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
    $('#uploadForm').submit(function(e) {
      e.preventDefault();
      if($('#teacher_name').val() && $('#teacher_email').val() && $('#teacher_address').val() && $('#teacher_mobile_no').val() && $('#student_name').val() && $('#student_email').val() && $('#student_address').val() && $('#student_mobile_no').val() && $('#student_birthday').val() && $('#student_birthday').val().split('-')[0] < 2050 && $('#student_birthday').val().split('-')[0] > 1950 && $('#composer').val() && $('#title').val() && $('#student_time').val()){
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
      }else if($('#teacher_address').val() === ''){
        toastr.warning('Please fill Teacher Address correctly.');
        return;
      }else if($('#teacher_mobile_no').val() === ''){
        toastr.warning('Please fill Teacher Mobile Number correctly.');
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
      }else{
        $('#solo_section').show()
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
    })

    // var deadline = new Date($('#audition_deadline').val());
    // var current_date = new Date();
    // if((deadline - current_date) < 0){

    // }
  });
</script>