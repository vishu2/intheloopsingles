<?php /* <div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->
      <h2 class="page-title">
        Employees
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ml-auto d-print-none">
      
      <a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'employees', 'action'=> 'add'])?>">Add</a>
  <a class="btn btn-primary ml-3 d-sm-none btn-icon" href="<?= $this->Url->build(['controller'=>'employees', 'action'=> 'add'])?>">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z"></path>
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
  </a>
  <!--<a href="#" class="btn btn-primary ml-3 d-none d-sm-inline-block" data-toggle="modal" data-target="#modal-report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Create new report
      </a>
      <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>--></div>
  </div>
  </div> */ ?>

  <div class="row">
    <div class="col-12">
      <?= $this->Form->Create($employee, ['id'=> 'addEmployeeForm', 'class'=>'card']) ?>
        <div class="card-header">
          <h4 class="card-title"><?= __('Add Employee') ?></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <?= $this->Form->control('name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter name']) ?>
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Rating</label>
                
                <span class="user-rating" id="user-rating">
                  <input type="radio" name="rating" value="5"><span class="star"></span>

                  <input type="radio" name="rating" value="4"><span class="star"></span>

                  <input type="radio" name="rating" value="3"><span class="star"></span>

                  <input type="radio" name="rating" value="2"><span class="star"></span>

                  <input type="radio" name="rating" value="1"><span class="star"></span>
                </span>
                <?php echo $this->Form->hidden('rating', ['id' => 'selected-rating', 'class' => 'selected-rating']) ?>

              </div>
            </div>


            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Award</label>
                <?= $this->Form->select('award_id', $awards, ['label' => false, 'class'=> 'form-select']) ?>
              </div>
            </div>


            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Date Commenced</label>
                <?= $this->Form->control('start_date', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Select a date', 'id' => 'calender_sd']) ?>
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">State</label>
                <?= $this->Form->select('state_id', $states, ['label' => false, 'class'=> 'form-select']) ?>
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Default Employment</label>
                <?= $this->Form->select('rate_id', $rates, ['label' => false, 'class'=> 'form-select']) ?>
              </div>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-4">
              <div class="mb-3">
                <label class="form-label">Notes</label>
                <?= $this->Form->control('notes', ['label' => false, 'class'=> 'form-control']) ?>
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="mb-3">
                  <hr/>
                </div>
            </div>

            <h2>Clients</h2>
            <div class="col-md-6 col-lg-6 col-xl-4">
              <div class="mb-3">
                <input type="text" name="clients" class="form-control" placeholder="Enter Clients"  id="clients">
                  <input type="hidden" name="clients-id-hidden" id="clients-id-hidden">
              </div>

              <div class="box">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped" id='clients-data'>
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="mb-3">
                  <hr/>
                </div>
            </div>

            <h2>Locations</h2>
            <div class="col-md-6 col-lg-6 col-xl-4">
              <div class="mb-3">
                <input type="text" name="locations" class="form-control" placeholder="Enter job type"  id="locations">
                  <input type="hidden" name="locations-id-hidden" id="locations-id-hidden">
              </div>

              <div class="box">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped" id='locations-data'>
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="mb-3">
                  <hr/>
                </div>
            </div>

            <h2>Job Allowed</h2>
            <div class="col-md-6 col-lg-6 col-xl-4">
              <div class="mb-3">
                <input type="text" name="job-allowed" class="form-control" placeholder="Enter job type"  id="job-allowed">
                  <input type="hidden" name="job-allowed-id-hidden" id="job-allowed-id-hidden">
              </div>

              <div class="box">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped" id='job-allowed-data'>
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="mb-3">
                  <hr/>
                </div>
            </div>

            <h2>Travel With</h2>
            <div class="col-md-6 col-lg-6 col-xl-4">
              <div class="mb-3">
                <input type="text" name="travel-with" class="form-control" placeholder="Enter Travel with"  id="travel-with">
                  <input type="hidden" name="travel-with-id-hidden" id="travel-with-id-hidden">
              </div>

              <div class="box">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped" id='travel-with-data'>
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="card-footer text-right">
          <div class="d-flex"> <a href="#" class="btn btn-link" onclick="history.go(-1);">Cancel</a>
            <button type="submit" class="btn btn-primary ml-auto">Send data</button>
          </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
  </div>

  <!-- Javascript -->
<script>
   $(function() {

      $("#clients").autocomplete({
           source: function(request, response) {

                    var exitingId = $("input[name='clients[_ids][]']").map(function(){return $(this).val();}).get();

                      console.log(exitingId);

                      $.getJSON("ajax-clients", { str: $('#clients').val(),  exitingId : exitingId}, response);
                  },
           minLength: 2,
           select: function (event, ui) {
            console.log(ui.item.value);
                    $("#clients-data tbody").append("<tr data-id="+ui.item.id+"><td data-id='"+ui.item.id+"'>"+ui.item.value+"</td><td data-id="+ui.item.id+" class='delete' style='text-align: right;'>X</td><td style='display:none;'><input type='hidden' name='clients[_ids][]' value='"+ui.item.id+"'></tr>");

                    $("#clients").val("");

                    return false;
                  
                  }
      });

      $("#locations").autocomplete({
           source: function(request, response) {

                    var exitingId = $("input[name='locations[_ids][]']").map(function(){return $(this).val();}).get();

                      console.log(exitingId);

                      $.getJSON("ajax-locations", { str: $('#locations').val(),  exitingId : exitingId}, response);
                  },
           minLength: 2,
           select: function (event, ui) {
            console.log(ui.item.value);
                    $("#locations-data tbody").append("<tr data-id="+ui.item.id+"><td data-id='"+ui.item.id+"'>"+ui.item.value+"</td><td data-id="+ui.item.id+" class='delete' style='text-align: right;'>X</td><td style='display:none;'><input type='hidden' name='locations[_ids][]' value='"+ui.item.id+"'></tr>");

                    $("#locations").val("");

                    return false;
                  
                  }
      });

      $("#job-allowed").autocomplete({
           source: function(request, response) {

                    var exitingId = $("input[name='job_types[_ids][]']").map(function(){return $(this).val();}).get();

                      console.log(exitingId);

                      $.getJSON("ajax-job-allowed", { str: $('#job-allowed').val(),  exitingId : exitingId}, response);
                  },
           minLength: 2,
           select: function (event, ui) {
            console.log(ui.item.value);
                    $("#job-allowed-data tbody").append("<tr data-id="+ui.item.id+"><td data-id='"+ui.item.id+"'>"+ui.item.value+"</td><td data-id="+ui.item.id+" class='delete' style='text-align: right;'>X</td><td style='display:none;'><input type='hidden' name='job_types[_ids][]' value='"+ui.item.id+"'></tr>");

                    $("#job-allowed").val("");

                    return false;
                  
                  }
      });

      $("#travel-with").autocomplete({
           source: function(request, response) {

                    var exitingId = $("input[name='employees_travelwith[]']").map(function(){return $(this).val();}).get();

                      console.log(exitingId);

                      $.getJSON("<?php echo $this->Url->build(["controller" => "employees", "action" => "ajax-travel-with"]) ?>", { str: $('#travel-with').val(),  exitingId : exitingId}, response);
                  },
           minLength: 2,
           select: function (event, ui) {
            console.log(ui.item.value);
                    $("#travel-with-data tbody").append("<tr data-id="+ui.item.id+"><td data-id='"+ui.item.id+"'>"+ui.item.value+"</td><td data-id="+ui.item.id+" class='delete' style='text-align: right;'>X</td><td style='display:none;'><input type='hidden' name='employees_travelwith[]' value='"+ui.item.id+"'></tr>");

                    $("#travel-with").val("");

                    return false;
                  
                  }
      });


      //remove selected tr
      $(document).on('click', '.delete', function(){
        //$("tr[data-id='"+$(this).data("id")+"']").remove();
        $(this).closest("tr").remove();
      });
  });
</script>
