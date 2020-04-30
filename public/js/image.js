$(document).ready(function(){
	$('.myImg').click(function(){
		var src=$(this).attr('src');
		$('#img01').attr("src",src);
		$('#myModal').toggle();
	});
	$('.close').click(function(){
		$('#myModal').toggle();
	});

});
// var modal = document.getElementById("myModal");

// // Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById("myImg");
// img.onclick = function(){
//   modal.style.display = "block";
// }

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() { 
//   modal.style.display = "none";
// }
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }