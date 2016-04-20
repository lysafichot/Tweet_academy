$(document).ready(function() {

	var images = []; // Je crée un tableau qui vas contenir toute mes images;
	var imagesSrc = []; // Je crée un tableau qui vas contenir tout les chemins absolue de mes images;
	var imagesAlt = []; // Je crée un tableau qui vas contenir tout les alt de mes images;
	$('.slideshow img').hide(); // Je cache toute mes images;
	$('.slideshow img').first().show(); // Sauf la première image;
	
	$('.slideshow img').each(function(i) {
		images.push($(this)); // Je fais une boucle qui mettrons tout mes images de la div Slideshow dans mon tableau; 
		imagesSrc.push(images[i][0].src); // Pareil sauf que je récupère que le src de l'image;
		imagesAlt.push(images[i][0].alt); // Pareil sauf que je récupère que l'alt de l'image;
	});

	var displayImg = $('.slideshow img'); // Je pointe vers l'affichage de l'image pour l'effet;

	IntervalID = setInterval(function() { 
			$('.slideshow img') // Je commence;
			.next() // Je passe a la div suivante;
			.prependTo('.slideshow'); // Je boucle dans ma div slideshow contenant toute mes images;
			$('.slideshow img').last().fadeOut(1000); // Je fais disparaitre d'avant (la dernière occurence);
			$('.slideshow img').eq(0).fadeIn(1000); // Je fais apparaitre l'image d'après;
		}, 5000); // a interval de 2 sec;
	$('.pause').click(function() {
		clearInterval(IntervalID);
	});
});