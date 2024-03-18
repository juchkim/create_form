<?php if(count($list)==0){?>
  <div class="hero bg-base-200 my-3">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <h1 class="text-5xl font-bold text-pink-500">Empty Data</h1>
        <p class="py-6">Get started by creating a new project.</p>
        <button class="btn btn-outline btn-info" type="button" onclick="location.href='<?=base_url()?>app/form'">작성하기</button>
      </div>
    </div>
  </div>
<?php }else{ ?>
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
        <h2 class="card-title break-all	"><?=$row['title']?></h2>
        <div class="card-actions justify-end">
          <a href="<?=base_url().'App/form?idx='.$row['idx']?>" class="btn btn-primary">edit</a>
          <a href="<?=base_url().'App/preview?idx='.$row['idx']?>" class="btn">preview</a>
          <a href="<?=base_url().'App/data_view?idx='.$row['idx']?>" class="btn btn-accent">data view</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
<?php } ?>