<!-- Form - begin form section -->
<br>
<br>
<p class="lead">Add New Discussion</p>
<?php echo validation_errors(); ?>
<?php echo form_open('discussions/create'); ?>

<div class="form-group col-sm-6">
  <label for="usr_email">Email</label>
  <input type="email" class="form-control" id="usr_email" placeholder="Type user email here..." name="usr_email">
</div>
<div class="form-group col-sm-6">
  <label for="usr_name">Name</label>
  <input type="text" class="form-control" id="usr_name" placeholder="Type user email here..." name="usr_name">
</div>
<div class="form-group col-sm-12">
  <label for="ds_title">Discussion Title</label>
  <input type="text" class="form-control" id="ds_title" placeholder="Add title here..." name="ds_title">
</div>

<div class="form-group col-sm-12">
  <label for="ds_body">Discussion Body</label>
  <textarea type="text" rows="5" cols="3" class="form-control" id="ds_body" name="ds_body" placeholder="Add body here..."></textarea>
</div>

<div class="form-group col-md-10">
  <button type="submit" class="btn btn-success">
    Add Discussion
  </button>
</div>
<?php echo form_close(); ?>
