<?php
// Assuming this PHP script is at data.php
$data = [
    [
        "id" => 1,
        "name" => "Valera",
        "last_name" => "Vlajnii",
        "price" => 200,
        "job" => "Slave"
    ],
    [
        "id" => 2,
        "name" => "Jora",
        "last_name" => "Heuiok",
        "price" => 300,
        "job" => "Master"
    ],
    [
        "id" => 3,
        "name" => "Anjela",
        "last_name" => "Keda",
        "price" => 300,
        "job" => "Miner"
    ],
    [
        "id" => 4,
        "name" => "Ket",
        "last_name" => "Kit",
        "price" => 200,
        "job" => "Slave"
    ],
    [
        "id" => 5,
        "name" => "Jenea",
        "last_name" => "Sociopat",
        "price" => 500,
        "job" => "Chad"
    ]
];

header('Content-Type: application/json');
echo json_encode($data);
?>