<?php

interface SpilController {

    function write($text, $idUser, $writeDate, $adultContent);

    function listMsgs($idUser);

    function report($pk);

    function edit($idSpil, $text);

    function delete($idSpil);

    function read($idSpil);
    
}
