
document.querySelector("#submit").addEventListener("click",function(e){
    e.preventDefault();
    $.post( "api/create.php",{
        tickettitle : document.querySelector("#tickettitle").value,
        startDate : document.querySelector("#startDate").value,
        dateFin : document.querySelector("#dateFin").value,
        type : document.querySelector("#type").value,
        level : document.querySelector("#level").value,
        detail : document.querySelector("#detail").value
    }, function(res) {
        console.clear();
        console.log(res);
        if (res==1) {
            window.location.href = window.location.origin;
        }else{
            alert("error");
        }
      }) 
})