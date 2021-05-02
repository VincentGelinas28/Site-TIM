(function(){
	//let bouton = document.getElementById('bout_nouvelles')
    let nouvelles = document.querySelector('.nouvelles section')

	//bouton.addEventListener('mousedown', monAjax)
	window.addEventListener('load', monAjax)

	function monAjax()
{
   let maRequete = new XMLHttpRequest();
   maRequete.open('GET', monObjJS.URLDomaine + '/wp-json/wp/v2/posts?categories=33');
   maRequete.onload = function () {
       if (maRequete.status >= 200 && maRequete.status < 400) {
           let data = JSON.parse(maRequete.responseText);
		   let chaine = ''
		   for(const elm of data){
			   chaine += '<h2>' + elm.title.rendered + '</h2>'
			   chaine +=  elm.content.rendered
		   }
		   nouvelles.innerHTML = chaine;
        }
       
        else {
           console.log('La connexion est faite mais il y a une erreur')
       }
   }
   maRequete.onerror = function () {
       console.log("erreur de connexion");
   }
   maRequete.send()
}

/* ----------------------traitement de l'ajout d'un article de categorie Nouvelle---------------------------- */

bouton_ajout = document.getElementById('bout-rapide')
bouton_ajout.addEventListener('mousedown', function(){
    console.log('ajout')
    let = monArticle = {
        "title" : document.querySelector('.admin-rapid [name="title"]').value,
        "content" : document.querySelector('.admin-rapid [name="content"]').value,
        "status" : "publish",
        "categories" : [33]
    }

    console.log(JSON.stringify(monArticle))
    let creerArticle = new XMLHttpRequest()
    creerArticle.open("POST", monObjJS.URLDomaine +  '/wp-json/wp/v2/posts')
    creerArticle.setRequestHeader("X-WP-Nonce", monObjJS.nonce)
    creerArticle.setRequestHeader("Content-type", "application/json;charset=UTF8-8")
    creerArticle.send(JSON.stringify(monArticle)) //transmettre la requête au serveur
    creerArticle.onreadystatechange = function() {
        if(creerArticle.readyState == 4){
            if(creerArticle.status == 201){
                document.querySelector('.admin-rapid [name="title"]').value = ''
                document.querySelector('.admin-rapid [name="content"]').value = ''
            }
            else{
                alert('404')
            }
        }
    }
})

}())	