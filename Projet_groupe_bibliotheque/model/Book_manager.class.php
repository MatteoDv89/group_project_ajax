<?php
include "Connection.class.php";

class Book_manager extends Connection
{

    private $pdo;

    //get book by id


    public function get_book_by_id($id)
    {





        $sql_book_by_id = $this->getBdd()->prepare("SELECT * FROM book WHERE id_book = :id");
        $sql_book_by_id->bindValue(':id', intval($id), PDO::PARAM_INT);
        $sql_book_by_id->execute();
        $result_bookid = $sql_book_by_id->fetch();


        if (
            $sql_book_by_id->rowCount() > 0
        ) {
            echo (json_encode($result_bookid));
        } else {
            echo json_encode("oups, quelque chose cloche");
        }
    }

    //get all book
    public function get_all()
    {

        $sql_get_all = $this->getBdd()->query("SELECT * FROM book");
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
    public function add_book(object $book_data)
    {

        $sql = $this->getBdd()->prepare("INSERT INTO book (author,title) VALUES (:author,:title)");
        $sql->bindValue(':author', $book_data->getAuthor(), PDO::PARAM_STR);
        $sql->bindValue(':title', $book_data->getTitle(), PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo json_encode("livre enregistré avec succes");
        } else {
            echo json_encode("oups, quelque chose cloche");
        }
    }



    //update book

    public function update_book(object $book_data, $id)
    {


        $sql_update = $this->getBdd()->prepare("UPDATE book SET author = :author,        
                                                title= :title WHERE id_book = :id");
        $sql_update->bindValue(
            ':author',
            $book_data->getAuthor(),
            PDO::PARAM_STR
        );
        $sql_update->bindValue(':title', $book_data->getTitle(), PDO::PARAM_STR);
        $sql_update->bindValue(':id', intval($id), PDO::PARAM_INT);
        $sql_update->execute();

        if ($sql_update->rowCount() > 0) {
            echo json_encode("Modification effectué avec succes");
        } else {
            // echo "oups, quelque chose cloche";
        }
    }


    //delete book

    public function delete_book(int $id)
    {

        $sql_delete = $this->getBdd()->prepare("DELETE FROM book WHERE id_book = :id");
        $sql_delete->bindValue(':id', $id, PDO::PARAM_INT);
        $sql_delete->execute();

        if ($sql_delete->rowCount() > 0) {
            echo json_encode("Suppression effectué avec succes");
        } else {
            echo "Une erreur est survenue";
        }
    }
}
