//___________SELECTEUR____________

//FUNCTION

function delete_follower(id) {
  $.ajax({
    url: "controller/user.controller.php?action=supprimer",
    method: "post",
    data: { id: id },
    success: function (data) {
      console.log(data);
      get_followers();
    },
    dataType: "json",
  });
}

function update_follower(id) {
  $(".modal").css("display", "block");
  $("#form_update span").on("click", function () {
    $(".modal").css("display", "none");
    id = null;
  });

  //recuperation des donnée utilisateur a modifier

  $.ajax({
    url: "controller/user.controller.php?action=get_user_by_id",
    method: "post",
    data: { id: id },
    success: function (data) {
      $("#update_firstname").val(data.first_name);
      $("#update_lastname").val(data.last_name);
    },
    dataType: "json",
  });

  // modification des donnnee
  $("#form_update").on("submit", function (event) {
    event.preventDefault();
    let donnee = $("#form_update").serializeArray();
    let data = [];

    $.ajax({
      url: `controller/user.controller.php?action=modifier&id=${id}`,
      method: "post",
      data: donnee,
      success: function (data) {
        console.log(data);
        get_followers();
        id = null;
        $("#form_update")[0].reset();
        $(".modal").css("display", "none");
      },
      dataType: "json",
    });
  });
}

function get_followers() {
  $.ajax({
    url: "controller/user.controller.php?action=get_all_follower",
    method: "get",
    success: function (data) {
      let tab = "";
      data.forEach((user) => {
        tab += `<tr id=${user.id_follower}>
                <td>${user.id_follower}</td>
                <td>${user.first_name}</td>
                <td>${user.last_name}</td>
                <td>Livre</td>
                <td id="update_btn"><ion-icon name="pencil"></ion-icon></td>
                <td id="delete_btn"><ion-icon name="trash"></ion-icon></td>
                </tr>`;
      });
      let tbody = document.querySelector(".tbody_insert");
      tbody.innerHTML = tab;

      //addeventlistener on each trash icon
      let alltrash = document.querySelectorAll("#delete_btn");
      alltrash.forEach((trash) =>
        trash.addEventListener("click", function (event) {
          let id = this.parentElement.id;
          if (confirm("voulez-vous supprimez?")) {
            delete_follower(id);
          } else {
            return false;
          }
        })
      );

      //add event listener on pencil icon
      let allpen = document.querySelectorAll("#update_btn");
      allpen.forEach((pen) =>
        pen.addEventListener("click", function (event) {
          let id = this.parentElement.id;
          update_follower(id);
        })
      );
    },
    dataType: "json",
  });
}

//AJAX

// au chargement de la page
$(document).ready(function () {
  //afficher tous les utilisateur
  get_followers();

  $("#form_add").on("submit", function (event) {
    let donnee = $("#form_add").serializeArray(); // creer un tableau a partir des donnee du formulaire
    event.preventDefault();

    //envoi requete ajax

    $.ajax({
      url: "controller/user.controller.php?action=ajouter",
      method: "post",
      data: donnee,
      success: function (data) {
        //affichage des abonnés
        get_followers();
        $("#form_add")[0].reset();
      },
      dataType: "json",
    });
  });
});
