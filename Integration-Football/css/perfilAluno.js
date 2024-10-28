function file(){
   document.getElementById('input-file').click(); 
}

document.getElementById('input-file').addEventListener('change', function() {
    var file = document.getElementById('input-file').files[0];

if(file) {
    document.getElementById('file-text').innerHTML = file.name;
} else {
    document.getElementById('fileName').textContent = '';
}});
