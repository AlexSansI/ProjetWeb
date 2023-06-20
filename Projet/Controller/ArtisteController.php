<?php
session_start();

class ArtisteController
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

    public function add(Artiste $newArtiste)
    {
        $req = $this->db->prepare("INSERT INTO `artiste` (nomArtiste, style, content, image, music, user_id) VALUES (:nomArtiste, :style, :content, :image, :music, :user_id)");

        $req->bindValue(":nomArtiste", htmlspecialchars(str_replace('<','',$newArtiste->getNomArtiste())), PDO::PARAM_STR);
        $req->bindValue(":style", htmlspecialchars(str_replace('<','',$newArtiste->getStyle())), PDO::PARAM_STR);
        $req->bindValue(":content", htmlspecialchars(str_replace('<','',$newArtiste->getContent())), PDO::PARAM_STR);
        $req->bindValue(":image", htmlspecialchars(str_replace('<','',$newArtiste->getImage())), PDO::PARAM_STR);
        $req->bindValue(":music", htmlspecialchars(str_replace('<','',$newArtiste->getMusic())), PDO::PARAM_STR);
        $req->bindValue(":user_id", $_SESSION["userId"], PDO::PARAM_INT);
        /* $req->bindValue(":date", $newArtiste->getDate()); */

        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `artiste` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $artiste = new Artiste($data);
        return $artiste;
    }
    
    public function getByName(string $name)
    {
      $artistes = [];
      $req = $this->db->prepare("SELECT * FROM `artiste` WHERE nomArtiste = :name");
      $req->bindValue(":name", $name, PDO::PARAM_STR);
      $req->execute();
      $datas = $req->fetchAll();
      foreach ($datas as $data) {
        $artiste = new Artiste($data);
        $artistes[] = $artiste;
      }
      return $artistes;
    }
    public function getByStyle(string $style)
    {
      $artistes = [];
      $req = $this->db->prepare("SELECT * FROM `artiste` WHERE style = :style");
      $req->bindValue(":style", $style, PDO::PARAM_STR);
      $req->execute();
      $datas = $req->fetchAll();
      foreach ($datas as $data) {
        $artiste = new Artiste($data);
        $artistes[] = $artiste;
      }
      return $artistes;
    }
    public function getById(string $id)
    {
      $artistes = [];
      $req = $this->db->prepare("SELECT * FROM `artiste` WHERE id = :id");
      $req->bindValue(":id", $id, PDO::PARAM_STR);
      $req->execute();
      $datas = $req->fetchAll();
      foreach ($datas as $data) {
        $artiste = new Artiste($data);
        $artistes[] = $artiste;
      }
      return $artistes;
    } 

    public function getAll(int $limit)
    {
        $artistes = [];
        $req = $this->db->query("SELECT * FROM `artiste` ORDER BY nomArtiste LIMIT $limit");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $artiste = new Artiste($data);
            $artistes[] = $artiste;
        }
        return $artistes;
    }

    public function updateArtiste(Artiste $updatedArtiste)
    {
        $req = $this->db->prepare("UPDATE `artiste` SET nomArtiste = :nomArtiste, style = :style, content = :content, image = :image, user_id = :user_id, music = :music WHERE id = :id");
        /*echo "<pre>";
        var_dump($updatedArtiste);
        echo "</pre>";*/
        $req->bindValue(":nomArtiste", htmlspecialchars(str_replace('<','',$updatedArtiste->getNomArtiste())), PDO::PARAM_STR);
        $req->bindValue(":style", htmlspecialchars(str_replace('<','',$updatedArtiste->getStyle())), PDO::PARAM_STR);
        $req->bindValue(":content", htmlspecialchars(str_replace('<','',$updatedArtiste->getContent())), PDO::PARAM_STR);
        $req->bindValue(":image", htmlspecialchars(str_replace('<','',$updatedArtiste->getImage())), PDO::PARAM_STR);
        $req->bindValue(":music", htmlspecialchars(str_replace('<','',$updatedArtiste->getMusic())), PDO::PARAM_STR);
        $req->bindValue(":user_id", $_SESSION["userId"], PDO::PARAM_INT);
        $req->bindValue(":id", htmlspecialchars(str_replace('<','',$updatedArtiste->getId())), PDO::PARAM_INT);

        $req->execute();
    }

    public function removeArtiste(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `artiste` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}