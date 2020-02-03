function changeDiv(fstId, scdId, Id) {
	
	let label = document.getElementsByClassName('label'+Id);
	label['0'].setAttribute("for", scdId);

	if (label['0'].hasAttribute('id') === false) {
		
		label['0'].setAttribute("id", "onHover");
		
	} else {
		
		label['0'].removeAttribute("id");
		
	}
	document.getElementById('div'+Id).classList.toggle('selected');
	document.getElementById(fstId).style.display='none';
	document.getElementById(scdId).style.display='';
	
}