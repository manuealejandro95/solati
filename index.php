<?php
    require_once "controller/controller.php";
    require_once "model/model.php";
    
    ///hacemos llamado a la plantilla del proyecto.
    $vista = new MvcController();
    $vista -> inicio();