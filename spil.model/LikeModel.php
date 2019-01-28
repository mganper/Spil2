<?php
/**
 *
 * @author pablo
 */

interface LikeModel {
    
//    //enlace controlador
//    function getController();
//    function setController(LikeController $resCont);
    
    
   //funciones modelo
    function nuevoLike( $respil);
    function obtenerLike($idMensaje,$idUsuario);
    function eliminarLike( $respil);
    function listarLikesPorUsuario($idUsuario);
    function listarLikesPorMensaje($idUsuario);
    
    
}
