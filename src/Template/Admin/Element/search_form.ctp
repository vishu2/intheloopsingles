<div class="box-tools">
    <?php echo $this->Form->create(null); ?>
    <div class="input-group input-group-sm" style="width: 150px;">                            
        <input type="text" name="search" required = "true" class="form-control pull-right" placeholder="Search" 
        value = '<?php if(!empty($this->request->getQuery()['search'])){ echo $this->request->getQuery()['search']; }else{ echo "";}?>' />

        <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>