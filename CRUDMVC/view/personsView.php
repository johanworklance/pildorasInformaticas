  
    
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post" >

        <table width="50%" border="0" align="center">
        <tr >
            <td class="primera_fila">Id</td>
            <td class="primera_fila">Nombre</td>
            <td class="primera_fila">Apellido</td>
            <td class="primera_fila">Dirección</td>
            <td class="sin">&nbsp;</td>
            <td class="sin">&nbsp;</td>
            <td class="sin">&nbsp;</td>
        </tr> 

        
        <?php foreach($matrizPersons as $persona):?>
        <tr>
            <td><?= $persona['id']?></td>
            <td><?= $persona['nombre']?></td>
            <td><?= $persona['apellido']?></td>
            <td><?= $persona['direccion']?></td>

            <td class='bot'><a href="borrar.php?id=<?= $persona['id']?>"><input type='button' name='del' id='del' value='Borrar'></a></td>

            <td class='bot'><a href="editar.php?id=<?= $persona['id']?>&nombre=<?= $persona['nombre']?>&apellido=<?= $persona['apellido']?>&direccion=<?= $persona['direccion']?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
        </tr>   
        
        <?php endforeach?>

        <tr>

            <td><input type='text' name='Nom' size='10' class='centrado'></td>
            <td><input type='text' name='Ape' size='10' class='centrado'></td>
            <td><input type='text' name=' Dir' size='10' class='centrado'></td>
            <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr> 
            <tr>
            <td colspan="4">
                <?php
                 for($i=1;$i<=$totalPaginas;$i++){

                echo "<a href='?pagina=$i'> $i </a>";//se pueden enviar numeros a la propia pagina con esa 'direccion'
                } 

                ?>
            </td>
            </tr>   
        </table>
</form>

