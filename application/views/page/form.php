<div class="flex flex-col gap-2 p-3">
  <form class="form_area flex flex-col gap-2" action="<?=base_url()?>process/send_form_data" method="post">
    <input type="hidden" name="form_data" class="form_data"/>
    <div class="data_section">
      <input type="hidden" class="flow" value="1" />
      <input type="hidden" class="theme" value="title" />
      <label class="input input-bordered flex items-center gap-2">
        Title
        <input type="text" class="grow input_area" placeholder="Title" onchange="onFillConfirm()" />
      </label>
    </div>
    <div class="data_section">
      <input type="hidden" class="flow" value="2" />
      <input type="hidden" class="theme" value="table_name" />
      <label class="input input-bordered flex items-center gap-2">
        Table Name
        <input type="text" class="grow input_area" placeholder="Table Name" onchange="onFillConfirm()"/>
      </label>
    </div>
  </form>
  <div class="border flex flex-col gap-4 p-3 add_area hidden">
    <select class="select select-bordered w-full select_area">
      <option value="1" selected>다중 선택</option>
      <option value="2">단일 선택</option>
      <option value="3">텍스트</option>
    </select>
    <button type="button" class="btn btn-outline btn-accent" onclick="onHandleClickAdd()">Add</button>
    <button type="button" class="btn btn-outline btn-info" onclick="onHandleSubmit()">Save</button>
  </div>
</div>
<script src="<?=base_url()?>dist/js/form.js"></script>