<?php

interface RespilController {

    public function listarRespilsMensaje($idMensaje);

    public function nuevoRespilGesture($idMensaje, $idUsuario);

    public function borrarRespilGesture($idMensaje, $idUsuario);

    public function listarRespilsUsuario($idUsuario);
}
