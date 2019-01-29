<?php

interface ConfigurationController {

    function createConfiguration($idUsuario, $temaOscuro, $privacidadSpils, $modoAdulto);

    function modifyConfiguration($idUsuario, $temaOscuro, $privacidadSpils, $modoAdulto);

    function getConfiguration($idUsuario);

    function deleteConfiguration($idUsuario);
}
