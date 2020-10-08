<div class="page-header">
	<div class="row align-items-center">
		<div class="col-auto">       
			<h2 class="page-title">
				Attendee List
			</h2>
		</div>   
		<div class="col-auto ml-auto d-print-none">        
			<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'travels', 'action'=> 'add'])?>">Add</a>
		</div>
	</div>
</div>
<div class="box">
	<div class="card" style="height:460px;overflow:scroll;">
		<div class="table-responsive">
			<table class="table table-vcenter card-table">
				<thead>
					<tr>
						<th scope="col">Sr. Num</th>
						<th scope="col">
							<?= $this->Paginator->sort('Email') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Full Name') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Age') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Gender') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Phone') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Mobile') ?>
						</th>
						<th scope="col">
							<?= $this->Paginator->sort('Address') ?>
						</th>
					</tr>
				</thead>
				<tbody>
				   <?php $i=1; foreach ($travels->travel_registrations as $travel_user): ?>
					<tr>
						<td>
							<?= $i ?>
						</td>
						<td>
							<?= $travel_user->user->email ?>
						</td>
						<td>
							<?= $travel_user->user->user_profile->first_name.' '.$travel_user->user->user_profile->last_name ?>
						</td>
						<td>
							<?php 
								$dob = $travel_user->user->user_profile->dob;
								$today = date("Y-m-d");
								$diff = date_diff(date_create($dob), date_create($today));
								echo $diff->format('%y');
							?>
						</td>
						<?php if (($travel_user->user->user_profile->sex)=='1') {  ?>
						<td> Male  </td>
						<?php } else if (($travel_user->user->user_profile->sex)=='2') { ?>
						<td style="color:#ff00ff"> Female  </td>
						<?php } else { ?>
						<td>   </td>
						<?php } ?>
						<td>
							<?= $travel_user->user->user_profile->phone ?>
						</td>
						<td>
							<?= $travel_user->user->user_profile->mobile ?>
						</td>
						<td>
							<?= $travel_user->user->user_profile->address ?>
						</td>
					</tr>
					<?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>	
</div>