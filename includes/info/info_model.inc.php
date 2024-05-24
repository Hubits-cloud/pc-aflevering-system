<?php

# Makes the code strict instead of dynamic
declare (strict_types=1);

# Makes a function that takes an object and an int
function getPC(object $pdo, int $pcNummer) {

    # Prepares an sql query in this case gettin all info about a relative pc
    $query = "SELECT * FROM LånPc WHERE pcNummer = :pc;";

    # Sends in the query seperate from the data preventing an injection
    $stmt = $pdo->prepare($query);

    # Binds the value of $pcNummer to :pc
    $stmt->bindParam(":pc", $pcNummer);

    # Executes the statement
    $stmt->execute();

    # Fetches the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

# Makes a function that takes and object and an int
function updateInfo(object $pdo, int $pcNummer, string $pcInfo) {

    # Prepares a query that in this case updates the specified data
    $query = "UPDATE lånPc SET bærbarInfo = :info WHERE pcNummer = :pc;";

    # Sends in the query seperate from the data preventing an injection
    $stmt = $pdo->prepare($query);

    # Binds the value of $ to :
    $stmt->bindParam(":pc", $pcNummer);
    $stmt->bindParam(":info", $pcInfo);

    # Executes the statement
    $stmt->execute();
}