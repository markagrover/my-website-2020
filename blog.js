/**
 * Created by markgrover on 1/25/20.
 */
const files = document.querySelectorAll('.fileName');
console.log(files);
files.forEach(function(file){
  file.addEventListener('click', function(e){
    const input = document.createElement('input');
    // input.setAttribute('hidden', 'true');

    input.value = e.target.innerText;
    file.appendChild(input);
    input.select();

    document.execCommand('copy');
    file.removeChild(input);
  })
});