<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/models/assurance.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/brief-9/app/services/assuranceService.php");

$assuranceService = new AssuranceService();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'addAssurance') {
        $assuranceId = uniqid(mt_rand(), true);
        $name = $_POST['name'];
        $address = $_POST['address'];

        $assurance = new Assurance($assuranceId, $name, $address);

        $assuranceService->insert($assurance);

        header("Location: ../views/admin/assurance/assurance.php");
        exit;

    } else if ($_POST["action"] == "editAssurance") {
        $assuranceId = $_POST['assuranceId'];
        $name = $_POST['name'];
        $address = $_POST['address'];

        $assurance = new Assurance($assuranceId, $name, $address);

        $assuranceService->edit($assurance);

        header("Location: ../views/admin/assurance/assurance.php");
        exit;

    } else if ($_POST['action'] == "deleteAssurance") {
        $assuranceId = $_POST["deleteAssuranceId"];

        $assuranceService->delete($assuranceId);

        header("Location: ../views/admin/assurance/assurance.php");
        exit;
    }
}

$assurances = $assuranceService->display();

#----- to handle the upload of logos------
?>