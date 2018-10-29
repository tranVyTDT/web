// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
     var x = document.getElementById("brand");
     var myimg = document.getElementById('icon')
     var my = document.getElementById('icon1')
     var mylogin = document.getElementById('login')
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        x.style.display = "none";
        document.getElementById("header1").style.fontSize = "35px";
       myimg.style.height = "80px";
        myimg.style.width = "180px";
    } else{
         x.style.display = "block";
         document.getElementById("header1").style.fontSize = "70px";
         myimg.style.height = "100px";
        myimg.style.width = "200px";
    }
     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        x.style.display = "none";
        document.getElementById("header1").style.fontSize = "35px";
       my.style.height = "50px";
        my.style.width = "50px";
    } else{
         x.style.display = "block";
         document.getElementById("header1").style.fontSize = "70px";
         my.style.height = "100px";
        my.style.width = "100px";
    }
	// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
     var x = document.getElementById("brand");
     var my = document.getElementById('icon1')
     var mylogin = document.getElementById('header1')
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        x.style.display = "none";
         mylogin.style.height = "50px";
        mylogin.style.width = "50px";
		my.style.height = "50px";
        my.style.width = "50px";
    } else{
         x.style.display = "block";
         mylogin.style.height = "100px";
        mylogin.style.width = "100px";
		my.style.height = "100px";
        my.style.width = "100px";
    }
    
}
}