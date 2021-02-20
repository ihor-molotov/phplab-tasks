<?php
/**
 * TODO
 *  Open web/airports.php file
 *  Go through all airports in a loop and INSERT airports/cities/states to equivalent DB tables
 *  (make sure, that you do not INSERT the same values to the cities and states i.e. name should be unique i.e. before INSERTing check if record exists)
 */

/** @var \PDO $pdo */
require_once './pdo_ini.php';

foreach (require_once('../web/airports.php') as $item) {
    // Cities
    // To check if city with this name exists in the DB we need to SELECT it first
    $sth = $pdo->prepare('SELECT id FROM cities WHERE name = :name');
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute(['name' => $item['city']]);
    $city = $sth->fetch();

    // If result is empty - we need to INSERT city
    if (!$city) {
        $sth = $pdo->prepare('INSERT INTO cities (name) VALUES (:name)');
        $sth->execute(['name' => $item['city']]);

        // We will use this variable to INSERT airport
        $cityId = $pdo->lastInsertId();
    } else {
        // We will use this variable to INSERT airport
        $cityId = $city['id'];
    }

    // TODO States
    // States
    // To check if state with this name exists in the DB we need to SELECT it first
    $sth = $pdo->prepare('SELECT id FROM states WHERE name = :name');
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute(['name' => $item['state']]);
    $state = $sth->fetch();

    // If result is empty - we need to INSERT state
    if (!$state) {
        $sth = $pdo->prepare('INSERT INTO states (name) VALUES (:name)');
        $sth->execute(['name' => $item['state']]);

        // We will use this variable to INSERT airport
        $stateId = $pdo->lastInsertId();
    } else {
        // We will use this variable to INSERT airport
        $stateId = $state['id'];
    }

    // TODO Airports
    // Airports
    // To check if airport with this name exists in the DB we need to SELECT it first
    $sth = $pdo->prepare('SELECT id FROM airports WHERE code = :code');
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute(['code' => $item['code']]);
    $airport = $sth->fetch();

    // If result is empty - we need to INSERT airport
    if (!$airport) {
        $sth = $pdo->prepare(
            'INSERT INTO airports (name,state_id,city_id,code,address,timezone) VALUES (:name,:state_id,:city_id,:code,:address,:timezone)'
        );
        var_dump($sth);
        $sth->execute(
            [
                'name' => $item['name'],
                'code' => $item['code'],
                'address' => $item['address'],
                'timezone' => $item['timezone'],
                'city_id' => $cityId,
                'state_id' => $stateId
            ]
        );
        // We will use this variable to INSERT airport
        $airportId = $pdo->lastInsertId();
    } else {
        // We will use this variable to INSERT airport
        $airportId = $airport['id'];
    }
}