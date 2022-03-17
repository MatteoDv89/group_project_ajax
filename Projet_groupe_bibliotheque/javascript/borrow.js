//___________SELECTEUR____________

//FUNCTION

function delete_borrow(id) {
  $.ajax({
    url: "controller/book.controller.php?action=supprimer",
    method: "post",
    data: { id: id },
    success: function (data) {
      console.log(data);
      get_borrow();
    },
    dataType: "json",
  });
}

function update_borrow(id) {
  $(".modal").css("display", "block");
  $("#form_update span").on("click", function () {
    $(".modal").css("display", "none");
    id = null;
  });

  //recuperation des donnée utilisateur a modifier

  $.ajax({
    url: "controller/book.controller.php?action=get_book_by_id",
    method: "post",
    data: { id: id },
    success: function (data) {
      //  creation selecteur
    },
    dataType: "json",
  });

  // modification des donnnee
  $("#form_update").on("submit", function (event) {
    event.preventDefault();
    let donnee = $("#form_update").serializeArray();
    let data = [];

    $.ajax({
      url: `controller/book.controller.php?action=modifier&id=${id}`,
      method: "post",
      data: donnee,
      success: function (data) {
        console.log(data);
        get_borrow();
        id = null;
        $("#form_update")[0].reset();
        $(".modal").css("display", "none");
      },
      dataType: "json",
    });
  });
}

function get_borrow() {
  $.ajax({
    url: "controller/book.controller.php?action=get_all_borrow",
    method: "get",
    success: function (data) {
      let tab = "";
      data.forEach((book) => {
        tab += `<tr id=${book.id_book}>
                <td>${book.id_book}</td>
                <td>${book.title}</td>
                <td>${book.author}</td>                
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
            delete_borrow(id);
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
          update_borrow(id);
        })
      );
    },
    dataType: "json",
  });
}

function get_selector() {
  $.ajax({
    url: "controller/book.controller.php?action=get_selector",
    method: "get",
    success: function (data) {
      //   let tab = "";
      //   data.forEach((item) => {
      //     tab += `<tr id=${book.id_book}>
      //             <td>${book.id_book}</td>
      //             <td>${book.title}</td>
      //             <td>${book.author}</td>
      //             <td id="update_btn"><ion-icon name="pencil"></ion-icon></td>
      //             <td id="delete_btn"><ion-icon name="trash"></ion-icon></td>
      //             </tr>`;
      //   });
      //   let tbody = document.querySelector(".tbody_insert");
      //   tbody.innerHTML = tab;
      console.log(data);
    },
    dataType: "json",
  });
}

//AJAX

// au chargement de la page
$(document).ready(function () {
  //afficher tous les utilisateur
  get_borrow();
  get_selector();

  $("#form_add").on("submit", function (event) {
    let donnee = $("#form_add").serializeArray(); // creer un tableau a partir des donnee du formulaire
    event.preventDefault();

    //envoi requete ajax

    $.ajax({
      url: "controller/book.controller.php?action=ajouter",
      method: "post",
      data: donnee,
      success: function (data) {
        //affichage des abonnés

        get_borrow();
        $("#form_add")[0].reset();
      },
      dataType: "json",
    });
  });
});
