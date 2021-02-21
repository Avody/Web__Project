let toggleNavStatus = false;

let toggleNav = function(){
	let getSidebar = document.querySelector(".sidebar");
	let getSidebarUl = document.querySelector(".sidebar ul");
	let getSidebarTitle = document.querySelector(".sidebar span");
	let getSidebarLinks = document.querySelectorAll(".sidebar a");

	if(toggleNavStatus === false){
		
		getSidebarUl.style.visibility = "visible";
		getSidebar.style.width = "275px";
		getSidebarTitle.style.opacity = "0.5";

		let arrayLength = getSidebarLinks.length;
		for(let i =0; i<arrayLength; i++){
			getSidebarLinks[i].style.opacity=1;

		}

		toggleNavStatus = true;

	}

	else if(toggleNavStatus===true){
		 
		getSidebar.style.width = "50px";
		getSidebarTitle.style.opacity = "0";
		;
		let arrayLength = getSidebarLinks.length;
		for(let i =0; i<arrayLength; i++){
			getSidebarLinks[i].style.opacity=0;

		}

		getSidebarUl.style.visibility = "hidden"
		toggleNavStatus=false;
	}
}




function mouseOver(){
	document.getElementById("profile2").style.visibility = "visible";
}

function mouseOut(){
	document.getElementById("profile2").style.visibility = "hidden";
}

