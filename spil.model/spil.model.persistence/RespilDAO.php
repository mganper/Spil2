<?php

/**
 *
 * @author pablo
 */
interface RespilDAO {

    function read($idMensaje, $idUsuario);

    function create($idMensaje, $idUsuario);

    function delete($idMensaje, $idUsuario);

    function listed($identificador);
}
