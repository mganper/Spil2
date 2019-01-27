<?php

interface Spil {

    function getId();

    function getText();

    function getIdUser();

    function getWriteDate();

    function getEditNum();

    function getAdultContent();

    function getReport();

    function setId($id);

    function setText($text);

    function setIdUser($idUser);

    function setWriteDate($writeDate);

    function setEditNum($editNum);

    function setAdultContent($adultContent);

    function setReport($report);

}
