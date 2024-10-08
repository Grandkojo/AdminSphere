<?php

class Teacher extends Individual
{

    public function message()
    {
        echo "I'm a lecturer!!";
    }

    public function generateUniqueId()
    {
        $uniquenumber = rand(10000, 99999);

        $sql = "SELECT COUNT(*) FROM students WHERE student_id = :student_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':student_id', $uniquenumber);
        $query->execute();

        // Fetch the count
        $count = $query->fetchColumn();
        $uniqueId = $count > 0 ? $this->generateUniqueId() : $uniquenumber;
        // var_dump($uniqueId);exit;
        $this->setUniqueId($uniqueId);
        var_dump($this->getUniqueId());
        // exit;
    }
    public function signup()
    {
        try {

            $hashed_identity = password_hash($this->identity_key, PASSWORD_DEFAULT);
            // var_dump( $this->gender); exit;
            $sql = "INSERT INTO teachers (teacher_id, name, email, gender, department_id, password) VALUES (:teacher_id, :username, :email, :gender, :department_id, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':teacher_id', $this->getUniqueId());
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':department_id', $this->department_id);
            $stmt->bindParam(':password', $hashed_identity);


            if ($stmt->execute()) {
                $_SESSION["signup_success"] = "User added successfully";
                return true;
            } else {
                $_SESSION["signup_fail"] = "Couldn't sign up, try again";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

    public function login($email, $identity_key)
    {

        $this->email = $email;
        $this->identity_key = $identity_key;
        try {
            // var_dump($this->email);exit;
            $sql = "SELECT * from teachers WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($this->identity_key, $row["password"])) {
                    $email = $row['email'];
                    $username = $row['name'];
                    $id = $row['teacher_id'];

                    return array($email, $username, $id);
                } else {
                    $_SESSION['login_error'] = "Invalid password";
                    return false;
                }
            } else {
                $_SESSION['login_error'] = "Invalid email";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function getData($teacher_id){
        echo "Yep"; exit;
        $sql = "SELECT * FROM courses WHERE teacher_id = :teacher_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":teacher_id", $teacher_id);
        $query->execute();
        var_dump($query->execute()); exit;
        if ($query->rowCount() > 0){
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else if ($query->rowCount() < 1){
            return "No course materials uploaded";
        }
    }

    public function uploadMaterial($description, $department, ...$courseMaterials) {}
}
