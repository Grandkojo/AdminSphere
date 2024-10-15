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
        $this->setUniqueId($uniqueId);
        var_dump($this->getUniqueId());
        // exit;
    }
    public function signup()
    {
        try {

            $hashed_identity = password_hash($this->identity_key, PASSWORD_DEFAULT);
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

    public function getData($teacher_id)
    {
        $sql = "SELECT * FROM courses WHERE teacher_id = :teacher_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":teacher_id", $teacher_id);
        $query->execute();
        if ($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else if ($query->rowCount() < 1) {
            return "No course materials uploaded yet!";
        }
    }

    public function getAssignmentData($teacher_id)
    {
        $sql = "SELECT * FROM assignments WHERE teacher_id = :teacher_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":teacher_id", $teacher_id);
        $query->execute();
        if ($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else if ($query->rowCount() < 1) {
            return "No assignments uploaded yet!";
        }
    }

    public function getCourses($teacher_id, $targetFile)
    {
        $sql = "SELECT course_material FROM courses WHERE teacher_id = :teacher_id AND course_material = :course_material";
        $query = $this->conn->prepare($sql);
        $query->bindParam(":teacher_id", $teacher_id);
        $query->bindParam(":course_material", $targetFile);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getAssignments($teacher_id, $targetFile)
    {
        $sql = "SELECT assignment_material FROM assignments WHERE teacher_id = :teacher_id AND assignment_material = :assignment_material";

        $query = $this->conn->prepare($sql);
        $query->bindParam(":teacher_id", $teacher_id);
        $query->bindParam(":assignment_material", $targetFile);
        $query->execute();

        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }




    public function uploadMaterial($description, $department_id, $courseMaterial, $id, $fileContent)
    {
        // echo "Starting insert"; exit;
        try {
            $sql = "INSERT INTO courses (teacher_id, department_id, description, course_material, file_content) VALUES (:teacher_id, :department_id, :description, :course_material, :file_content)";
            $query = $this->conn->prepare($sql);

            $query->bindParam(":teacher_id", $id);
            $query->bindParam(":department_id", $department_id);
            $query->bindParam(":description", $description);
            $query->bindParam(":course_material", $courseMaterial);
            $query->bindParam(":file_content", $fileContent, PDO::PARAM_LOB);

            if (!$query->execute()) {
                // Fetch and display the error
                $errorInfo = $query->errorInfo();
                return false;
                // echo "SQL Error: " . $errorInfo[2];
            } else {
                return true;
                // echo "Material uploaded successfully.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function submitAssignment($instruction, $department_id, $assignmentMaterial, $id, $fileContent, $startDateTime, $dueDateTime)
    {
        // echo "Starting insert"; exit;
        try {
            $sql = "INSERT INTO assignments (teacher_id, department_id, instruction, assignment_material, file_content, start_datetime, due_datetime) VALUES (:teacher_id, :department_id, :instruction, :assignment_material, :file_content, :start_datetime, :due_datetime)";
            $query = $this->conn->prepare($sql);

            $query->bindParam(":teacher_id", $id);
            $query->bindParam(":department_id", $department_id);
            $query->bindParam(":instruction", $instruction);
            $query->bindParam(":assignment_material", $assignmentMaterial);
            $query->bindParam(":file_content", $fileContent, PDO::PARAM_LOB);
            $query->bindParam(":start_datetime", $startDateTime);
            $query->bindParam(":due_datetime", $dueDateTime);

            if (!$query->execute()) {
                // Fetch and display the error
                $errorInfo = $query->errorInfo();
                return false;
                // echo "SQL Error: " . $errorInfo[2];
            } else {
                return true;
                // echo "Material uploaded successfully.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getFileContent($course_id)
    {

        $sql = "SELECT course_material, file_content FROM courses WHERE course_id = :course_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':course_id', $course_id);
        $query->execute();

        // var_dump($query->execute()); exit;
        $file = $query->fetch(PDO::FETCH_ASSOC);

        return $file;
    }

    public function getAssignmentFileContent($assignment_id)
    {

        $sql = "SELECT assignment_material, file_content FROM assignments WHERE assignment_id = :assignment_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':assignment_id', $assignment_id);
        $query->execute();

        $file = $query->fetch(PDO::FETCH_ASSOC);

        return $file;
    }

    public function deleteFile($course_id)
    {
        // echo "Here I am"; exit;
        $sql = "DELETE FROM courses WHERE course_id = :course_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':course_id', $course_id);
        $query->execute();
        return var_dump($query->execute());
    }


    public function assignmentStatus($startDateTime, $endDateTime)
    {
        $current_datetime = new DateTime();
        $status = null;
        if ($current_datetime >= $endDateTime) {
            $status = "Elapsed";
        } else if ($current_datetime < $endDateTime) {
            $interval = date_diff($endDateTime, $current_datetime);
            $status = $interval->format("5a d %h h");
        } else if ($current_datetime < $startDateTime) {
            $status = "Pending";
        }
        return $status;
    }
}
