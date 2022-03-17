<?php
include "Connection.class.php";

class Borrower_manager extends Connection
{

    private $pdo;

    //get book by id


    public function get_borrow_by_id($id)
    {





        $sql_borrow_id = $this->getBdd()->prepare("SELECT * FROM history WHERE id_book = :id");
        $sql_borrow_id->bindValue(':id', intval($id), PDO::PARAM_INT);
        $sql_borrow_id->execute();
        $result_borrow_id = $sql_borrow_id->fetch();


        if (
            $sql_borrow_id->rowCount() > 0
        ) {
            echo (json_encode($result_borrow_id));
        } else {
            echo json_encode("oups, quelque chose cloche");
        }
    }

    //get all book
    public function get_all()
    {

        $sql_get_all = $this->getBdd()->query("SELECT * FROM history");
        $result_get_all = $sql_get_all->fetchAll();


        if (
            $sql_get_all->rowCount() > 0
        ) {
            echo (json_encode($result_get_all));
        } else {
            echo "oups, quelque chose cloche";
        }
    }


    //add book
    public function add_borrow(object $borrow_data)
    {

        $sql = $this->getBdd()->prepare("INSERT INTO history (id_borrower,id_book,borrowed_date) VALUES (:id_borrower,:id_book, :date)");
        $sql->bindValue(':id_borrower', $borrow_data->getId_follower(), PDO::PARAM_STR);
        $sql->bindValue(':id_book', $borrow_data->getId_book(), PDO::PARAM_STR);
        $sql->bindValue(':date', $borrow_data->getDate(), PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo json_encode("livre enregistré avec succes");
        } else {
            echo json_encode("oups, quelque chose cloche");
        }
    }



    //update book

    public function update_borrow(object $borrow_data, $id)
    {


        $sql_update = $this->getBdd()->prepare("UPDATE history SET id_borrower = :follower,        
                                                id_book= :book WHERE id_history = :id");
        $sql_update->bindValue(
            ':follower',
            $borrow_data->getId_follower(),
            PDO::PARAM_STR
        );
        $sql_update->bindValue(':book', $borrow_data->getId_book(), PDO::PARAM_STR);
        $sql_update->bindValue(':id', intval($id), PDO::PARAM_INT);
        $sql_update->execute();

        if ($sql_update->rowCount() > 0) {
            echo json_encode("Modification effectué avec succes");
        } else {
            // echo "oups, quelque chose cloche";
        }
    }


    //delete book

    public function delete_borrow(int $id)
    {

        $sql_delete = $this->getBdd()->prepare("DELETE FROM history WHERE id_history = :id");
        $sql_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $sql_delete->execute();

        if ($sql_delete->rowCount() > 0) {
            echo json_encode("Suppression effectué avec succes");
        } else {
            echo "Une erreur est survenue";
        }
    }

    public function get_selector()
    {
        $sql_select = $this->getBdd()->query("SELECT follower.*,book.* FROM follower 
                                                INNER JOIN book");
        $result_selector = $sql_select->fetchAll();

        echo json_encode($result_selector);
    }
}
