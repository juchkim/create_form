<div class="navbar bg-base-300 rounded-box">
  <div class="flex-1 px-2 lg:flex-none">
    <a class="text-lg font-bold" href="<?=base_url()?>">Main</a>
  </div> 
  <div class="flex justify-end flex-1 px-2">
    <div class="flex items-stretch">
      <a class="btn btn-ghost rounded-btn" href="<?=base_url()?>process/logout">로그아웃</a>

      <a class="btn btn-ghost rounded-btn" href="<?=base_url()?>app/form">작성하기</a>
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost rounded-btn">List</div>
        <ul tabindex="0" class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
          <?php foreach ($list as $key => $row) {?>
            <li class="break-all"><a href="<?=base_url().'App/preview?idx='.$row['idx']?>"><?=$row['title']?></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>