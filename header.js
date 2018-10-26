// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	 var x = document.getElementById("brand");
	 var myimg = document.getElementById('icon')
	 var mylogin = document.getElementById('login')
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        x.style.display = "none";
        document.getElementById("header1").style.fontSize = "35px";
       myimg.style.height = "50px";
		myimg.style.width = "50px";
    } else{
    	 x.style.display = "block";
    	 document.getElementById("header1").style.fontSize = "70px";
    	 myimg.style.height = "100px";
		myimg.style.width = "100px";
    }
}