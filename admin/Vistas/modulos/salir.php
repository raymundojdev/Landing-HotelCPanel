<?php 

//Para destruir la session utilizaremos session_destroy para que nos reedirija ala pagina iniciar session
session_destroy();

echo '<script>

	window.location = "ingreso";

</script>';
 ?>