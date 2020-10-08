<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-icon alert-danger alert-dismissible text-center" onclick="this.classList.add('hidden')" role="alert">
  <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> <?= $message ?>
</div>
<!-- <div class="message error" onclick="this.classList.add('hidden');"><?php // $message ?></div> -->
