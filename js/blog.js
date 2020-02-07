/**
 * Created by markgrover on 1/25/20.
 */
const files = document.querySelectorAll('.fileName');
files.forEach(function(file){
  file.addEventListener('click', function(e){
    const input = document.createElement('input');
    input.value = e.target.innerText;
    file.appendChild(input);
    input.select();

    document.execCommand('copy');
    file.removeChild(input);
  })
});

function styleCheckbox(){
  const cb = document.querySelector('.checkbox');
  cb.style = 'border: 1px solid red;';
  console.log("logging ",cb.style);
}
styleCheckbox();