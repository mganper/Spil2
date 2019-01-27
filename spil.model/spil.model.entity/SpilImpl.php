<?php

/**
 * @author Carlos Aunion Dominguez <caundom@alu.upo.es>
 */
class SpilImpl implements Spil {

    /**
     * @var integer Message id (PK on BBDD).
     */
    private $id;

    /**
     *
     * @var String Message text content.
     */
    private $text;

    /**
     *
     * @var integer Id of the user that has written the message. 
     */
    private $idUser;

    /**
     *
     * @var Date When the message was written.
     */
    private $writeDate;

    /**
     *
     * @var integer Times that the message has been edited.
     */
    private $editNum;

    /**
     *
     * @var boolean True if the message conten adult stuffs.
     */
    private $adultContent;

    /**
     *
     * @var boolean True if this message has been reported.
     */
    private $report;

    function __construct($id, String $text, $idUser, Date $writeDate, $editNum, $adultContent, $report) {
        $this->id = $id;
        $this->text = $text;
        $this->idUsuario = $idUser;
        $this->writeDate = $writeDate;
        $this->editNum = $editNum;
        $this->adultContent = $adultContent;
        $this->report = $report;
    }

    function getId() {
        return $this->id;
    }

    function getText(): String {
        return $this->text;
    }

    function getIdUser() {
        return $this->idUsuario;
    }

    function getWriteDate(): Date {
        return $this->writeDate;
    }

    function getEditNum() {
        return $this->editNum;
    }

    function getAdultContent() {
        return $this->adultContent;
    }

    function getReport() {
        return $this->report;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setText(String $text) {
        $this->text = $text;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setWriteDate(Date $writeDate) {
        $this->writeDate = $writeDate;
    }

    function setEditNum($editNum) {
        $this->editNum = $editNum;
    }

    function setAdultContent($adultContent) {
        $this->adultContent = $adultContent;
    }

    function setReport($report) {
        $this->report = $report;
    }

}
