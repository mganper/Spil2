<?php

interface SpilModel {

    function getController();

    function setController($controller);

    function listByUser($idUser);

    function newSpil($spil);

    function getSpil($id);

    function updateSpil($spil);

    function deleteSpil($spil);
    
    function report($spil);
}
