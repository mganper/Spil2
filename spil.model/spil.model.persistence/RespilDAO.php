<?php

/**
 *
 * @author pablo
 */
interface RespilDAO {

    function read($respil);

    function create($respil);

    function delete($respil);

    function listed($identificador);
}
