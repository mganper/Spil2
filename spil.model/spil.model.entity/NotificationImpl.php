<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil\spil.model\spil.model.entity\Notification.php';

class NotificationImpl implements Notification {

    /**
     *
     * @var integer Notification id (PK on BBDD).
     */
    private $idNotification;

    /**
     *
     * @var integer Id of the user that must recive the notificaiton.
     */
    private $idUser;

    /**
     *
     * @var String Notification text.
     */
    private $text;

    function __construct($idNotification, $idUser, $text) {
        $this->idNotification = $idNotification;
        $this->idUser = $idUser;
        $this->text = $text;
    }

    function getIdNotification() {
        return $this->idNotification;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getText() {
        return $this->text;
    }

    function setIdNotification($idNotification) {
        $this->idNotification = $idNotification;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setText($text) {
        $this->text = $text;
    }

}
