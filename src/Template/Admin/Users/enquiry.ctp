<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->
      <h2 class="page-title">
        Enquiries
      </h2>
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
                <?= $this->Paginator->sort('name') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('email') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('subject') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('message') ?>
            </th>
            <th scope="col">
                <?= $this->Paginator->sort('created') ?>
            </th>
            
          </tr>
        </thead>
        <tbody>
          <?php $i=$this->Paginator->counter('{{start}}'); foreach ($enquiries as $enquiry): ?>
              <tr>
                  <td>
                      <?= $i ?>
                  </td>
                  <td>
                    <?= h($enquiry->name) ?>
                     
                  </td>
                  <td>
                      <?= h($enquiry->email) ?>
                  </td>
                  <td>
                      <?= h($enquiry->subject) ?>
                  </td>
                  <td class="text-muted">
                      <?= h($enquiry->message) ?>
                  </td>
                  
                  <td class="text-muted">
                      <?= $enquiry->created ?>
                  </td>
                 
              </tr>
              <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  

    <?php echo $this->element('pagination'); ?>
</div>
