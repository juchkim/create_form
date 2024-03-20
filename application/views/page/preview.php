<div class="flex flex-col items-center">
  <div class="max-w-4xl w-full bg-base-100 shadow-xl">
    <img src="<?=base_url()?>uploads/<?=$row['thumnail']?>" class="w-full mb-3" alt="Responsive image">
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
        <div role="alert" class="alert shadow-lg mt-3 mb-3">
          <div>
            <h2 class="font-bold">개인정보 수집·이용 동의서</h2>
            <div class="text-md break-keep">
              1. 수집하는 개인정보 항목 : 성명, 연락처 <br/>
              2. 개인정보 수집 및 이용 목적 : 상담<br/> 
              3. 개인정보의 보유 및 이용기간 : 동의 후 1년간이며, 삭제 요청시 즉시 파기함 
              <br/>※ 귀하는 이에 대한 동의를 거부할 수 있습니다. 다만 동의하지 않는 경우 상담 및 교육이 불가함을 알려드립니다.
              <br/>*개인정보 수집 및 이용에 동의합니다.</div>
          </div>
        </div>
        <button type="button" class="btn btn-outline btn-success w-full mt-3">Submit</button>
        <button type="button" onclick="window.open('<?=base_url()?>app/page?idx=<?=$idx?>')" class="btn btn-outline btn-info w-full mt-3">Go to Page</button>
      </form>
    </div>
</div>
