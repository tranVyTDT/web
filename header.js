// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	 var x = document.getElementById("brand");
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        x.style.display = "none";
    } else{
    	  x.style.display = "block";
    }
}