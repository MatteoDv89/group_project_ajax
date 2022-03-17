<?php
include "../inc/spl_autoload.php";


$manager = new Borrower_manager();

if (isset($_GET['action']) && $_GET['action'] == "ajouter") {

    // $_POST contient toute les donnée du formulaire;   
    // on appele la function add user du manager defini ci dessus

    $manager->add_borrow(new Borrower($_POST)); // on instancie l'object user a partir du post

}

if (isset($_GET['action']) && $_GET['action'] == "modifier") {




    $updateinfo = new Borrower($_POST);

    $manager->update_borrow($updateinfo, $_GET['id']);
}

if (isset($_GET['action']) && $_GET['action'] == "supprimer") {

    $manager->delete_borrow(intval($_POST['id']));
}



if (isset($_GET['action']) && $_GET['action'] == "get_all_borrow") {

    $manager->get_all(); // on instancie l'object user a partir du post

}

if (isset($_GET['action']) && $_GET['action'] == "get_borrow_by_id") {

    $manager->get_borrow_by_id($_POST['id']); 

}

if (isset($_GET['action']) && $_GET['action'] == "get_selector") {

    $manager->get_selector(); 

}
