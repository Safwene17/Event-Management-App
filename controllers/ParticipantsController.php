<?php
include_once(__DIR__ .'/../models/Participants.php');
include_once(__DIR__ .'/../database/config.php');

class ParticipantsController extends Connexion {
    function __construct() {
        parent::__construct();
    }

    public function getNumberOfParticipants($eventId) {
        $query = "SELECT COUNT(p.idClient) AS numParticipants 
                  FROM participants p
                  WHERE p.idEvent = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$eventId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['numParticipants'];
    }

    public function addParticipant($eventId, $clientId) {
        if ($this->isParticipantExist($eventId, $clientId)) {
            return false; // Client already joined the event
        }
        $query = "INSERT INTO participants (idEvent, idClient) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$eventId, $clientId]);
        return $stmt->rowCount() > 0;
    }


    public function isParticipantExist($eventId, $clientId) {
        $query = "SELECT COUNT(*) FROM participants WHERE idEvent = ? AND idClient = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$eventId, $clientId]);
        $result = $stmt->fetchColumn();
        return $result > 0;
    }

    public function removeParticipant($eventId, $clientId) {
        $query = "DELETE FROM participants WHERE idEvent = ? AND idClient = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$eventId, $clientId]);
        return $stmt->rowCount() > 0;
    }
    
}
?>
