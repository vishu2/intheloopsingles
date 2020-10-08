
<div class="row">
<div class="col-8 mx-auto">
<?php echo $this->Html->script('tinymce/tinymce.min.js'); ?>
<?php $this->TinymceElfinder->defineElfinderBrowser()?>
<?= $this->Form->Create($emailTemplate, ['id'=> 'editEmailForm', 'class'=>'card']) ?>
    <div class="card-header">
        <h4 class="card-title">Edit Email Template</h4>
    </div>
    <div class="card-body">
        <div class="row">
        <div class="col-xl-8">
            <div class="row">
            <div class="col-md-6 col-xl-12">
                
                <div class="mb-3">
                <label class="form-label">Subject</label>
                <?= $this->Form->control('subject', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Template Subject']) ?>
                </div>
                <div class="mb-3">
                <label class="form-label">Template For</label>
                <?= $this->Form->control('template_for', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Template For']) ?>
                </div>
                
            </div>
            
        </div>
        </div>
        <div class="col-xl-12">
            
                <div class="mb-3">
                <label class="form-label">Template Body</label>
                <?= $this->Form->control('template_body', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Template Body']) ?>
                </div>
            
        </div>
</div>
</div>
<div class="card-footer text-right">
  <div class="d-flex">
    <button type="submit" class="btn btn-primary ">Save</button>
    <button type="button" class="btn btn-link" onclick="history.go(-1);">Cancel</button>
  </div>
</div>
<?= $this->Form->end(); ?>
</div>
</div>
</div>
<script>
$(document).ready(function(){
tinymce.init({
        file_browser_callback : elFinderBrowser,
        selector: 'textarea',
        height: 400,
        theme: 'modern',
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        plugins: [
        // 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'image code',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        // 'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
        ],
        toolbar: 'undo redo | image code',
        //images_upload_url: '<?php echo $this->Url->build('/admin/cms-pages/upload'); ?>',
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        // image_advtab: true,
        templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
        ],
        /*images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
          
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '<?php echo $this->Url->build('/admin/cms-pages/upload'); ?>');
          
            xhr.onload = function() {
                var json;
            
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
            
                json = JSON.parse(xhr.responseText);
            
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success('<?php echo $this->Url->build('/'); ?>'+json.location);
            };
          
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
          
            xhr.send(formData);
        }*/
    });
});
</script>