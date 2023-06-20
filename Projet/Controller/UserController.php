<?php
class UserController
{
  private PDO $db;

  public function __construct()
  {


    $dbName = "EchosDArtistes";
    $port = 3306;
    $host = "localhost";
    $userName = "root";
    $password = "root";

    try {
      $this->setDb(new PDO("mysql:host=$host;dbname=$dbName;port=$port;", $userName, $password));
    } catch (PDOException $e) {

      echo $e->getMessage();
    }
  }
  public function setDb($db)
  {
    $this->db = $db;
    return $this;
  }

  /*// Récupérer les données du formulaire d'inscription
    $nom = $_POST['nom'];
    $email = $_POST['email']; //utiliter?
    $motdepasse = $_POST['motdepasse'];


    if ($stmt->execute()) {
       echo "Compte créé avec succès.";
    } else {
      echo "Une erreur s'est produite lors de la création du compte.";
    }*/

  public function add(User $newUser)
  {
    $req = $this->db->prepare("INSERT INTO `user` (nomUser, mail, password) VALUES (:nomUser, :mail, :password)");

    $req->bindValue(":nomUser", htmlspecialchars(str_replace('<','',$newUser->getNomUser())), PDO::PARAM_STR);
    $req->bindValue(":mail", htmlspecialchars(str_replace('<','',$newUser->getMail())), PDO::PARAM_STR);
    $req->bindValue(":password", password_hash(htmlspecialchars(str_replace('<','',$newUser->getPassword())), PASSWORD_DEFAULT), PDO::PARAM_STR);

    $req->execute();
    return $this->db->lastInsertId();
  }

  public function get(int $id)
  {
    $req = $this->db->prepare("SELECT * FROM `user` WHERE id = :id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $data = $req->fetch();
    $user = new User($data);
    return $user;
  }

  public function getByMail(string $mail)
  {
    $req = $this->db->prepare("SELECT * FROM `user` WHERE mail = :mail");
    $req->bindValue(":mail", $mail, PDO::PARAM_STR);
    $req->execute();
    $data = $req->fetch();
    $user = new User($data);
    return $user;
  }

  public function updateUser(User $updatedUser)
    {
        $req = $this->db->prepare("UPDATE `user` SET nomUser = :nomUser, mail = :mail, password = :password WHERE id = :id");
        /*echo "<pre>";
        var_dump($updatedArtiste);
        echo "</pre>";*/
        $req->bindValue(":nomUser", htmlspecialchars(str_replace('<','',$updatedUser->getNomUser())), PDO::PARAM_STR);
        $req->bindValue(":mail", htmlspecialchars(str_replace('<','',$updatedUser->getMail())), PDO::PARAM_STR);
        $req->bindValue(":password", htmlspecialchars(str_replace('<','',$updatedUser->getPassword())), PDO::PARAM_STR);
        $req->bindValue(":id", htmlspecialchars(str_replace('<','',$updatedUser->getId())), PDO::PARAM_INT);

        $req->execute();
    }

    public function removeUser(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `user` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}
