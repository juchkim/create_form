<div class="flex flex-col items-center">
  <div class="max-w-4xl w-full bg-base-100 shadow-xl">
    <div class="navbar rounded-t-xl" style="background-color:rgb(25, 118, 210);">
      <a class="btn btn-ghost text-xl text-white"><?=$row['title']?></a>
    </div>
    <div class="card-body">
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
                <div role="alert" class="alert shadow-lg">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <div>
                    <h3 class="font-bold"><?=isset($data['title'])? $data['title'] : ''?></h3>
                  </div>
                </div>
              </div>
              <div class="flex gap-2 flex-wrap">
                <?php foreach($value_arr as $value){?>
                <label class="label cursor-pointer flex gap-3">
                  <span class="label-text"><?=$value?></span> 
                  <input type="checkbox" class="checkbox checkbox-secondary" value="<?=$value?>"/>
                </label>
                <?php } ?>
            </div>
          <?php }
          else if($theme==2){
            $value_arr = explode(',',$src_arr[$i]['value']);?>
            <div class="form-control w-full">
              <div class="label">
                <div role="alert" class="alert shadow-lg">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <div>
                    <h3 class="font-bold"><?=isset($data['title'])? $data['title'] : ''?></h3>
                  </div>
                </div>
              </div>
              <div class="flex gap-2 flex-wrap">
              <?php foreach($value_arr as $value){?>
              <label class="cursor-pointer label flex gap-3">
                <span class="label-text"><?=$value?></span>
                <input type="radio" name="radio-<?=$data['flow']?>" class="radio checked:bg-red-500" value="<?=$value?>"/>
              </label>
              <?php } ?>
            </div>
          <?php }
          else if($theme==3){ ?>
            <label class="form-control w-full">
              <div class="label">
                <div role="alert" class="alert shadow-lg">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <div>
                    <h3 class="font-bold"><?=isset($data['value'])? $data['value'] : ''?></h3>
                  </div>
                </div>
              </div>
              <input type="text" placeholder="Type here" class="input input-bordered w-full" />
            </label>
          <?php } ?>
        <?php } ?>
        <label class="form-control w-full">
          <div class="label">
            <div role="alert" class="alert shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <div>
                <h3 class="font-bold">성함은?</h3>
              </div>
            </div>
          </div>
          <input type="text" placeholder="Type here" class="input input-bordered w-full" />
        </label>
        <label class="form-control w-full">
          <div class="label">
            <div role="alert" class="alert shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <div>
                <h3 class="font-bold">연락처</h3>
              </div>
            </div>
          </div>
          <input type="text" placeholder="Type here" class="input input-bordered w-full" />
        </label>
        <button type="button" class="btn btn-outline btn-success w-full mt-3">Submit</button>
        <button type="button" onclick="window.open('<?=base_url()?>app/page?idx=<?=$idx?>')" class="btn btn-outline btn-info w-full mt-3">Go to Page</button>
      </form>
    </div>
</div>
