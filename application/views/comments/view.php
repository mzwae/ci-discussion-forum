<!-- Discussion - initial comment -->
<?php foreach ($discussion_query->result() as $discussion_result): ?>
  <h2>
    <?=$discussion_result->ds_title?>
    <br>
    <small>created by <?=$discussion_result->usr_name?> at <?=$discussion_result->ds_created_at?></small>
  </h2>
  <p class="lead text-info"><?=$discussion_result->ds_body?></p>
<?php endforeach; ?>

<!-- Add New Comment section -->
<br>
<br>
<div>
  <hr>
  <p>Add Your Comment here! Don't be shellfish.</p>

  <?php echo validation_errors(); ?>
  <?php echo form_open('comments/add'); ?>

      <div class="form-group col-md-5">
        <label for="comment_name">Name</label>
        <input type="text" class="form-control" id="comment_name" placeholder="Name" name="comment_name">
      </div>

      <div class="form-group col-md-5">
        <label for="comment_email">Email address</label>
        <input type="email" class="form-control" id="comment_email" placeholder="Email" name="comment_email">
      </div>

      <div class="form-group col-md-10">
        <label for="comment_body">Comment Body</label>
        <textarea type="email" rows="3" class="form-control" id="comment_body" name="comment_body"></textarea>
      </div>

      <div class="form-group col-md-10">
        <button type="submit" class="btn btn-success">
          Add Comment
        </button>
      </div>


      <?php echo form_hidden('ds_id', $ds_id); ?>

      <?php echo form_close(); ?>

</div>

<!-- Comment - list of comments -->
<hr>
<div class="list-group col-md-5">
  <h3>Users' Comments...</h3>
<?php foreach ($comment_query->result() as $comment_result): ?>
  <li class="media list-unstyled">
    <a href="#" class="pull-left">
      <!-- <img src="<?=base_url()?>img/profile.svg" class="media-object"> -->
    </a>
    <div class="media-body">
      <h4 class="media-heading"><?=$comment_result->usr_name?> - <small>added on <?=$comment_result->cm_created_at?></small>
        <small>
          <a class="text-danger" href="<?=base_url()?>comments/flag/<?=$comment_result->ds_id?>/<?=$comment_result->cm_id?>">
           Flag
        </a>
      </small>
      </h4>
      <p><?=$comment_result->cm_body?></p>
    </div>
  </li>
<?php endforeach; ?>

</div>
