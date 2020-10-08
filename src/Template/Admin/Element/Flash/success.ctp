<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-icon alert-success alert-dismissible text-center" onclick="this.classList.add('hidden')" role="alert"><?= $message ?> 
</div>
<!-- <div class="message success" onclick="this.classList.add('hidden')"><?php // $message ?></div> -->
