function maxlength_textarea(id, char, max) // la fonction prend 3 param, l'id du textarea, le nombre de char, la taille max;
{
    var tweet = document.getElementById(id); // Bon on sait tous ce que ca fait, JUST IN CASE, l'id de mon textarea;
    document.getElementById(char).innerHTML = max - tweet.value.length; // J'écris sur mon html le nombre max de char - le nombre de char écrit;
    tweet.onkeypress = function(){
        eval('countMaxChar("'+id+'","'+char+'",'+max+');') //eval sert à calculer les char, j'appelle ma fonction qui check à chaque evenement;
    };
    tweet.onkeyup=function(){
        eval('countMaxChar("'+id+'","'+char+'",'+max+');')
    };
    tweet.onkeydown=function(){
        eval('countMaxChar("'+id+'","'+char+'",'+max+');')
    };
}

function countMaxChar(id, char, max) //Cette fonction fait le check de chaque char;
{
    var tweet = document.getElementById(id); 
    var charCount = document.getElementById(char);
    var size = tweet.value.length; // compte la taille de notre string dans notre textarea;

    if(size > max) //si il est supérieur au max;
    {
        tweet.value = tweet.value.substr(0, max); //il supprime tout et garde seulement de 0 a 140 de ce qu'il y a dans notre textarea;
    }
    size = tweet.value.length;
    charCount.innerHTML = max - size;
}

addEventListener("DOMContentLoaded", function() {
    maxlength_textarea('tweet-textarea', 'maxChar', 140); // On appelle notre fonction avec l'id du textarea, là ou on veut mettre notre résultat du nombre de char, le max;
});
/*var re = /(chapitre \d+(\.\d)*)/i;
var trouvé = str.match(re);

console.log(trouvé);*/