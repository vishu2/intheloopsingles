<div class="page-header">
   <div class="row align-items-center">
      <div class="col-auto">     
         <h2 class="page-title">
            Social Links
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
                     <?= $this->Paginator->sort('facebook') ?>
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('google+') ?>
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('instagram') ?>
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('modified') ?>
                  </th>
					<th scope="col" class="actions">
                     <?= __('Actions') ?>
                  </th>
               </tr>
            </thead>
            <tbody>
               <?php $i=$this->Paginator->counter('{{start}}'); foreach ($links as $link): ?>
               <tr>
                  <td>
                     <?= $i ?>
                  </td>
                  <td>
                     <?= h($link->facebook) ?>
                  </td>
                  <td>
                     <?= h($link->google) ?>
                  </td>
				  <td>
                     <?= h($link->instagram) ?>
                  </td>
				  <td>
                     <?= h($link->modified) ?>
                  </td>
					<td class="text-muted">
                      <?= $this->Html->link('<span class="fa fa-edit edit_btn"></span><span class="sr-only">' . __('edit') . '</span>', ['action' => 'edit', base64_encode($link->id)], ['escape' => false, 'title' => __('Edit')]) ?>
                    </td>
               </tr>
               <?php $i++; endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <?php echo $this->element('pagination'); ?>
</div>