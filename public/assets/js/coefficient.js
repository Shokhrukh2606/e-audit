const kpsInputs = document.querySelectorAll('.kps input');
const kpsParams = {};
const kpsResult = document.querySelector('#kps-result');

function kps() {
  kpsInputs.forEach(element => {
    kpsParams[element.name.split("[")[1].split("]")[0]] = Number(element.value);
  });

  const denominator = kpsParams.P2 - kpsParams.DO;

  if(denominator===0){
    kpsResult.innerHTML = "division_to_zero";
    return 0;
  }

  if (!kpsParams.A2 || !kpsParams.P2 || !kpsParams.DO){
    console.log(kpsParams.A2 , !kpsParams.P2 , !kpsParams.DO)
    kpsResult.innerHTML = "fill_required_fields";
    return 0;
  } 
  
  const result = Number((kpsParams.A2 / denominator).toFixed(2));

  if(result < 1.25){
    kpsResult.innerHTML = result;
    kpsResult.style.border = '1px solid red'
    return 0;
  }

  kpsResult.style.border = '1px solid green'
  kpsResult.innerHTML = result;
 
}

const ososInputs = document.querySelectorAll('.osos input');
const ososParams = {};
const ososResult = document.querySelector('#osos-result');

function osos() {
  ososInputs.forEach(element => {
    ososParams[element.name.split("[")[1].split("]")[0]] = Number(element.value);
  });
  const denominator = kpsParams.A2;
  const result = Number((((ososParams.P1 + ososParams.DEK2) - ososParams.A1) / denominator).toFixed(2));

  console.log(result);

  if (denominator !== 0 && result >= 0.2) {
    ososResult.style.border = '1px solid #2b3553'
    ososResult.innerHTML = result;
  } else if (result < 0.2) {
    ososResult.style.border = '1px solid red'
    ososResult.innerHTML = result;
  }else if(denominator==0){
    ososResult.innerHTML = "division_to_zero";
  }else {
    ososResult.style.border = '1px solid red'
  }
}

const kppInputs = document.querySelectorAll('.kpp input');
const kppParams = {};
const kppResult = document.querySelector('#kpp-result');

function kpp() {
  kppInputs.forEach(element => {
    kppParams[element.name.split("[")[1].split("]")[0]] = Number(element.value);
    console.log(kppParams);
  });
  const denominator = kppParams.P;
  const result = Number((kppParams.PUDN / denominator).toFixed(2));

  if (denominator !== 0 && result >= 0.03) {
    kppResult.style.border = '1px solid #2b3553'
    kppResult.innerHTML = result;
  } else if (result < 0.03) {
    kppResult.style.border = '1px solid red'
    kppResult.innerHTML = result;
  }else if(denominator==0){
    kppResult.innerHTML = "division_to_zero";
  } else {
    kppResult.style.border = '1px solid red'
  }
}

function copy_A2(elem){
  document.getElementById("A2").innerHTML=elem.value;
}
copy_A2(document.getElementById("A2_source"));