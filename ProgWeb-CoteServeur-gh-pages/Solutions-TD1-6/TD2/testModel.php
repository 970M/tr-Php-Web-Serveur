<?php

require_once "Model.php";

echo Model::getPDO()->getAttribute(PDO::ATTR_CONNECTION_STATUS);

?>