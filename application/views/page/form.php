<div class="flex flex-col gap-2 p-3">
  <div class="flex items-start gap-3 ">
    <input type="file" id="imgInput" class="file-input file-input-bordered w-full max-w-xs" />
    <img id="image_section" src="<?=isset($row['thumnail'])?base_url().'uploads/'.$row['thumnail']:""?>" alt="your image" class="h-52"/>
    <button class="btn" type="button" onclick="fileUpload()">파일 업로드</button>
  </div>
  <form class="form_area flex flex-col gap-2" action="<?=base_url()?>process/send_form_data" method="post">
    <input type="hidden" name="thumnail" class="thumnail" value="<?=isset($row['thumnail'])? $row['thumnail']:""?>"/>
    <input type="hidden" name="form_data" class="form_data"/>
    <div class="data_section">
      <input type="hidden" class="flow" value="1" />
      <input type="hidden" class="theme" value="title" />
      <label class="input input-bordered flex items-center gap-2">
        Title
        <input type="text" class="grow input_area" placeholder="Title" value="<?=isset($row['title'])?$row['title']:""?>" onchange="onFillConfirm()" />
      </label>
    </div>
    <?php if(false){?>
    <div class="data_section">
      <input type="hidden" class="flow" value="2" />
      <input type="hidden" class="theme" value="table_name" />
      <label class="input input-bordered flex items-center gap-2">
        Table Name
        <input type="text" class="grow input_area" placeholder="Table Name" value="<?=isset($row['tb_name'])?$row['tb_name']:""?>" onchange="onFillConfirm()"/>
      </label>
    </div>
    <?php } ?>
    <?php 
    for($i=0;$i<count($src_arr); $i++){?>
      <div class="data_section border mt-3 relative borborder-slate-300">
        <input type="hidden" class="flow" value="<?=$i+2?>" />
        <div class="badge badge-error gap-2 absolute cursor-pointer" style="top:-10px; left:10px;" onclick="onDeleteSection(this)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
          delete
        </div>
        <?php $data = $src_arr[$i];
        $theme = $data['theme'];
        ?>
        <input type="hidden" class="theme" value="<?=$theme?>" />
        <?php 
        if($theme==1){?>
          <label class="input input-bordered flex items-center gap-2 mb-3">
            제목
            <input type="text" required class="grow title_area" value="<?=$data['title']?>" onchange="onFillConfirm()"/>
          </label>
          <label class="input input-bordered flex items-center gap-2">
            다중선택
            <input type="text" required value="<?=$data['value']?>" class="grow input_area" placeholder="콤마로 구분" onchange="onFillConfirm()"/>
          </label>
        <?php }
        else if($theme==2){?>
          <label class="input input-bordered flex items-center gap-2 mb-3">
            제목
            <input type="text" required class="grow title_area" value="<?=$data['title']?>" onchange="onFillConfirm()"/>
          </label>
          <label class="input input-bordered flex items-center gap-2">
            단일선택
            <input type="text" required value="<?=$data['value']?>" class="grow input_area" placeholder="콤마로 구분" onchange="onFillConfirm()"/>
          </label>
        <?php }
        else if($theme==3){ ?>
          <label class="input input-bordered flex items-center gap-2">
            제목
            <input type="text" required class="grow input_area" value="<?=$data['value']?>" placeholder="제목" onchange="onFillConfirm()"/>
          </label>
        <?php } ?>
      </div>
    <?php } ?>
    <input type="hidden" value="<?=$idx?>" name="idx"/>
  </form>
  <div class="border flex flex-col gap-4 p-3 add_area <?=$idx!=null?'':'hidden'?> border-slate-300">
    <select class="select select-bordered w-full select_area">
      <option value="1" selected>다중 선택</option>
      <option value="2">단일 선택</option>
      <option value="3">텍스트</option>
    </select>
    <button type="button" class="btn btn-outline btn-accent" onclick="onHandleClickAdd()">Add</button>
    <?php if($idx!=null){?>  
      <button type="button" class="btn btn-outline btn-info" onclick="onHandleSubmit()">Edit</button>
      <button type="button" class="btn btn-outline btn-error" onclick="location.href=`<?=base_url()?>process/deleteForm?idx=<?=$idx?>`">Delete</button>
    <?php }else{ ?>
      <button type="button" class="btn btn-outline btn-info" onclick="onHandleSubmit()">Save</button>
    <?php } ?>
  </div>
</div>
<script src="<?=base_url()?>dist/js/form.js?v=2"></script>