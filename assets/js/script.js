const dropZone = document.getElementById('dropZone');

function showDropZone(){
    dropZone.style.visibility = "visible";
}

function hideDropZone(){
    dropZone.style.visibility = "hidden";
}

function allowDrag(e){
    e.dataTransfer.dropEffect = 'copy';
    e.preventDefault();
}

function handleDrop(e){
    e.preventDefault();
    hideDropZone();

    let dt = e.dataTransfer;
    let files = dt.files;

    handleFiles(files);
}

function handleFiles(files){
    ([...files]).forEach(uploadFile);
}

function uploadFile(file){
    let url = 'index.php'
    let formData = new FormData();

    formData.append('file',file);

    fetch(url,{
        method: 'POST',
        body:formData
    })
    .then(() =>{})
    .catch(() =>{})
}

window.addEventListener('dragenter', () => {
    showDropZone();
}, Event);

dropZone.addEventListener('dragenter',allowDrag);
dropZone.addEventListener('dragover',allowDrag);

dropZone.addEventListener('dragleave',function(e){
    hideDropZone();
});

dropZone.addEventListener('drop',handleDrop);

