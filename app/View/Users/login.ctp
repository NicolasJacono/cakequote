<?php echo $this->Session->flash('Auth'); ?>

<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end('login'); ?>