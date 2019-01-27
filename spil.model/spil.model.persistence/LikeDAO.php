<?php

/**
 *
 * @author  pablo
 */
interface LikeDAO {

    function read($idMensaje, $idUsuario);

    function create($idMensaje, $idUsuario);

    function delete($idMensaje, $idUsuario);

    function listed($identificador);
}
