function verifSupUser(userId) {
    if (confirm("Êtes-vous sûre de vouloir supprimer votre compte ?")) {
        window.location.href = 'removeUser.php?id=' + userId
    }
}