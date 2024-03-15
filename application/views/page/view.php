<div class="flex flex-col items-center">
  <div class="card max-w-4xl w-full bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="card-title"><?=$row['title']?></h2>
      <hr/>
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
                  <input type="hidden" class="title_area" value="<?=$data['title']?>">
                  <span class="label-text"><?=isset($data['title'])? $data['title'] : ''?></span>
                </div>
                <div class="flex gap-2">
                  <?php foreach($value_arr as $value){?>
                  <label class="label cursor-pointer flex gap-3">
                    <span class="label-text"><?=$value?></span> 
                    <input type="radio" name="radio-<?=$data['flow']?>" class="radio mulfiValues checked:bg-red-500" value="<?=$value?>"/>
                  </label>
                  <?php } ?>
              </div>
            <?php }
            else if($theme==2){
              $value_arr = explode(',',$src_arr[$i]['value']);?>
              <div class="form-control w-full">
                <div class="label">
                  <input type="hidden" class="title_area" name="title" value="<?=$data['title']?>">
                  <span class="label-text"><?=isset($data['title'])? $data['title'] : ''?></span>
                </div>
                <div class="flex gap-2">
                <?php foreach($value_arr as $value){?>
                <label class="cursor-pointer label flex gap-3">
                  <span class="label-text"><?=$value?></span>
                  <input type="checkbox" class="checkbox mulfiValues checkbox-secondary" value="<?=$value?>"/>
                </label>
                <?php } ?>
              </div>
            <?php }
            else if($theme==3){ ?>
              <label class="form-control w-full">
                <div class="label">
                  <input type="hidden" class="title_area" value="<?=$data['value']?>">
                  <span class="label-text"><?=$data['value']?></span>
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
              <span class="label-text">성함</span>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered w-full typed_value" />
          </label>
        </div>
        <div class="data_section">
          <label class="form-control w-full">
            <input type="hidden" class="title_area" value="tel">
            <div class="label">
              <span class="label-text">연락처</span>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered w-full typed_value" />
          </label>
        </div>
        <button type="button" onclick="onHandleSubmit()" class="btn btn-outline btn-success w-full mt-3">Submit</button>
      </form>
    </div>
  </div>
</div>
<script src="<?=base_url()?>dist/js/view.js"></script>

