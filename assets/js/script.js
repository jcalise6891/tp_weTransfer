const dropZone = document.getElementById('dropZone');
let formData = new FormData();
let form = document.getElementById('formulaire');
// const video = videojs('bg-video');

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

    formData.append('userfile',file);
    for (var value of formData.values()) {
        console.log(value); 
     }
}

// function togglePause(){
//     if (video.paused()){
//         video.play();
//     }
//     else{
//         video.pause();
//     }
// }

window.addEventListener('dragenter', () => {
    showDropZone();
}, Event);

dropZone.addEventListener('dragenter',allowDrag);
dropZone.addEventListener('dragover',allowDrag);

dropZone.addEventListener('dragleave',function(e){
    hideDropZone();
});

dropZone.addEventListener('drop',handleDrop);

form.addEventListener('submit', (e) => {

    let url = './assets/php/file.php'
    e.preventDefault();

    let formDat = new FormData(form);

    for (var value of formDat.values()) {
        console.log(value); 
    }

    fetch(url,{
        method: 'POST',
        // headers:{
        //     'X-Requested-With':'xmlhttprequest'
        // },
        body:formData
    })
    // .then( response => response.json())
    // .then(data => console.log(data));
    .then(response => console.log(response));

})



// dropZone.addEventListener('click', togglePause);

