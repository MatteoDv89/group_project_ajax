<?php
include "../inc/spl_autoload.php";


$manager = new Book_manager();

if (isset($_GET['action']) && $_GET['action'] == "ajouter") {

    // $_POST contient toute les donnée du formulaire;   
    // on appele la function add user du manager defini ci dessus

    $manager->add_book(new Book($_POST)); // on instancie l'object user a partir du post

}

if (isset($_GET['action']) && $_GET['action'] == "modifier") {




    $updateinfo = new Book($_POST);

    $manager->update_book($updateinfo, $_GET['id']);
}

if (isset($_GET['action']) && $_GET['action'] == "supprimer") {

    $manager->delete_book(intval($_POST['id']));
}



if (isset($_GET['action']) && $_GET['action'] == "get_all_book") {

    $manager->get_all(); // on instancie l'object user a partir du post

}

if (isset($_GET['action']) && $_GET['action'] == "get_book_by_id") {

    $manager->get_book_by_id($_POST['id']); // on instancie l'object user a partir du post

}
