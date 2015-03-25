<div id="info-flash"><?php echo $message; ?></div>
<?php $this->Js->get('#flash')->event('click', $this->Js->get('#flash')->effect('fadeOut')); ?>