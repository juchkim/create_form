const add_areaEl = document.querySelector('.add_area');
const selectEl = document.querySelector('.select_area');

const spacePattern = /\s/g;   // 공백 체크 정규표현식 - 탭, 스페이스

const onFillConfirm = ()=>{
  let fullFilled = false;
  const form_areaEl = document.querySelector('.form_area');
  const form_listEl = form_areaEl.querySelectorAll('.data_section');

  for(let item of form_listEl){
    const {value} = item.querySelector('.input_area');
    const str = value.replace(/\s/g, "");
    
    if(str===""){
      fullFilled = false;
      break;
    }else{
      fullFilled = true;
    }
  }

  onDisplayAddArea(fullFilled);
}

const onDisplayAddArea = (fullFilled)=>{
  if(fullFilled){
    add_areaEl.classList.remove('hidden');
  }else{
    add_areaEl.classList.add('hidden');
  }
}

const onHandleClickAdd = () =>{
  const {value} = selectEl;
  switch (value.toString()) {
    case '1':
      break;
    case '2':
      break;
    case '3':
      break;
    default:
      break;
  }
  addInputAdd(value);
}
let elementFlow = 3;
const addInputAdd = (theme)=>{
  let commonTag = `
  <div class="badge badge-error gap-2 absolute cursor-pointer" style="top:-10px; left:10px;" onclick="onDeleteSection(this)">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    delete
  </div>
  <input type="hidden" class="theme" value="${theme}" />
  <input type="hidden" class="flow" value="${elementFlow}" />
  `;
  elementFlow++;
  let addEl = document.createElement('div');
  addEl.classList.add('data_section','border', 'mt-3', 'relative');
  let themeTag = "";

  switch (theme.toString()) {
    case '1':
      themeTag = `
      <label class="input input-bordered flex items-center gap-2 mb-3">
        제목
        <input type="text" required class="grow title_area" onchange="onFillConfirm()"/>
      </label>
      <label class="input input-bordered flex items-center gap-2">
        다중선택
        <input type="text" required class="grow input_area" placeholder="콤마로 구분" onchange="onFillConfirm()"/>
      </label>`
      break;
    case '2':
      themeTag = `
      <label class="input input-bordered flex items-center gap-2 mb-3">
        제목
        <input type="text" required class="grow title_area" onchange="onFillConfirm()"/>
      </label>
      <label class="input input-bordered flex items-center gap-2">
        단일선택
        <input type="text" required class="grow input_area" placeholder="콤마로 구분" onchange="onFillConfirm()"/>
      </label>`
      break;
    case '3':
      themeTag = `
      <label class="input input-bordered flex items-center gap-2">
        제목
        <input type="text" required class="grow input_area" placeholder="제목" onchange="onFillConfirm()"/>
      </label>`
      break;
    default:
      break;
  }
  
  addEl.innerHTML = `
    ${commonTag}
    ${themeTag}
  `
  const form_areaEl = document.querySelector('.form_area');
  form_areaEl.appendChild(addEl);
  add_areaEl.classList.add('hidden');
}

const onDeleteSection = (e) =>{
  e.parentElement.remove();
  onFillConfirm();
}

const onHandleSubmit = () => {
  const form_areaEl = document.querySelector('.form_area');
  const form_listEl = form_areaEl.querySelectorAll('.data_section');
  let data_obj_arr = [];
  for(let item of form_listEl){
    try{
      let flow = item.querySelector('.flow').value;
      let theme = item.querySelector('.theme').value;
      let value = item.querySelector('.input_area').value;
      let obj = {};
      if(theme === '1' || theme === '2'){
        let title = item.querySelector('.title_area').value;
        obj = {
          flow,
          theme,
          value,
          title,
        }
      }else{
        obj = {
          flow,
          theme,
          value,
        }
      }
      data_obj_arr.push(obj);
    }
    catch(e){
      console.log(e);
    }
  }
  let data = JSON.stringify(data_obj_arr);
  const form_dataEl = document.querySelector('.form_data');
  form_dataEl.value = data;
  form_areaEl.submit();
}
