const kpsInputs = document.querySelectorAll('.kps input');
const kpsParams = {};
const kpsResult = document.querySelector('.tab .result');

function kps(params) {
  kpsInputs.forEach(element => {
    kpsParams[element.name] = element.value;
    console.log(kpsParams);
  });
  const denominator = kpsParams.P2 - kpsParams.D0;
  const result = Number((kpsParams.A2 / denominator).toFixed(2));
  
  if (kpsParams.A2 && kpsParams.P2 && kpsParams.D0 && denominator !== 0) {
    kpsResult.style.border = 'unset'
    kpsResult.innerHTML = result;
  } else {
    kpsResult.style.border = '1px solid red'
  }
}