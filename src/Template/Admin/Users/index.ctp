<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->
      <h2 class="page-title">
        Staff Members
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ml-auto d-print-none">
      
      <!--<span class="d-none d-sm-inline">
        <a href="#" class="btn btn-white">
          New view
        </a>
      </span>-->
      
      <a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>">Add</a>


      <a class="btn btn-primary ml-3 d-sm-none btn-icon" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>
    
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
<div class="box">
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th scope="col">Sr. Num</th>

            <th scope="col">
                <?= $this->Paginator->sort('user_profile.first_name', 'First Name') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('user_profile.last_name', 'Last Name') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('email') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('status') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('created') ?>
            </th>
            <th scope="col" class="actions">
                <?= __('Actions') ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php $i=$this->Paginator->counter('{{start}}'); foreach ($users as $user): ?>
              <tr>
                  <td>
                      <?= $i ?>
                  </td>
                  <td>
                      <?= h($user->user_profile->first_name) ?>
                  </td>
                  <td>
                      <?= h($user->user_profile->last_name) ?>
                  </td>
                  <td class="text-muted">
                      <?= h($user->email) ?>
                  </td>
                  <td class="text-muted">
                    <label class="form-check form-switch">
                      <input class="form-check-input staff-status" data-id="<?= $user->id; ?>" type="checkbox" <?= ($user->status == 1) ? 'checked' : ''?>>
                    </label>

                  </td>
                  <td class="text-muted">
                      <?= $user->modified ?>
                  </td>
                  <td class="text-muted">
                      
                        <?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($user->id)], ['escape' => false, 'title' => __('Edit')]) ?>
                     

                      
                        <?= $this->Form->postLink('<span class="fa fa-trash delete_btn"></span><span class="sr-only">' . __('edit') . '</span>',['action' => 'delete', $user->id],['escape' => false,  'confirm' => __('Are you sure you want to delete {0}?', $user->first_name),'title' => __('Delete')]) ?>
                      

                  </td>
              </tr>
              <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  

    <?php echo $this->element('pagination'); ?>
</div>
<script>
	$(".staff-status").on("change",function() { 
        var $this = $(this);
        var status = $(this).prop('checked');
        var id = $(this).attr('data-id');
        var target_url = "users/ajaxStaffStatus";

        $.ajax({
          type: "POST",
          url: target_url,
          data: {
            "status": ((status === true) ? 1 : 0),
            "id": id
          },
          success: function(msg) {
            var json = JSON.parse(msg);
            //console.log(json);
            if(json.status == 'success'){
             swal({
                icon: 'success',
                title: 'Success',
                text: json.message,
              });
            }else if(json.status == 'error'){
                swal({
                icon: 'error',
                title: 'Oops...',
                text: json.message,
              }).then(()=>{
                $this.prop('checked', false);
                });
            }
          }
        });
      });
</script>