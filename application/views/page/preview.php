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
          <div class="form-control w-full">
            <div class="label">
              <span class="label-text"><?=isset($data['title'])? $data['title'] : ''?></span>
            </div>
            <div class="flex gap-2">
              <?php foreach($value_arr as $value){?>
              <label class="label cursor-pointer flex gap-3">
                <span class="label-text"><?=$value?></span> 
                <input type="radio" name="radio-<?=$data['flow']?>" class="radio checked:bg-red-500" value="<?=$value?>"/>
              </label>
              <?php } ?>
          </div>
        <?php }
        else if($theme==2){
          $value_arr = explode(',',$src_arr[$i]['value']);?>
          <div class="form-control w-full">
            <div class="label">
              <span class="label-text"><?=isset($data['title'])? $data['title'] : ''?></span>
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
      <?php } ?>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">성함</span>
        </div>
        <input type="text" placeholder="Type here" class="input input-bordered w-full" />
      </label>
      <label class="form-control w-full">
        <div class="label">
          <span class="label-text">연락처</span>
        </div>
        <input type="text" placeholder="Type here" class="input input-bordered w-full" />
      </label>
      <button type="button" class="btn btn-outline btn-success w-full mt-3">Submit</button>
      <button type="button" onclick="window.open('<?=base_url()?>app/page?idx=<?=$idx?>')" class="btn btn-outline btn-info w-full mt-3">Go to Page</button>
    </form>
  </div>
</div>
