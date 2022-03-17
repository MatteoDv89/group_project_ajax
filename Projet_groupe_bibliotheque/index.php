<?php
include "inc/header.php";


?>
<div class="modal">

    <form action="" id="form_update" method="post">
        <span>X</span>
        <label>First name</label>
        <input type="text" id="update_firstname" name="firstname">
        <label>Last name</label>
        <input type="text" id="update_lastname" name="lastname">
        <input type="submit" id="btn_submit" value="Modifier">
    </form>
</div>

<table>
    <thead>
        <tr>
            <td>id </td>
            <td>Name</td>
            <td>Livre</td>
            <td>Modification</td>
            <td>Supression</td>
        </tr>
    </thead>
    <tbody class="tbody_insert"></tbody>
</table>


<form action="" id="form_add" method="post">
    <label>First name</label>
    <input type="text" id="firstname" name="firstname">
    <label>Last Name</label>
    <input type="text" id="lastname" name="lastname">
    <input type="submit" id="btn_submit" value="Inscrire">
</form>







<script src="javascript/user.js"></script>
</body>

</html>