<?php
/**
 *
 * @author pablo
 */

interface LikeModel {
    
    //enlace controlador
    function getController();
    function setController(LikeController $resCont);
    
    
   //funciones modelo
    function nuevoLike(Like $respil);
    function obtenerLike($idMensaje,$idUsuario);
    function eliminarLike(Like $respil);
    function listarLikesPorUsuario($idUsuario);
    function listarLikesPorMensaje($idUsuario);
    
    
}
