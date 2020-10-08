
<div class="container-fluid">
	<div class="row row-deck row-cards">
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-icon-dashboard">
					      <i class="fa fa-user text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Name</p>				
								<h2><?= $leads->lead_name; ?> </h2>              
							</div> 
					      </div>
					  </div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-email-dashboard">
					      <i class="fa fa-envelope text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Email</p>				
								<h2><?= $leads->lead_email; ?>    </h2>              
							</div> 
					      </div>
					  </div>
					</div>
					
				</div>
				
			</div>
		</div>
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-phone-dashboard">
					      <i class="fa fa-mobile-phone text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Phone</p>				
								<h2><?= $leads->lead_phone; ?>  </h2>              
							</div> 
					      </div>
					  </div>
					</div>
					
				</div>
				
			</div>
		</div>
		<div class="col-sm-6 col-lg-3">
			<div class="card">
				<div class="card-body p-0 text-center">
					<div class="row no-gutters pl-2">
						<div class="col-md-4 user-Cell-dashboard">
					      <i class="fa fa-phone text-white"></i>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body p-0">
					      	<div class="  user-name-dashboard">	
					      	<p class="mb-0">Cell</p>				
								<h2><?= $leads->lead_mobile; ?>   </h2>              
							</div> 
					      </div>
					  </div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
</div>

<div class="" id="" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="" role="document">
      <div class="card">
			<div class="card-header">
				<h5 class="card-title">Lead Details</h5>				
			</div>       					 
			<div class="card-body">
				<div class="row">
					<div class="col-12" id="massSms">
							<ul class="nav nav-tabs " data-toggle="tabs">
								<li class="nav-item">
									<a href="#lead" class="nav-link <?= (empty($appointment->subject) ? 'active show' : '')?>" data-toggle="tab">
										1. Lead Details
									</a>
								</li>
								<li class="nav-item">
									<a href="#add" class="nav-link <?= (!empty($appointment->subject) ? 'active show' : '')?>" data-toggle="tab">
										2. Add Appointment
									</a>
								</li>
								<li class="nav-item">
									<a href="#show" class="nav-link" data-toggle="tab">
										3. Show Appointment
									</a>
								</li>
							</ul>
						<div class="tab-content">
							<div class="tab-pane card <?= (empty($appointment->subject) ? 'active show' : '')?>" id="lead">
								<div class="row col-md-11  pl-md-4 user-details">
									<div class="col-md-12 "><h2><?= $leads->lead_name; ?></h2></div>
										<div class="col-md-3 user-title">Lead Name : </div>
										<div class="col-md-7 "><?= $leads->lead_name; ?></div>
										<div class="col-md-3 user-title">Lead Source :</div>
										<div class="col-md-7"><span class="badge badge-light"> <?= $leads->lead_source->source_name; ?></span></div>
										<div class="col-md-3 user-title">Lead Status :</div>
										<div class="col-md-4 user-title"><span id="lead-status-id"> <?= $leads->lead_status->status_name; ?></span></div>
										<div class="col-md-3 user-title">
											<select id="leadstatus" class="form-control bg-primary text-white">
														<option class="bg-white text-dark">Change Status</option>
														<?php foreach ($leadstatus as $leadstatus): ?>
														<option class="bg-white text-dark" value="<?= $leadstatus->id; ?>"  data-id="<?= $leadstatus->status_name; ?>"  data-value="<?= $leads->id; ?>"> <?= $leadstatus->status_name; ?></option>
														</li>
														<?php endforeach; ?>
													</select>
										</div>
										<div class="col-md-3 user-title">Phone :</div>
										<div class="col-md-7 "><?= $leads->lead_phone; ?></div>
										<div class="col-md-3 user-title">Address :</div>
										<div class="col-md-7 "><?= $leads->address; ?></div>
										<div class="col-md-3 user-title">State : </div>
										<div class="col-md-7 "><?= $leads->state_id; ?></div>
										<div class="col-md-3 user-title">Contact Name  :</div>
										<div class="col-md-7 "><?= $leads->lead_contact_name; ?></div>
										<div class="col-md-3 user-title">Email  : </div>
										<div class="col-md-7 "><?= $leads->lead_email; ?></div>
										<div class="col-md-3 user-title">Mobile :</div>
										<div class="col-md-7 ">  <?= $leads->lead_mobile; ?></div>
										<div class="col-md-3 user-title">City : </div>
										<div class="col-md-7 "> <?= $leads->lead_city; ?></div>
								</div>
							</div>
							<div class="tab-pane <?= (!empty($appointment->subject) ? 'active show' : '')?>" id="add">
								<div class="row mt-4">
									<div class="col-md-12">	
										<?= $this->Form->Create($appointment, [ 'id'=>'addappointment']) ?>
										<div class="col-md-12 col-xl-12">
											<div class="row">
												<div class="col-md-12 col-xl-12">
													<div class="mb-3">
														<label class="form-label">Appointment Subject </label>
														<?= $this->Form->control('subject', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Appointment Subject']) ?>
													</div>
												</div>
												<div class="col-md-4 col-xl-4">
													<div class="mb-3">
														<label class="form-label">Start Date</label>
														<div class="input-group date" id="start">
															<input class="form-control ignore start" name="start_date" required="true" id="start_date" value="<?= (!empty($appointment->start_date) ? date('m/d/Y h-i A', strtotime($appointment->start_date)) : '') ?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
														</div>
													</div>
												</div>
												<div class="col-md-4 col-xl-4">
													<div class="mb-3">
														<label class="form-label">End Date</label>
														<div class="input-group date" id="end">
															<input class="form-control ignore" name="end_date" id="end_date" value="<?= (!empty($appointment->end_date) ? date('m/d/Y h-i A', strtotime($appointment->end_date)) : '') ?>"/><span class="input-group-append input-group-addon"><span class="input-group-text"><i class="fa fa-calendar my-1"></i></span></span>
														</div>
													</div>
												</div>
												<div class="col-md-4 col-xl-4">
													<div class="mb-3">
														<label class="form-label">Appointment Setter</label>
														<?= $this->Form->control('user_id', ['options' => 
														$userprofiles, 'label' => false, 'class'=> 'form-control']) ?>
													</div>
												</div>
												<div class="col-md-4 col-xl-4">
													<div class="mb-3">
														<label class="form-label">Location</label>
														<?= $this->Form->select('location',[
																'Office'=>'Office', 'Phone/Web' => 'Phone/Web' ], [ 'label' => false, 'class'=> 'form-control']) ?>
													</div>
												</div>
												<div class="col-md-8 col-xl-8">
													<div class="mb-3">
														<label class="form-label">Description</label>
														<?= $this->Form->control('description', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Description']) ?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-primary ">Save</button>
											<button type="button" class="btn btn-link">Cancel</button>
										</div>										  
										<?= $this->Form->end(); ?> 
									</div>
								</div>
							</div>
							<div class="tab-pane card" id="show">
								<div class="table-responsive ">
									<table class="table table-vcenter card-table" id="user-add-Board">
										<thead>
											<tr>
												<th scope="col">Sr. Num</th>
												<th scope="col">
													<?= $this->Paginator->sort('Subject') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Start Date') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('End Date') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Appointment Setter') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Location') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Created') ?>
												</th>
												<th scope="col">
													<?= $this->Paginator->sort('Status') ?>
												</th>
												<th scope="col" class="actions">
													<?= __('Actions') ?>
												</th>
											</tr>
										</thead>
										<tbody>										  
											<?php $i=$this->Paginator->counter('{{start}}'); foreach ($appointments as $appointment): ?>
											<tr>
												<td><?= $i ?></td>
												<td><?= h($appointment->subject) ?></td>
												<td><?= h($appointment->start_date) ?></td>
												<td><?= h($appointment->end_date) ?></td>
												<td><?= $appointment->has('user') ? $appointment->user->user_profile->first_name : '' ?></td>
												<td><?= h($appointment->location) ?></td>
												<td><?= h($appointment->created) ?></td>
												<td class="appointment-status-id">
													<?= $appointment->appointment_status->status_name; ?>
												</td>
												<td class="text-muted">	
													<select class="appointmentstatus" class="form-control bg-primary text-white">
														<option class="bg-white text-dark">Change Status</option>
															<?php foreach ($appointmentstatus as $val): ?>
															<option class="bg-white text-dark" data-id="<?= $appointment->id ?>" value="<?= $val->id; ?>"> <?= $val->status_name; ?></option>
															<?php endforeach; ?>
													</select>
													<?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'add', base64_encode($leads->id), $appointment->id], ['escape' => false, 'title' => __('Edit')]) ?>						
													<?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $appointment->id, $leads->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $appointment->id),'title' => __('Delete')]) ?>						 
												</td>
											</tr>
											<?php $i++; endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
         
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#leadstatus").on("change",function() {
        var leadstatus = $(this).val();
		var id = $('option:selected',this).data("value");
		var leadstatusname = $('option:selected',this).data("id");
		
		$.ajax({
            type: "POST", 
            url: '<?php echo $this->Url->build(["controller" => "appointments", "action" => "change-status"]) ?>', 
            data: {"leadstatus": leadstatus , "id": id}, 
            success: function(){
				//alert('Lead Status Changed');
				$('#lead-status-id').html(leadstatusname);
				swal("Success!", "Lead Status has been Changed!", "success")
				 
			  },
			  error: function(){
				alert('Error!!');
			  }
		});
    }); 
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(".appointmentstatus").on("change",function() {
        var statusid = $(this).val();
		var $this = $(this);
		var statusname = $(this).children('option:selected').text();
		var appointmentid = $('option:selected',this).data("id");
		$.ajax({
            type: "POST", 
            url: '<?php echo $this->Url->build(["controller" => "appointments", "action" => "change-appointment-status"]) ?>', 
            data: {"statusid": statusid , "statusname": statusname, "appointmentid": appointmentid}, 
            success: function(){
				//alert('Appointment Status Changed');
				//$('#appointment-status-id').html(statusname);
				$this.parent().prev("td").text(statusname);
				$('#lead-status-id').html(statusname);
				swal("Success!", "Appointment Status has been Changed!", "success")
				 
			  },
			  error: function(){
				alert('Error!!');
			  }
		});
    }); 
});
</script>
<script type="text/javascript">
    $(function () {
	    $("#start").datetimepicker({
	        useCurrent: false,
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          today: 'todaystart'		 
	        }
	    });
		
	    $("#end").datetimepicker({
	        useCurrent: false,
	        showTodayButton: true,
	        icons: {
	          next: "fa fa-chevron-right",
	          previous: "fa fa-chevron-left",
	          today: 'todayend',
	        }
	    });
		
		$("#start").on("dp.change", function (e) {
			var momentDate = moment(e.date);
			var improvedDate = moment(e.date).add(1,"hour");  
			var improvedDateForDP = improvedDate.format("MM/DD/YYYY hh:mm:ss A");
			$('#end').data("DateTimePicker").date(improvedDate);
		 });
		 
        var $form = $("#addappointment");
   		$form.validate( {
		rules: {					
			
			subject: {
				required:true
			},
			start_date:{
				required:true
			},
			description:{
				required:true
			}
		},
		messages:{					
			subject: {
				required:"Please Enter Subject"
			},
			start_date:{
				required:"Please Enter Start Date"
			},
			description:{
				required:"Please Enter Description"
			}		
		}	
		});

		
    });
</script>
<style>
.todaystart:before {
    content: "Today";
}
.todayend:before {
    content: "Today";
}
</style>