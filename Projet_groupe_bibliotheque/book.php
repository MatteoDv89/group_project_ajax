<?php
include "inc/header.php";


?>
<table>
    <thead>
        <tr>
            <td>id </td>
            <td>auteur</td>
            <td>titre</td>
            <td>Modification</td>
            <td>Supression</td>
        </tr>
    </thead>
    <tbody class="tbody_insert">
        <!-- book here -->
    </tbody>
</table>

<div class="modal">

    <form action="" id="form_update" method="post">
        <span>X</span>
        <label>Titre</label>
        <input type="text" id="update_titre" name="title">
        <label>Auteur</label>
        <input type="text" id="update_author" name="author">
        <input type="submit" id="btn_submit" value="Modifier">
    </form>
</div>



<form action="" id="form_add" method="post">
    <label>Titre</label>
    <input type="text" id="titre" name="title">
    <label>Autheur</label>
    <input type="text" id="author" name="author">
    <input type="submit" id="btn_submit" value="Inscrire">
</form>







<script src="javascript/book.js"></script>
</body>

</html>