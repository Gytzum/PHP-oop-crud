<?php

use Models\Project;
use Models\Employee;

include_once "bootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->

    <title>Document</title>
</head>
<style>
    <?php include 'assets/styles/table.css' ?>
</style>

<table>
    <thead>
        <tr>
            <td>#</td>
            <td>Employees</td>
            <td>Projects</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>

        <?php
        //EMPLOYEES TABLE
        $count = 1;
        if ($_SERVER["REQUEST_URI"] == '/employees') {
            $employees = $entityManager->getRepository('Models\Employee')->findAll();
            foreach ($employees as $employee)
                print("<tr>"
                        . "<td>" . $count++  . "</td>"
                        . "<td>" . $employee->getName() . "</td>"
                        . "<td></td>"
                        . "<td>
                            <a href=\"?delete={$employee->getId()}\">DELETE</a>
                            <a href=\"?edit={$employee->getId()}\">EDIT</a></td>"
                    . "</tr>");
        }

        //PROJECTS TABLE
        if ($_SERVER["REQUEST_URI"] == '/projects') {
            $projects = $entityManager->getRepository('Models\Project')->findAll();
            foreach ($projects as $project) {
                $projectId = $project->getId();
                $name = '';
                $employees = $entityManager->find('Models\Project',  $projectId)->getEmployee();

                foreach ($employees as $employee) {
                    $name .= $employee->getName() . ", ";
                }

                print("<tr>"
                        . "<td>" . $count++  . "</td>"
                        . "<td>" . rtrim($name, ', ') . "</td>"
                        . "<td>" . $project->getName() . "</td>"
                        . "<td>
                            <a href=\"?delete={$project->getId()}\">DELETE</a>
                            <a href=\"?edit={$project->getId()}\">EDIT</a></td>"
                    . "</tr>");
            }
        }
        ?>
    </tbody>
</table>

</html>