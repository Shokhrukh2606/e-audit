const kpsInputs = document.querySelectorAll('.kps input');
const kpsParams = {};
const kpsResult = document.querySelector('#kps-result');

function kps() {
  kpsInputs.forEach(element => {
    kpsParams[element.name] = Number(element.value);
    console.log(kpsParams);
  });
  const denominator = kpsParams.P2 - kpsParams.D0;
  const result = Number((kpsParams.A2 / denominator).toFixed(2));
  // console.log(result)
  if (kpsParams.A2 && kpsParams.P2 && kpsParams.D0 && denominator !== 0 && result >= 1.25) {
    kpsResult.style.border = '1px solid #2b3553'
    kpsResult.innerHTML = result;
  } else if (result < 1.25) {
    kpsResult.style.border = '1px solid red'
    kpsResult.innerHTML = result;
  } else if (denominator === 0) {
    kpsResult.innerHTML = "denominator should not be zero";
  }
  else {
    kpsResult.style.border = '1px solid red'
  }
}

const ososInputs = document.querySelectorAll('.osos input');
const ososParams = {};
const ososResult = document.querySelector('#osos-result');

function osos() {
  ososInputs.forEach(element => {
    ososParams[element.name] = Number(element.value);
    console.log(ososParams);
  });
  const denominator = ososParams.A2;
  const result = Number((((ososParams.P1 + ososParams.DEK2) - ososParams.A1) / denominator).toFixed(2));

  console.log(result);

  if (denominator !== 0 && result >= 0.2) {
    ososResult.style.border = '1px solid #2b3553'
    ososResult.innerHTML = result;
  } else if (result < 0.2) {
    ososResult.style.border = '1px solid red'
    ososResult.innerHTML = result;
  }
  else {
    ososResult.style.border = '1px solid red'
  }
}

const kppInputs = document.querySelectorAll('.kpp input');
const kppParams = {};
const kppResult = document.querySelector('#kpp-result');

function kpp() {
  kppInputs.forEach(element => {
    kppParams[element.name] = Number(element.value);
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
  } else if (denominator === 0) {
    kppResult.innerHTML = "denominator should not be zero";
  }
  else {
    kppResult.style.border = '1px solid red'
  }
}