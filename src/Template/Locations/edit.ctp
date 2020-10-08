<div class="my-3 my-md-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?= $this->Form->Create($location, ['id'=> 'addlocation', 'class'=>'card']) ?>
                <div class="card-header">
                    <h4 class="card-title">Add Location</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-md-6 col-xl-12">

                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <?= $this->Form->control('name', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter Name']) ?>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Longitude</label>
                                        <?= $this->Form->control('longitude', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter longitude']) ?>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Latitude</label>
                                        <?= $this->Form->control('latitude', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter latitude']) ?>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Contact</label>
                                        <?= $this->Form->control('contact', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter contact']) ?>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <?= $this->Form->control('phone', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter phone']) ?>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <?= $this->Form->control('email', ['label' => false, 'class'=> 'form-control', 'placeholder' => 'Enter email']) ?>
                                    </div>
                                
                                </div>
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