<?php

interface ConfigurationDAO {

    function read($pk);

    function create($configuration);

    function update($configuration);

    function delete($pk);
    
}
