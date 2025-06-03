<?php
require_once 'connect.php';
class Database
{
    private $conn;

    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->conn = $dbConnection->getConnection();
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    //hàm insert
    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $fields = implode("`,`", $keys);
        $values = "'" . implode("','", array_values($data)) . "'";

        $sql = "INSERT INTO `" . $table . "` (`" . $fields . "`) VALUES (" . $values . ")";
        // echo ($sql);
        // die();
        return $this->conn->query($sql);
    }
    //hàm lấy id của bản ghi vừa insert
    public function getLastInsertId() {
        return $this->conn->insert_id;
    }
    //hàm cập nhật(sửa)
    public function update($table, $data, $condition = '')
    {
        $set = '';
        foreach ($data as $key => $value)
        {
            $set .= "`$key` = '$value',";
        }
        $set = rtrim($set, ',');

        $sql = "UPDATE `$table` SET $set";
        if (!empty($condition))
        {
            $sql .= " WHERE $condition";
        }
        // echo $sql;
        return $this->conn->query($sql);
    }
    //hàm xoá
    public function delete($table, $condition = '')
    {
        $sql = "DELETE FROM `$table`";
        if (!empty($condition))
        {
            $sql .= " WHERE $condition";
        }

        return $this->conn->query($sql);
    }
    //lấy giá trị nhiều dòng
    public function getRaw($sql)
    {
        $result = $this->conn->query($sql);
        $rows = [];
        if ($result && $result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $rows[] = $row;
            }
        }
        return $rows;
    }
    // lấy giá trị 1 dòng
    public function oneRaw($sql)
    {
        $result = $this->conn->query($sql);
        $row = null;
        if ($result && $result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
        }
        return $row;
    }
    // đếm số dòng
    public function getRows($sql)
    {
        $result = $this->conn->query($sql);
        $numRows = 0;
        if ($result)
        {
            $numRows = $result->num_rows;
        }
        return $numRows;
    }
}