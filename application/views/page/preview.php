<div class="flex flex-col items-center">
<div class="card max-w-4xl w-full bg-base-100 shadow-xl">
  <div class="card-body">
    <h2 class="card-title"><?=$row['title']?></h2>
    <hr/>
    <form>
      <input type="hidden" name="tb_name" value="<?=$row['tb_name']?>">
      <?php for($i=0;$i<count($src_arr); $i++){
          $data = $src_arr[$i];
          $theme = $data['theme'];?>
            <?php 
            if($theme==1){
              $value_arr = explode(',',$data['value']); ?>
              <div class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text"><?=$data['title']?></span>
                </div>
                <div class="flex gap-2">
                  <?php foreach($value_arr as $value){?>
                  <label class="label cursor-pointer flex gap-3">
                    <span class="label-text"><?=$value?></span> 
                    <input type="radio" name="radio-<?=$data['flow']?>" class="radio checked:bg-red-500" value="<?=$value?>"/>
                  </label>
                  <?php } ?>
                </div>
              </div>
            <?php }
            else if($theme==2){
              $value_arr = explode(',',$src_arr[$i]['value']);?>
              <div class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text"><?=$data['title']?></span>
                </div>
                <div class="flex gap-2">
                <?php foreach($value_arr as $value){?>
                <label class="cursor-pointer label flex gap-3">
                  <span class="label-text"><?=$value?></span>
                  <input type="checkbox" class="checkbox checkbox-secondary" value="<?=$value?>"/>
                </label>
                <?php } ?>
              </div>
            <?php }
            else if($theme==3){ ?>
              <label class="form-control w-full">
                <div class="label">
                  <span class="label-text"><?=$src_arr[$i]['value']?></span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full" />
              </label>
            <?php } ?>
          </div>
      <?php } ?>
    </form>
  </div>
</div>
