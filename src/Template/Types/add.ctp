<div class="my-3 my-md-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?= $this->Form->Create($type, ['id'=> 'addTypeForm', 'class'=>'card']) ?>
                <div class="card-header">
                    <h4 class="card-title"><?= __('Add New Type') ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-md-6 col-xl-12">

                                    <div class="mb-3">
                                        <label class="form-label">
                                            <?= __('Type') ?>
                                        </label>
                                        <?= $this->Form->control('type', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Type']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="d-flex">
                        <?= $this->Form->button(__('Save'), ['class'=> 'btn btn-primary', 'type'=>'submit']) ?>
                            <button type="button" class="btn btn-link" onclick="history.go(-1);">
                                <?= __('Cancel') ?>
                            </button>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
        </div>
    </div>
</div>