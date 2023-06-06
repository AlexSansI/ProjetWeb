function verifSup(artisteId) {
    if (confirm("Êtes-vous sûr.e de vouloir supprimer la biographie de cette artiste ?")) {
        window.location.href = 'remove.php?id=' + artisteId
    }
}