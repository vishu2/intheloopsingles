<!-- Users->index.ctp -->
<div class="page-header">
   <div class="row align-items-center">
      <div class="col-auto">
         <!-- Page pre-title -->
         <h2 class="page-title">
            Galleries
         </h2>
      </div>
      <?php echo $this->JqueryFileUpload->loadCss(); ?>
<?php echo $this->JqueryFileUpload->loadScripts(); ?>
      <!-- Page title actions -->
      <div class="col-auto ml-auto d-print-none">
         <!--<span class="d-none d-sm-inline">
            <a href="#" class="btn btn-white">
              New view
            </a>
            </span>-->
         <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">Search filters</button>
         <!--<a class="btn btn-primary ml-3 d-none d-sm-inline-block" href="<?php //$this->Url->build(['controller'=>'users', 'action'=> 'add'])?>">Add</a>-->
         <a class="btn btn-primary ml-3 d-sm-none btn-icon" href="<?= $this->Url->build(['controller'=>'users', 'action'=> 'add'])?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z"></path>
               <line x1="12" y1="5" x2="12" y2="19"></line>
               <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
         </a>
         
      </div>
   </div>
</div>
<div class="collapse <?php echo (!empty($this->request->getQuery('action')) ? 'show' : '') ?>" data-actionCollapse='' id="collapseSearch">
   <div class="card card-body">
      <?php $squery = $this->request->getQueryParams(); ?>
      <?= $this->Form->Create(null, ['id' => 'gallerySearch', 'type' => 'get']) ?>
      <div class="row">
         <div class="form-group col-md-2">
             <label for="name">Name</label> 
            <?= $this->Form->control('search', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Name', 'value' => @$squery['search']]) ?>
         </div>
         <div class="form-group col-md-3 col-lg-2 mt-4 mt-4"> 
            <a href="<?php echo $this->Url->build(['controller' => 'galleries', 'action' => 'index'])?>" class="btn btn-primary">Clear</a>
            <button type="submit" class="btn btn-primary " name='action'>Search</button>
         </div>
      </div>
      <?= $this->Form->end(); ?>
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
                     Images
                  </th>
                  <th scope="col">
                     <?= $this->Paginator->sort('created') ?>
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
               <?php $i=$this->Paginator->counter('{{start}}'); foreach ($galleries as $gallery): ?>
               <tr>
                 <td><?= $i ?></td>
                <td><?= h($gallery->name) ?></td>
                <td><a href="#" class='view_images' data-gid='<?= $gallery->id ?>'>View</a></td>
                <td><?= h($gallery->created) ?></td>
                <td><?= h($gallery->modified) ?></td>
                  <td class="text-muted">
                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-pencil-square-o edit_btn')).'', array('action' => 'edit', base64_encode($gallery->id)), array('escape' => false)) ?> 
                    <?= $this->Form->postLink(__('<i class="fa fa-trash delete_btn"></i>'),['action' => 'delete',$gallery->id    ],['escape' => false,   'confirm' => __('Are you sure you want to delete {0}?', $gallery->name)])
                    ?>
                  </td>
               </tr>
               <?php $i++; endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <?php echo $this->element('pagination'); ?>
</div>
<?php echo $this->element('image_upload'); ?>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'galleries/img_upload/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        success: function (data) {
// console.log(data);
            var imgHtml = '<div class="col-xs-6 col-md-3"><a href="#" class="thumbnail"><span class="delete_img pull-right" style="color:red" data-img-id="'+data.id+'">x</span><img class="thumnails_list" src="'+data.url+'"  data-img-id="'+data.id+'" alt="Loading Image..."></a></div>';
            $('.image-success').html('Image Updated Successfully');
            $('#imgHtml').append(imgHtml);
            
            
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
            'width',
            progress + '%'
            );
        }
    }).bind('fileuploadsubmit', function (e, data) {
        data.formData = {
            'id': $("#gpid").attr("data-gpid")
        };
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>

<script>
    (function($){
        $(".view_images").on("click",function() {
            var gid = $(this).attr("data-gid");
            $("#gpid").attr("data-gpid",gid);
            
            $("body").addClass("modal-open");
            $("body").append('<div class="modal-backdrop fade in"></div>');
            
            $.ajax({
                url: 'galleries/getImages/'+gid,
                dataType: 'json',
                success: function( results ) {
                    $("#show_image_upload #progress .progress-bar").css("width","0px");
                    $('#imgHtml').html('');
                    $("body").removeClass("modal-open");
                    $("body").find('.modal-backdrop').remove();
                    var result = results.result;
                    if(result.images.length != 0) {
                        $.each(result.images, function (index, file) {
                            //var defaultTxt = 'Set as default';

                           /* if(result.default_image_id == file.id) {
                                defaultTxt = 'Default';
                            }*/

                            var imgHtml = '<div class="col-xs-6 col-md-3"><a href="#" class="thumbnail"> <span class="delete_img pull-right" style="color:red" data-img-id="'+file.id+'">x</span><img class="thumnails_list" src="'+file.url+'"  alt="Loading Image..."></a></div>';
                            /*<center><span class="setAsDefault" data-img-id="'+file.id+'" data-gallery-id="'+result.id+'">'+defaultTxt+'</span></center>*/
                            
                            $('#imgHtml').append(imgHtml);

                        });
                    }
                    $("#show_image_upload").modal("show");
                },
                error: function( req, status, err ) {
                    
                }
            });
        });
        
        $(document).on( "click", ".delete_img",function() {
            var $this = $(this);
            var img_id = $(this).attr("data-img-id");
            $('.image-success').html('');
            var result = confirm("Are you sure you want to delete this image?");
            if (result) {
                $.ajax({
                    url: 'galleries/delete_image/'+img_id,
                    dataType: 'json',
                    success: function( result ) {
                        $this.closest('div.col-md-3').remove();
                    },
                    error: function( req, status, err ) {
                        
                    }
                });
            }
        });
        // alert('hi');

        $(document).on( "click", ".setAsDefault",function() {
            var $this = $(this);
            var img_id = $(this).attr("data-img-id");
            var gallery_id = $(this).attr("data-gallery-id");
          
            $.ajax({
                url: 'galleries/set_as_default/'+gallery_id+'/'+img_id,
                dataType: 'json',
                success: function( result ) {
                    $(document).find(".setAsDefault").html("Set as default");
                    $this.html("Default");
                },
                error: function( req, status, err ) {
                    
                }
            });
           
        });

        
    })(jQuery)

</script>


