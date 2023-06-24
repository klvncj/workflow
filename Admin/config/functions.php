<?php
require_once('connect.php');
function sanitize($value)
{
    return htmlentities(htmlspecialchars(trim(strip_tags($value))));
}

function signup($post)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($firstname)) {
        $firstname = sanitize($firstname);
    } else {
        $errors = "First name is required";
    }

    if (!empty($lastname)) {
        $lastname = sanitize($lastname);
    } else {
        $errors = "Last name is required";
    }

    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors = "Email is required";
    }
    if (!empty($gender)) {
        $gender = sanitize($gender);
    } else {
        $errors = "Select Your Gender";
    }
    if (!empty($department)) {
        $department = sanitize($department);
    } else {
        $errors = "Select Your Department";
    }
    if (!empty($position)) {
        $position = sanitize($position);
    } else {
        $errors = "Phone number is required";
    }


    if (!empty($password)) {
        $password;
    } else {
        $errors = "Passsword is required";
    }
    if (!empty($phone)) {
        $phone = sanitize($phone);
    } else {
        $errors = "Phone number is required";
    }


    if ($code == 'linetech') {
        $password;
    } else {
        $errors = "Incorrect code";
    }

    if (isset($_FILES['image'])) {
        $profile_pic = $_FILES['image']['name'];
        $post_tmp_name = $_FILES['image']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name, "../Admin/profile/$profile_pic");
    }


    if (!$errors) {
        $sql = "INSERT INTO staffs (firstname,lastname,email,gender,phone,department,position,password,profile_pic) VALUES ('$firstname','$lastname','$email','$gender','$phone','$department','$position','$password','$profile_pic')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }
}

function login($post)
{
    $errors = [];
    global $link;
    extract($post);

    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors[] = "email is required";
    }


    if (!empty($password)) {
        $password;
    } else {
        $errors[] = "Password is required";
    }


    if (!$errors) {
        $sql = "SELECT * FROM staffs WHERE email='$email' AND password = '$password'";
        $query = mysqli_query($link, $sql);

        if (mysqli_num_rows($query) == 1) {
            $details = mysqli_fetch_assoc($query);
            $_SESSION['user'] = $details['firstname'];
            return $details;
        } else {
            return "Invalid Email or Password";
        }
    } else {
        return $errors;
    }
}



function get_user($name)
{
    global $link;
    $sql = "SELECT * FROM staffs WHERE firstname = '$name'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    } else {
        return false;
    }
}

function UpdatePost($post, $staff_id)
{
    global $link;
    extract($post);
    $errors = [];


    if (!empty($firstname)) {
        $firstname = sanitize($firstname);
    } else {
        $errors = "First name is required";
    }

    if (!empty($lastname)) {
        $lastname = sanitize($lastname);
    } else {
        $errors = "Last name is required";
    }

    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors = "Email is required";
    }

    if (!empty($department)) {
        $department = sanitize($department);
    } else {
        $errors = "Select Your Department";
    }
    if (!empty($position)) {
        $position = sanitize($position);
    } else {
        $errors = "Phone number is required";
    }

    if (!empty($phone)) {
        $phone = sanitize($phone);
    } else {
        $errors = "Phone number is required";
    }

    $profile_pic = $post['oldimage'];

    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $profile_pic = $_FILES['image']['name'];
        $post_tmp_name = $_FILES['image']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name, "../Admin/profile/$profile_pic");
    }

    if (!$errors) {
        $sql = "UPDATE staffs SET firstname = '$firstname', lastname = '$lastname', email = '$email', department = '$department', phone = '$phone', profile_pic = '$profile_pic', position = '$position' WHERE staff_id = $staff_id";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }


}
function create_activity($post)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($activity)) {
        $activity = sanitize($activity);
    } else {
        $errors = "No Event found";
    }
    if (!empty($date)) {
        $date = sanitize($date);
    } else {
        $errors = "date isn't set";
    }

    if (!$errors) {
        $sql = "INSERT INTO activity (activity,date_time) VALUES ('$activity','$date')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }



}

function diaplay_activites()
{
    global $link;
    $sql = "SELECT * FROM activity ORDER BY activity_id DESC LIMIT 4 ";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}
function all_activites()
{
    global $link;
    $sql = "SELECT * FROM activity ORDER BY activity_id DESC ";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function all_user($user)
{
    global $link;
    $sql = "SELECT * FROM staffs WHERE firstname != '$user'  ORDER BY staff_id DESC ";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function send_message($post, $name, $user)
{
    global $link;
    extract($post);
    if (!empty($message)) {
        $sql = "INSERT INTO message (reciever,sender,message_value) VALUES ('$name','$user','$message')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }


}

function show_message($name, $user)
{
    global $link;
    $sql = "SELECT * FROM message WHERE (reciever='$name' OR reciever= '$user')  AND (sender='$name' OR sender='$user')";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return $query;
    } else {
        return false;
    }
}

function create_department($post)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($department)) {
        $department = sanitize($department);
    } else {
        $errors = "Field cannot be empty";
    }

    if (!$errors) {
        $sql = "INSERT INTO departments (department) VALUES ('$department')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }



}
function fetch_all($table)
{
    global $link;
    $sql = "SELECT * FROM $table";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function get_department()
{
    global $link;
    $sql = "SELECT * FROM departments";
    $query = mysqli_query($link, $sql);
    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function last_chated($user)
{
    global $link;
    $sql = "SELECT 
    CASE 
      WHEN sender = '$user' THEN  reciever
      ELSE sender 
    END AS chat_partner,
    MAX(created_at) AS max_created_at,
    (SELECT message_value
     FROM message 
     WHERE (sender = '$user' AND  reciever = chat_partner) OR (sender = chat_partner AND reciever = '$user') 
     ORDER BY created_at DESC 
     LIMIT 1) AS last_message,
    (SELECT sender 
     FROM message 
     WHERE (sender = '$user' AND reciever = chat_partner) OR (sender = chat_partner AND reciever = '$user') 
     ORDER BY created_at DESC 
     LIMIT 1) AS sender_name
  FROM message
  WHERE sender = '$user' OR reciever = '$user'
  GROUP BY 
    CASE 
      WHEN sender = '$user' THEN reciever
      ELSE sender 
    END
  ORDER BY max_created_at DESC";
    $query = mysqli_query($link, $sql);
    if ($query) {
        return $query;
    } else {
        return false;
    }
}

function delete($id)
{
    global $link;
    $sql = "DELETE FROM staffs WHERE staff_id = $id";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return true;
    } else {
        return false;
    }

}

function request_leave($post)
{
    global $link;
    $errors = [];
    extract($post);

    $user = sanitize($user);


    if (!empty($reason)) {
        $reason = sanitize($reason);
    } else {
        $errors = "Reqason isn't given";
    }

    if (!empty($from)) {
        $from = sanitize($from);
    } else {
        $errors = "Leave Date is not Set";
    }
    if (!empty($to)) {
        $to = sanitize($to);
    } else {
        $errors = "Return Date is Not Set";
    }

    $status = sanitize($status);

    if (!$errors) {
        try {
            $sql = "INSERT INTO `leave` (user,reason,leave_date,return_date,status) VALUES ('$user','$reason','$from',' $to','$status')";
            $query = mysqli_query($link, $sql);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    } else {
        return $errors;
    }

}

function get_leave_history($name)
{
    global $link;
    $sql = "SELECT * FROM `leave` WHERE user = '$name'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return [];
    }
}

function create_task($post)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($user)) {
        $user = sanitize($user);
    } else {
        $errors = "ERROR";
    }

    if (!empty($task)) {
        $task = sanitize($task);
    } else {
        $errors = "Task is required";
    }

    $assigned = sanitize($assigned);

    if (!$errors) {
        $sql = "INSERT INTO task (user,assigned_by,task) VALUES ('$user','$assigned','$task')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }
}

function show_personal_task($user)
{
    global $link;
    $sql = "SELECT * FROM task WHERE user = '$user' AND assigned_by = 'me'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function delete_task($id)
{
    global $link;
    $sql = "DELETE FROM task WHERE task_id = $id";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return true;
    } else {
        return false;
    }

}

function delete_act($id)
{
    global $link;
    $sql = "DELETE FROM activity WHERE activity_id = $id";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return true;
    } else {
        return false;
    }

}
function get_all_user()
{
    global $link;
    $sql = "SELECT * FROM staffs  ";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function show_recent_task($user)
{
    global $link;
    $sql = "SELECT * FROM task WHERE user = '$user' ORDER BY task_id DESC LIMIT 4";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function show_admin_task($user)
{
    global $link;
    $sql = "SELECT * FROM task WHERE user = '$user' AND assigned_by = 'admin'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function get_admin($id)
{
    global $link;
    $sql = "SELECT * FROM admin WHERE admin_id = $id";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    } else {
        return false;
    }
}

function pending_leave_num()
{
    global $link;
    $sql = "SELECT * FROM `leave` WHERE status = 'pending'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $count = mysqli_num_rows($query);
        return $count;
    } else {
        return false;
    }
}

function admin_task($post)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($user)) {
        $user = sanitize($user);
    } else {
        $errors = "ERROR";
    }

    if (!empty($task)) {
        $task = sanitize($task);
    } else {
        $errors = "Task is required";
    }

    $assigned = sanitize($assigned);

    if (!$errors) {
        $sql = "INSERT INTO task (user,assigned_by,task) VALUES ('$user','$assigned','$task')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }
}

function admin_assigned_task()
{
    global $link;
    $sql = "SELECT * FROM task WHERE assigned_by = 'admin' ORDER BY task_id DESC";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function send_report($post)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($user)) {
        $user = sanitize($user);
    } else {
        $errors = "ERROR";
    }

    if (!empty($report)) {
        $report = sanitize($report);
    } else {
        $errors = "Report Field is empty";
    }

    if (!$errors) {
        $sql = "INSERT INTO report (user,report) VALUES ('$user','$report')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            return true;
        } else {
            return false;
        }
    } else {
        return $errors;
    }
}

function show_few_report()
{
    global $link;
    $sql = "SELECT * FROM report ORDER BY report_id DESC LIMIT 2 ";
    $query = mysqli_query($link, $sql);
    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function show_all_report()
{
    global $link;
    $sql = "SELECT * FROM report ORDER BY report_id DESC";
    $query = mysqli_query($link, $sql);
    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function get_report($id)
{
    global $link;
    $sql = "SELECT * FROM report WHERE report_id = $id";
    $query = mysqli_query($link, $sql);
    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function admin_login($post)
{
    $errors = [];
    global $link;
    extract($post);

    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors[] = "email is required";
    }


    if (!empty($password)) {
        $password;
    } else {
        $errors[] = "Password is required";
    }
    if (!$errors) {
        $sql = "SELECT * FROM admin WHERE email='$email' AND password = '$password'";
        $query = mysqli_query($link, $sql);

        if (mysqli_num_rows($query) == 1) {
            $details = mysqli_fetch_assoc($query);

            //Set SESSION
            $_SESSION['admin'] = $details['admin_id'];
            return true;
        } else {
            return "Invalid Email or Password";
        }
    } else {
        return $errors;
    }
}
function allow_access($user, $url)
{
    if (!isset($user)) {
        header("Location:$url");
    }
}
function show_leave()
{
    global $link;
    $sql = "SELECT * FROM `leave` ORDER BY leave_id DESC";
    $query = mysqli_query($link, $sql);
    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function update_leave_status($post)
{
    extract($post);
    global $link;

    if (isset($id)) {
        $l_id = $id;
    }

    if (isset($status)) {
        $l_status = $status;
    }

    $sql = "UPDATE `leave` SET status = '$l_status' WHERE leave_id = $l_id";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return true;
    } else {
        return false;
    }

}