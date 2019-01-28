<?php

interface LikeController {

    public function listarMegustasMensaje($idMensaje);

    public function nuevoLikeGesture($idMensaje, $idUsuario);

    public function borrarLikeGesture($idMensaje, $idUsuario);

    public function listarMegustasUsuario($idUsuario);
}
