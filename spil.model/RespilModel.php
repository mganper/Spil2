<?php


interface RespilModel {
    
    //enlace controlador
    function getController();
    function setController(RespilController $resCont);
    
    
   //funciones modelo
    function nuevoRespil(Respil $respil);
    function obtenerRespil($idMensaje,$idUsuario);
    function eliminarRespil(Respil $respil);
    function listarRespilsPorUsuario($idUsuario);
    function listarRespilsPorMensaje($idUsuario);
    
    
}
