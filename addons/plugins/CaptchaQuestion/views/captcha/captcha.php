<?php
if (!defined('IN_ESOTALK')) exit;
$form = $data['form'];
?>
<div class="captcha">
  <small>始祖高达的型号是？RX-</small>
  <?php echo $form->input('captcha', 'text', array('placeholder' => '两位数字', 'value' => '', 'tabindex' => $data['tabindex'] )) ?>
</div>
