<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js" integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  document.title = `<?=$row['title']?>`;
</script>
<div class="flex flex-col items-center" id="capture_area">
  <div class="card max-w-4xl w-full bg-base-100 shadow-xl">
    <div class="navbar rounded-t-xl" style="background-color:rgb(25, 118, 210);">
      <a class="btn btn-ghost text-xl text-white"><?=$row['title']?></a>
    </div>
    <div class="card-body">
      <form class="form_area" action="<?=base_url()?>process/save_data" method="post">
        <input type="hidden" name="form_data" class="form_data"/>
        <input type="hidden" name="idx" value="<?=$idx?>"/>
        <?php for($i=0;$i<count($src_arr); $i++){?>
          <div class="data_section">
            <?php $data = $src_arr[$i];
            $theme = $data['theme'];?>
            <?php 
            if($theme==1){
              $value_arr = explode(',',$data['value']); ?>
              <div class="form-control w-full">
                <div class="label">
                  <input type="hidden" class="title_area" value="<?=isset($data['title'])?$data['title']:''?>">
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
                    <input type="checkbox" class="checkbox mulfiValues checkbox-secondary" value="<?=$value?>"/>
                  </label>
                  <?php } ?>
              </div>
            <?php }
            else if($theme==2){
              $value_arr = explode(',',$src_arr[$i]['value']);?>
              <div class="form-control w-full">
                <div class="label">
                  <input type="hidden" class="title_area" name="title" value="<?=$data['title']?>">
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
                  <input type="radio" name="radio-<?=$data['flow']?>" class="radio mulfiValues checked:bg-red-500" value="<?=$value?>"/>
                </label>
                <?php } ?>
              </div>
            <?php }
            else if($theme==3){ ?>
              <label class="form-control w-full">
                <div class="label">
                  <input type="hidden" class="title_area" value="<?=$data['value']?>">
                  <div role="alert" class="alert shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                      <h3 class="font-bold"><?=isset($data['value'])? $data['value'] : ''?></h3>
                    </div>
                  </div>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full typed_value" />
              </label>
            <?php } ?>
          </div>
        <?php } ?>
        <div class="data_section">
          <input type="hidden" class="title_area" value="name">
          <label class="form-control w-full">
            <div class="label">
              <div role="alert" class="alert shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                  <h3 class="font-bold">성함</h3>
                </div>
              </div>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered w-full typed_value" />
          </label>
        </div>
        <div class="data_section">
          <label class="form-control w-full">
            <input type="hidden" class="title_area" value="tel">
            <div class="label">
              <div role="alert" class="alert shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                  <h3 class="font-bold">연락처</h3>
                </div>
              </div>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered w-full typed_value" />
          </label>
        </div>
        <button type="button" onclick="onHandleSubmit()" class="btn btn-outline btn-success w-full mt-3">Submit</button>
      </form>
    </div>
  </div>
</div>
<script src="<?=base_url()?>dist/js/view.js?v=1"></script>

