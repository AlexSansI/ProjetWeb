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

        $req->bindValue(":nomArtiste", htmlspecialchars($newArtiste->getNomArtiste()), PDO::PARAM_STR);
        $req->bindValue(":style", htmlspecialchars($newArtiste->getStyle()), PDO::PARAM_STR);
        $req->bindValue(":content", htmlspecialchars($newArtiste->getContent()), PDO::PARAM_STR);
        $req->bindValue(":image", htmlspecialchars($newArtiste->getImage()), PDO::PARAM_STR);
        $req->bindValue(":music", htmlspecialchars($newArtiste->getMusic()), PDO::PARAM_STR);
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

    public function update(Artiste $updatedArtiste)
    {
        $req = $this->db->prepare("UPDATE `artiste` SET nomArtiste = :nomArtiste, style = :style, content = :content, image = :image, user_id = :user_id, music = :music WHERE id = :id");
        echo "<pre>";
        var_dump($updatedArtiste);
        echo "</pre>";
        $req->bindValue(":nomArtiste", htmlspecialchars($updatedArtiste->getNomArtiste()), PDO::PARAM_STR);
        $req->bindValue(":style", htmlspecialchars($updatedArtiste->getStyle()), PDO::PARAM_STR);
        $req->bindValue(":content", htmlspecialchars($updatedArtiste->getContent()), PDO::PARAM_STR);
        $req->bindValue(":image", htmlspecialchars($updatedArtiste->getImage()), PDO::PARAM_STR);
        $req->bindValue(":music", htmlspecialchars($updatedArtiste->getMusic()), PDO::PARAM_STR);
        $req->bindValue(":user_id", $_SESSION["userId"], PDO::PARAM_INT);
        $req->bindValue(":id", htmlspecialchars($updatedArtiste->getId()), PDO::PARAM_INT);

        $req->execute();
    }

    public function remove(int $id)
    {
        $req = $this->db->prepare("DELETE FROM `artiste` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}