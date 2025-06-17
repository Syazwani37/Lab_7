<?php
class user {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createUser($matric, $name, $password, $role) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $matric, $name, $password, $role);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getUsers() {
        $sql = "SELECT matric, name, role FROM users";
        return $this->conn->query($sql);
    }

    public function getUser($matric) {
        $sql = "SELECT * FROM users WHERE matric = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $matric);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public function updateUser($matric, $name, $role) {
        $sql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $name, $role, $matric);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function deleteUser($matric) {
        $sql = "DELETE FROM users WHERE matric = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $matric);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}