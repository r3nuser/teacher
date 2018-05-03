function openTab(evt, tabName, element){
	var i,
		tabcontent,
		tablinks;

	document.getElementById("teacher-central-content").innerHTML="";
	tabcontent = document.getElementsByClassName("tabcontent");

	for(i = 0; i < tabcontent.length; i++){
		tabcontent[i].style.display = "none";
	}

	tablinks = document.getElementsByClassName("tablinks");

	for(i = 0; i < tablinks.length; i++){
		tablinks[i].className = tablinks[i].className.replace(" active", "");
		tablinks[i].style.backgroundColor = " rgb(40,40,40)";
	}

	element.style.backgroundColor = " rgb(70,70,70)";

	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";

}