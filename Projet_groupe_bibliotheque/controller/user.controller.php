<?php
include "../inc/spl_autoload.php";


$manager = new User_manager();

if (isset($_GET['action']) && $_GET['action'] == "ajouter") {

    // $_POST contient toute les donnée du formulaire;   
    // on appele la function add user du manager defini ci dessus

    $manager->add_user(new User($_POST)); // on instancie l'object user a partir du post

}

if (isset($_GET['action']) && $_GET['action'] == "modifier") {




    $updateinfo = new User($_POST);

    $manager->update_user($updateinfo, $_GET['id']);
}

if (isset($_GET['action']) && $_GET['action'] == "supprimer") {

    $manager->delete_user(intval($_POST['id']));
}



if (isset($_GET['action']) && $_GET['action'] == "get_all_follower") {

    $manager->get_all(); // on instancie l'object user a partir du post

}

if (isset($_GET['action']) && $_GET['action'] == "get_user_by_id") {

    $manager->get_user_by_id($_POST['id']); // on instancie l'object user a partir du post

}
