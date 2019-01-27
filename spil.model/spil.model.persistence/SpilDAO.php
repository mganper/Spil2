<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Carlos
 */
interface SpilDAO {
    function read($pk);
    function create($spil);
    function update($spil);
    function delete($spil);
    function listByUser($idUser);
}
