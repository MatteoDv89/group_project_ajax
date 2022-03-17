<?php
include "Connection.class.php";

class User_manager extends Connection
{

    private $pdo;

    //get user by id


    public function get_user_by_id($id)
    {





        $sql_user_by_id = $this->getBdd()->prepare("SELECT * FROM followers WHERE id_follower = :id");
        $sql_user_by_id->bindValue(':id', intval($id), PDO::PARAM_INT);
        $sql_user_by_id->execute();
        $result_userid = $sql_user_by_id->fetch();


        if (
            $sql_user_by_id->rowCount() > 0
        ) {
            echo (json_encode($result_userid));
        } else {
            echo json_encode("oups, quelque chose cloche");
        }
    }

    //get all user
    public function get_all()
    {

        $sql_get_all = $this->getBdd()->query("SELECT * FROM followers");
        $result_get_all = $sql_get_all->fetchAll();


        if (
            $sql_get_all->rowCount() > 0
        ) {
            echo (json_encode($result_get_all));
        } else {
            echo "oups, quelque chose cloche";
        }
    }


    //add user
    public function add_user(object $user_data)
    {

        $sql = $this->getBdd()->prepare("INSERT INTO followers (first_name,last_name) VALUES (:prenom,:nom)");
        $sql->bindValue(':prenom', $user_data->getFirstName(), PDO::PARAM_STR);
        $sql->bindValue(':nom', $user_data->getLastName(), PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo json_encode("utilisateur enregistré avec succes");
        } else {
            echo json_encode("oups, quelque chose cloche");
        }
    }



    //update user

    public function update_user(object $user_data, $id)
    {


        $sql_update = $this->getBdd()->prepare("UPDATE followers SET first_name = :prenom,        
                                                last_name= :nom WHERE id_follower = :id");
        $sql_update->bindValue(
            ':prenom',
            $user_data->getFirstName(),
            PDO::PARAM_STR
        );
        $sql_update->bindValue(':nom', $user_data->getLastName(), PDO::PARAM_STR);
        $sql_update->bindValue(':id', intval($id), PDO::PARAM_INT);
        $sql_update->execute();

        if ($sql_update->rowCount() > 0) {
            echo json_encode("Modification effectué avec succes");
        } else {
            // echo "oups, quelque chose cloche";
        }
    }


    //delete user

    public function delete_user(int $id)
    {

        $sql_delete = $this->getBdd()->prepare("DELETE FROM followers WHERE id_follower = :id");
        $sql_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $sql_delete->execute();

        if ($sql_delete->rowCount() > 0) {
            echo json_encode("Suppression effectué avec succes");
        } else {
            echo "Une erreur est survenue";
        }
    }
}
