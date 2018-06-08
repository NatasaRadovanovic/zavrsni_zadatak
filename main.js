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

function checkDel(){ 
    let check = confirm("Do you really want to delete this post?")

    if(check){
        return true;
    }else{
        return false;
    }
}

function validationComm(){
    let name = document.getElementById('nameComm');
    let comment = document.getElementById('txtComm');
    let alertMsg = document.getElementById('alertComm')

    if(name.value == '' || comment.value == ''){
        alertMsg.style.display='block';
        return false;
        
    }
}

function validationPost(){
    let author = document.getElementById('authorPost');
    let title = document.getElementById('titlePost');
    let post = document.getElementById('bodyPost');
    let alertMsg = document.getElementById('alertPost');

    if(author.value == '' || title.value == '' || post.value == ''){
        alertMsg.style.display='block';
        
        return false;
      
    }
}



