<!-- Discussion - initial comment -->
<?php foreach($discussion_query->result() as $discussion_result): ?>
  <h2>
    <?=$discussion_result->ds_title?>
    <br>
    <small>created by <?=$discussion_result->usr_name?> at <?=$discussion_result->ds_created_at?></small>
  </h2>
  <p class="lead"><?=$disussion_result->ds_body?></p>
<?php endforeach; ?>


<!-- Comment - list of comments -->

<?php foreach($comment_query->result() as $comment_result): ?>
  <li class="media">
    <a href="#" class="pull-left">
      <img src="<?=base_url()?>img/profile.svg" class="media-object">
    </a>
    <div class="media-body">
      <h4 class="media-heading"><?=$comment_result->usr_name?>
        <a href="comments/flag/<?=$comment_result->ds_id?>/<?=$comment_result->cm_id?>">
          Flag
        </a>
      </h4>
      <?=$comment_result->cm_body?>
    </div>
  </li>
<?php endforeach; ?>

<!-- Add New Comment section -->
