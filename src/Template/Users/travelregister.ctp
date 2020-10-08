<section class="inner_banner">
	<div class="container">
		<div class="text-center">
			<h3 class="sec_head white_text">Travels</h3>
		</div>
	</div>
</section>
<script>
 function Multiply() {       
        var selectBox_Value = $("#Select").val();        		
		$("#TotalValue").val(selectBox_Value);        
    }
 
 </script>
<section class="event_sec gallery_sec">
	<div class="container">
		<div class="row col-lg-8 mx-auto">
			<?= $this->Flash->render(); ?>
					<?= $this->Form->create(null, ['url' => [
							'controller' => 'TravelRegistrations',
							'action' => 'add'
						]])?>
				<div class="col-sm-12">
					<div class="row">
						<h4 class="text-dark mx-auto Credit_">Event Credit Balance- $<?= $user->user_profile->credit_balance ?></h4>
						<div class="form-group col-md-12">							
						  <label for="input">Please select your room/price preference:</label>					  
							<select class="form-control" onchange="Multiply()" id="Select">
								<option> Select your Preference </option>
								<option value="<?= $travels->cost_single ?>"> Single Occupancy- $<?= $travels->cost_single ?> </option>
								<option value="<?= $travels->cost_shared ?>"> Shared Occupancy- $<?= $travels->cost_shared ?> </option>
							</select>
						</div>					
					</div>				 
				</div>					
				<input type="hidden" name="user_id" value="<?= $user->id ?>">
				<input type="hidden" name="travel_id" value="<?= $travels->id ?>">
				<input type="hidden" name="single" value="<?= $travels->cost_single ?>">
				<input type="hidden" name="shared" value="<?= $travels->cost_shared ?>">
				<input type="hidden" name="deposit_paid" value="<?= $travels->deposit ?>">							
			<div class="col-md-12 col-lg-12">
				<div class="">
					<div class="event_padd pl-0">						
							<h4>Travel Name:<span> <?= $travels->travel_name ?></span></h4>							
							<h4>Full Price: $<input name="full_paid" readonly type="text" id="TotalValue"> </h4>
							<h4>Deposit: $<span><?= $travels->deposit ?></span>  </h4>							
					</div>					
				</div>
			</div>
			<button type="submit" class="btn bg-success btn-success">Submit</button>
				<?= $this->Form->end(); ?>				
		</div>
	</div>
</section>
