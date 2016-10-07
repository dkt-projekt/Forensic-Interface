$(function() {
        
  $('.list-group-item').on('click', function() {
    $('.glyphicon', this)
      .toggleClass('glyphicon-chevron-right')
      .toggleClass('glyphicon-chevron-down');
  });

});
function openNav() {
	if(document.getElementById("mySidenav").style.width=="250px"){
		closeNav();
	}
	else{
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("main").style.marginLeft = "250px";
		document.getElementById("main").style.width = (document.getElementById("main").clientWidth - 250) + "px";
		document.getElementById("main").style.width = (100-25000/document.getElementById("main").clientWidth) + "%";
	}
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("main").style.width = "100%";
}
function openNavSub() {
    document.getElementById("mySidenav2").style.width = "250px";
    document.getElementById("mySidenav2").style.marginLeft = "250px";
    document.getElementById("main").style.marginLeft = "500px";
}

function closeNavSub() {
    document.getElementById("mySidenav2").style.width = "0";
    document.getElementById("mySidenav2").style.marginLeft = "0";
    document.getElementById("main").style.marginLeft = "250px";
}

