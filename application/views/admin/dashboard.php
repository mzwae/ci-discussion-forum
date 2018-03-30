<h1 id="tables" class="page-header">Dashboard</h1>
<hr>
<!-- Discussion moderation table -->
<h3 class="text-info">Discussions Waiting Moderation</h3>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Author</th>
      <th>Email</th>

      <th>Discussion Title</th>
      <th>Discussion Body</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($discussion_query->num_rows() > 0) : ?>
      <?php foreach($discussion_query->result() as $row): ?>
        <tr>
          <td><?=$row->ds_id?></td>
          <td><?=$row->usr_name?></td>
          <td><?=$row->usr_email?></td>


          <td ><?=$row->ds_title?></td>
          <td><?=$row->ds_body?></td>
          <td>
            <?=anchor('admin/update_item/ds/allow/'.$row->ds_id, 'Allow') . ' ' . anchor('admin/update_item/ds/disallow/'.$row->ds_id, 'Disallow')?>
          </td>
        </tr>

      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="4">No naughty discussions here, horay!</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<!-- Comment moderation table -->
<hr>
<h3 class="text-info">Comments Waiting Moderation</h3>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Flagged Comment</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if($comment_query->num_rows() > 0) : ?>
      <?php foreach($comment_query->result() as $row): ?>
        <tr>
          <td><?=$row->cm_id?></td>
          <td><?=$row->usr_name?></td>
          <td><?=$row->usr_email?></td>

          <td colspan="3"><?=$row->cm_body?></td>
          <td>
            <?=anchor('admin/update_item/cm/allow/'.$row->cm_id, 'Allow') . ' ' . anchor('admin/update_item/cm/disallow/'.$row->cm_id, 'Disallow')?>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="4">No naughty comments here, horay!</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
