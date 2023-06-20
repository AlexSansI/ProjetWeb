function verifSupArtiste(artisteId) {
    if (confirm("Êtes-vous sûr.e de vouloir supprimer la biographie de cette artiste ?")) {
        window.location.href = 'removeArtiste.php?id=' + artisteId
    }
}