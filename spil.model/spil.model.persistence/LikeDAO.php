<?php

/**
 *
 * @author  pablo
 */
interface LikeDAO {

    function read($idMensaje, $idUsuario);

    function create($like);

    function delete($like);

    function listed($identificador);
}
