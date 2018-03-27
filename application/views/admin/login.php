<?php if(isset($login_fail)) : ?>
  <div class="alert alert-danger">Admin Login Error</div>
<?php endif; ?>

<?php echo validation_errors(); ?>
<div class="container">
  <?php echo form_open('admin/login', 'class="form-signin"') ?>
    <h2 class="form-singin-heading">Admin Login</h2>
    <input required autofocus type="email" name="usr_email" class="form-control" placeholder="Type email here...">
    <input type="password" name="usr_password" class="form-control" placeholder="Type password here...">
    <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
  <?php echo form_close() ?>
</div>
