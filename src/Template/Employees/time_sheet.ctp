<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->
      <h2 class="page-title">Time Sheets</h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ml-auto d-print-none">
      
      <!--<a href="#" class="btn btn-primary ml-3 d-none d-sm-inline-block" data-toggle="modal" data-target="#modal-report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Create new report
      </a>

      <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>-->

   </div>
  </div>
</div>

<style>.level-wd { width: 140px }</style>

<div class="box">
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          
        </thead>
      
          <tbody>

            <!---Repeat section-->
            <?php foreach($jobs_employees as $jobs){?>
            <tr>
               <td>
                  <table>
                     <tr>
                        <td class="text-muted" colspan="10">
                           <h3><?php $jobs['employee']?></h3></td>
                     </tr>
                     <!--Week day strip-->
                     <tr>
                        <td class="text-muted"></td>
                        <td class="text-muted"> <span class="name">Mon</span>
                           <br/> <span class="subtext">18 May</span> </td>
                        <td class="text-muted"> <span class="name">Tue</span>
                           <br/> <span class="subtext">19 May</span> </td>
                        <td class="text-muted"> <span class="name">Wed</span>
                           <br/> <span class="subtext">20 May</span> </td>
                        <td class="text-muted"> <span class="name">Thu</span>
                           <br/> <span class="subtext">21 May</span> </td>
                        <td class="text-muted"> <span class="name">Fri</span>
                           <br/> <span class="subtext">22 May</span> </td>
                        <td class="text-muted"> <span class="name">Sat</span>
                           <br/> <span class="subtext">23 May</span> </td>
                        <td class="text-muted"> <span class="name">Sun</span>
                           <br/> <span class="subtext">24 May</span> </td>
                        <td class="text-muted"> <span class="name">Total</span>
                           <br/> <span class="subtext">Hours</span> </td>
                     </tr>
                     <!--/Week day strip-->
                     <tr>
                        <td class="text-muted level-wd" >Level 1</td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                     </tr>

                     <tr>
                        <td class="text-muted level-wd" >Level 2</td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                        <td class="text-muted">
                           <div class="col-md-6 col-lg-6 col-xl-6 ">
                              <?= $this->Form->control('input_name', ['label' => false, 'class'=> 'form-control', 'placeholder' => '', 'id' => '']) ?>
                           </div>
                        </td>
                     </tr>

                  </table>
               </td>
            </tr>
            <?php } ?>
            <!---/Repeat sectio-->
            
          </tbody>
        </table>
      </div>
  </div>
  <?php //echo $this->element('pagination'); ?>
</div>