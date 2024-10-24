<?php
include_once(__DIR__.'/../models/Event.php') ;
include_once(__DIR__.'/../database/config.php');



class EventController extends Connexion{


    public function insertEvent(Event $e): bool {
        $query = "INSERT INTO `events` (`title`, `description`, `date`, `localisation`, `valid`, `capacity`, `duration`, `idCategory`, `idClient`, `image`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);
    
        $aryy = [
            $e->getTitle(),
            $e->getDescription(),
            $e->getDate()->format('Y-m-d'), // Ensure date is formatted correctly
            $e->getLocalisation(),
            $e->getValid(),
            $e->getCapacity(),
            $e->getDuration(),
            $e->getIdCategory(),
            $e->getIdClient(),
            $e->getImage(), // Assuming getImage() returns the image path
        ];
    
        return $res->execute($aryy);
    }
    
    
    
    
      
    public function listEvent($categoryId = null): array {

        $query = "SELECT e.*, c.firstName, c.lastName, ca.nameCategory 
                  FROM events e 
                  JOIN client c ON e.idClient = c.idClient
                  JOIN category ca ON e.idCategory = ca.idCategory
                  WHERE e.valid = 1";
            if ($categoryId) {
            $query .= " AND e.idCategory = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$categoryId]);
        } else {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
        }
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    function listEventDetailed()
    {
            $query = "select * from events e ,client c , category ca
            where e.idClient = c.idClient and e.idCategory = ca.idCategory ";
            $res=$this->pdo->prepare($query);
            $res->execute();
            return $res;
    }

    
        function getEvent($id){
            $query="SELECT e.*, c.firstName, c.lastName, ca.nameCategory 
            FROM events e 
            JOIN client c ON e.idClient = c.idClient
            JOIN category ca ON e.idCategory = ca.idCategory
            WHERE e.idEvent = ?";;
            $res = $this->pdo->prepare($query);
            $res->execute(array($id));
            $array= $res->fetch();
            return $array;
        }



    
        public function deleteEvent($idEvent) {
            $query = "DELETE FROM events WHERE idEvent = ?";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([$idEvent]);
        }

        public function updateEvent(Event $e) {
            $sql = "UPDATE events SET title=?, description=?, date=?, localisation=?, valid=?, capacity=?, duration=?, image=? WHERE idEvent=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(
                $e->getTitle(),
                $e->getDescription(),
                $e->getDate()->format('Y-m-d'),
                $e->getLocalisation(),
                $e->getValid(),
                $e->getCapacity(),
                $e->getDuration(),
                $e->getImage(),
                $e->getIdEvent()
            ));
            return $stmt->rowCount() > 0; 
        }
    
    
        


        public function validateEvent($id) {
            $query = "UPDATE events SET valid = 1 WHERE idEvent = ?";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([$id]);
        }

        public function cancelEventValidation($idEvent) {
            $query = "UPDATE events SET valid = 0 WHERE idEvent = ?";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([$idEvent]);
        }
        

}
?>