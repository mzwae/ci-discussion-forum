
<table class="table table-hover">
  <thead>
    <tr>
      <th>Users' Discussions - SORT &uarr;&darr;: <?php
         echo anchor(
           'discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),
           'Display Newest ' . (($dir == 'ASC') ? 'First' : 'Last')
         );
      ?></th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($query->result() as $row) : ?>
      <tr>
        <td>
          <a href="<?=base_url()?>comments/index/<?=$row->ds_id?>">
            <b class="text-info"><?=$row->ds_title?></b>

            <i><small>created by <?=$row->usr_name?> on <?=$row->ds_created_at?></small></i>
          </a>
          - <small><a class="text-danger" href="<?=base_url()?>discussions/flag/<?=$row->ds_id?>">Flag</a></small>
          <br>
          <?=$row->ds_body?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
