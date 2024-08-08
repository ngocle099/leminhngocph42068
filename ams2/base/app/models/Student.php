<?php

namespace App\Models;

class Student extends BaseModel
{
    function getListStudent()
    {
        $sql = "SELECT * FROM sinh_vien";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertStudent($id, $name, $year ,$phonenumber){
        $sql = "INSERT INTO `sinh_vien` VALUES (?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $year ,$phonenumber]);
    }
    public function deleteStudent($id){
        $sql = "DELETE FROM sinh_vien WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}