<div class="flex flex-col items-center">
  <div class="card max-w-4xl w-full bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="card-title">theme : <?=$title?></h2>
    </div>
    <div class="flex gap-3 flex-col flex-wrap">
      <?php foreach($list as $key => $row){?>
        <div class="stats stats-vertical lg:stats-horizontal shadow">
          <?php foreach($row as $key => $item){?>
            <div class="stat">
              <div class="stat-title mt-3"><?=$item['title']?> : <?=$item['text']?></div>
            </div>
          <?php }?>
        </div>
      <?php }?>
      <?php if(count($list)==0){?>
        <div class="hero bg-base-200">
          <div class="hero-content text-center">
            <div class="max-w-md">
              <h1 class="text-5xl font-bold text-red-500">Empty Data</h1>
              <p class="py-6">Get started by creating a new project.</p>
              <button class="btn btn-outline btn-error" type="button" onclick="location.href='<?=base_url()?>app/page?idx=<?=$idx?>'">Add</button>
            </div>
          </div>
        </div>
      <?php } ?>
      <button onclick="location.href='<?=base_url()?>'" class="btn btn-warning">이전페이지</button>
    </div>
  </div>
</div>