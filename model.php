<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'travel_agency';
$charset = 'utf8mb4';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function getAllClients()
{
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM client");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getClientById($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM client WHERE ClientID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addClient($data)
{
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO client (FullName, DomesticPassport, InternationalPassport, VisaInfo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $data['FullName'], $data['DomesticPassport'], $data['InternationalPassport'], $data['VisaInfo']);
    return $stmt->execute();
}

function updateClient($id, $data)
{
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE client SET FullName=?, DomesticPassport=?, InternationalPassport=?, VisaInfo=? WHERE ClientID=?");
    $stmt->bind_param("ssssi", $data['FullName'], $data['DomesticPassport'], $data['InternationalPassport'], $data['VisaInfo'], $id);
    return $stmt->execute();
}

function deleteClient($id)
{
    global $mysqli;
    if (hasClientDependencies($id)) {
        return false;
    }
    $stmt = $mysqli->prepare("DELETE FROM client WHERE ClientID=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function getAllTours()
{
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM tour");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getTourById($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM tour WHERE TourID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addTour($data)
{
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO tour (Countries, Cities, Purpose, HotelCategory, MealPlan, StartDate, EndDate, Transport, BaseCost) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssssd",
        $data['Countries'],
        $data['Cities'],
        $data['Purpose'],
        $data['HotelCategory'],
        $data['MealPlan'],
        $data['StartDate'],
        $data['EndDate'],
        $data['Transport'],
        $data['BaseCost']
    );
    return $stmt->execute();
}

function updateTour($id, $data)
{
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE tour SET Countries=?, Cities=?, Purpose=?, HotelCategory=?, MealPlan=?, StartDate=?, EndDate=?, Transport=?, BaseCost=? WHERE TourID=?");
    $stmt->bind_param(
        "ssssssssdi",
        $data['Countries'],
        $data['Cities'],
        $data['Purpose'],
        $data['HotelCategory'],
        $data['MealPlan'],
        $data['StartDate'],
        $data['EndDate'],
        $data['Transport'],
        $data['BaseCost'],
        $id
    );
    return $stmt->execute();
}

function deleteTour($id)
{
    global $mysqli;
    if (hasTourDependencies($id)) {
        return false;
    }
    $stmt = $mysqli->prepare("DELETE FROM tour WHERE TourID=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function getAllTrips()
{
    global $mysqli;
    $result = $mysqli->query("SELECT t.*, tour.Countries, tour.Cities FROM trip t JOIN tour ON t.TourID = tour.TourID");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getTripById($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT t.*, tour.Countries, tour.Cities FROM trip t JOIN tour ON t.TourID = tour.TourID WHERE t.TripID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addTrip($data)
{
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO trip (TourID, DepartureDate, FlightNumber) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $data['TourID'], $data['DepartureDate'], $data['FlightNumber']);
    return $stmt->execute();
}

function updateTrip($id, $data)
{
    global $mysqli;
    $stmt = $mysqli->prepare("UPDATE trip SET TourID=?, DepartureDate=?, FlightNumber=? WHERE TripID=?");
    $stmt->bind_param("isii", $data['TourID'], $data['DepartureDate'], $data['FlightNumber'], $id);
    return $stmt->execute();
}

function deleteTrip($id)
{
    global $mysqli;
    if (hasTripDependencies($id)) {
        return false;
    }
    $stmt = $mysqli->prepare("DELETE FROM trip WHERE TripID=?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function getAllToursForSelect()
{
    global $mysqli;
    $result = $mysqli->query("SELECT TourID, Countries, Cities FROM tour");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function hasClientDependencies($clientId)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM booking WHERE ClientID = ?");
    $stmt->bind_param("i", $clientId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_row();
    return $result[0] > 0;
}

function hasTourDependencies($tourId)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM trip WHERE TourID = ?");
    $stmt->bind_param("i", $tourId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_row();
    return $result[0] > 0;
}

function hasTripDependencies($tripId)
{
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM booking WHERE TripID = ?");
    $stmt->bind_param("i", $tripId);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_row();
    return $result[0] > 0;
}

function getClientCount()
{
    global $mysqli;
    $result = $mysqli->query("SELECT COUNT(*) as count FROM client");
    return $result->fetch_assoc()['count'];
}

function getTourCount()
{
    global $mysqli;
    $result = $mysqli->query("SELECT COUNT(*) as count FROM tour");
    return $result->fetch_assoc()['count'];
}

function getTripCount()
{
    global $mysqli;
    $result = $mysqli->query("SELECT COUNT(*) as count FROM trip");
    return $result->fetch_assoc()['count'];
}

function getPopularTours()
{
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM tour ORDER BY BaseCost LIMIT 4");
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>