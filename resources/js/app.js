import './bootstrap';
function updateBlockSize(selectedSize) {
    // Récupérer les dimensions de la taille sélectionnée à partir d'une source de données
    // Par exemple, à partir d'un objet JavaScript ou en effectuant une requête AJAX

    let blockSize = { largeur: 0, hauteur: 0 }; // À remplacer avec les dimensions correctes

    // Mettre à jour la taille des blocs en fonction des dimensions de la taille sélectionnée
    // Par exemple, en ajustant la largeur et la hauteur des blocs dans votre interface utilisateur
    document.getElementById('bloc').style.width = blockSize.largeur + 'px';
    document.getElementById('bloc').style.height = blockSize.hauteur + 'px';
}
