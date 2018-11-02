// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
     var x = document.getElementById("brand");
     var my = document.getElementById('icon1')
     var mylogin = document.getElementById('header1')
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        x.style.display = "none";
        mylogin.style.height = "80px";
        mylogin.style.width = "180px";
        my.style.height = "70px";
        my.style.width = "70px";
    } else{
         x.style.display = "block";
         mylogin.style.height = "100px";
        mylogin.style.width = "200px";
        my.style.height = "100px";
        my.style.width = "100px";
    }
    
}