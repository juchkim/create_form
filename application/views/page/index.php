<div class="overflow-x-auto hidden md:block">
  <table class="table table-zebra">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Title</th>
        <th>Edit</th>
        <th>Preview</th>
        <th>Data list</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php foreach ($list as $key => $row) {?>
      <tr>
        <th></th>
        <td><?=$row['title']?></td>
        <td><a href="<?=base_url().'App/form?idx='.$row['idx']?>" class="underline text-green-500">edit</a></td>
        <td><a href="<?=base_url().'App/preview?idx='.$row['idx']?>" class="underline text-blue-500">preview</a></td>
        <td><a href="<?=base_url().'App/data_view?idx='.$row['idx']?>" class="underline text-red-500">data view</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<div class="overflow-x-auto block md:hidden flex flex-col gap-3 items-center mt-3">
  <?php foreach ($list as $key => $row) {?>
  <div class="max-w-96 w-full bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="card-title"><?=$row['title']?></h2>
      <div class="card-actions justify-end">
        <a href="<?=base_url().'App/form?idx='.$row['idx']?>" class="btn btn-primary">edit</a>
        <a href="<?=base_url().'App/preview?idx='.$row['idx']?>" class="btn">preview</a>
        <a href="<?=base_url().'App/data_view?idx='.$row['idx']?>" class="btn btn-accent">data view</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>