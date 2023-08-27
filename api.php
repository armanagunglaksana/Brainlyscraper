<?php

require __DIR__."/src/Brainly.php";

use Brainly\Brainly;

define("data", realpath(__DIR__."/..")."/brainly");

if (isset($_GET["q"])) {

    if (!is_string($_GET["q"])) {
    $code = 404;
    $status = "error";
    $msg = "q harus string api by cawlye";
    goto ret;
}

$code = 200;
$status = "succes";
$msg = (new Brainly($_GET["q"], 100))->exec();
} else {
    $code = 200;
    $status = "succes";
    $msg = " API by cawlye";
}

ret:
http_response_code($code);
echo json_encode(
    [
        "code" => $code,
        "status" => $status,
        "msg" => $msg,
    ]
    );