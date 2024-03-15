const onHandleSubmit = () => {
  const form_areaEl = document.querySelector('.form_area');
  const form_listEl = form_areaEl.querySelectorAll('.data_section');
  let data_obj_arr = [];
  for(let item of form_listEl){
    try{
      let obj = {}
      let titleTxt = item.querySelector('.title_area').value;
      let mulfiValues = item.querySelectorAll('.mulfiValues');
      if(mulfiValues.length === 0){
        let typeValue = item.querySelector('.typed_value').value;
        obj = {
          title : titleTxt,
          text : typeValue
        }
      }else{
        let value_list = [];
        for(let {checked, value} of mulfiValues){
          if(checked){
            value_list.push(value);
          }
        }
        obj = {
          title : titleTxt,
          text : value_list.join(',')
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
