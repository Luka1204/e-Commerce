<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>categoria/save" method="POST">
    <label for="txtNombreC">Nombre</label>
    <input type ="text" name="txtNombreC" id ="txtNombreC" required="required">

    <input type ="submit" value="Guardar">
</form>
