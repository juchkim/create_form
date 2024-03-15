<div class="overflow-x-auto">
  <table class="table table-zebra">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Title</th>
        <th>Edit</th>
        <th>Preview</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php foreach ($list as $key => $row) {?>
      <tr>
        <th>1</th>
        <td><?=$row['title']?></td>
        <td><a href="<?=base_url().'App/form?idx='.$row['idx']?>" class="underline text-green-500">edit</a></td>
        <td><a href="<?=base_url().'App/preview?idx='.$row['idx']?>" class="underline text-blue-500">preview</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>