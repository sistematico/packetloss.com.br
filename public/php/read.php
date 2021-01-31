<?php

$json = file_get_contents("chat.json");
echo json_decode($json);