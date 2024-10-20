document.getElementById('input-arquivo').addEventListener("click", function(){
    document.getElementById('files').click();
});

document.getElementById('files').addEventListener('change', function() {
    var file = document.getElementById('files').files[0];

if(file) {
    document.getElementById('file-text').innerHTML = file.name;
} else {
    document.getElementById('fileName').textContent = '';
}});
