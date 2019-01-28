<?php


interface RespilModel {
    
//    //enlace controlador
//    function getController();
//    function setController(RespilController $resCont);
    
    
   //funciones modelo
    function nuevoRespil( $respil);
    function obtenerRespil($respil);
    function eliminarRespil( $respil);
    function listarRespilsPorUsuario($idUsuario);
    function listarRespilsPorMensaje($idUsuario);
    
    
}
