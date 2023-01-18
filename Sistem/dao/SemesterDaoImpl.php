<?php
class SemesterDaoImpl
{
    public function fetchAllSemester()
    {
        $link = PDOUtil::createConnection();
        $query = 'SELECT semester.* FROM semester ORDER BY periode ASC';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Semester');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }


    public function fetchSemester($periode)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM semester WHERE periode = ?";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $periode);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('Semester');
    }


    public function insertNewSemester(Semester $semester)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = 'INSERT INTO semester(periode) VALUES(?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $semester->getPeriode());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function updateSemester(Semester $semester, $newPeriode)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'UPDATE semester SET periode = ? WHERE periode = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $newPeriode);
        $stmt->bindValue(2, $semester->getPeriode());
        $link->beginTransaction();

        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }

        $link = null;
        return $result;
    }


    public function deleteSemester($periode)
    {
        $result = 0;
        $link = PDOUtil::createConnection();

        $query = 'DELETE FROM semester WHERE periode = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $periode);
        $link->beginTransaction();

        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }

        $link = null;
        return $result;
    }
}
