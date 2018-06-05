let btn = document.getElementById('showHide')

btn.addEventListener('click',function(){
    let boxComm = document.getElementById('showHideComm');
    if (boxComm.style.display === "none") {
        boxComm.style.display = "block";
        this.innerHTML = 'Hide comments';
        
    } else {
        boxComm.style.display = "none";
        this.innerHTML = 'Show comments';
    }
})




