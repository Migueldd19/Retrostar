<?php

//abrimos sesion para destruirla
session_start();
session_destroy();

?>

<!--recargo la pagina y volvemos al index principal-->
<script type="text/javascript">
location.reload();    
$(".subcontenedor2").load("/html/Portada.html");

</script>