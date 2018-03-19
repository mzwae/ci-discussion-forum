SORT: <?php
   echo anchor(
     'discussions/index/sort/age/' . (($dir == 'ASC') ? 'DESC' : 'ASC'),
     'Newest ' . (($dir == 'ASC') ? 'DESC' : 'ASC')
   );
?>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Discussion Title</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($query->result() as $result) : ?>
      <tr>
        <td>
          <a href="comments/index/<?=$result->ds_id?>">
            <?=$result->title?> created by <?=$result->usr_name?>
          </a>
          <a href="discussions/flag/<?=$result->ds_id?>">Flag</a>
          <br>
          <?=$result->ds_body?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
