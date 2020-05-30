<?php 


$upload_directory = "uploads";

function set_message($message) {

    if(!empty($message)) {

        $_SESSION['message'] = $message;
    }else {

        $message = "";
    }
}

function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location) {

header("Location: $location");
}

function query($sql) {

global $connection;

return mysqli_query($connection, $sql);
}

function confirm($result) {

global $connection;

if(!$result) {

die("QUERY_FAILED" . mysql_error($connection));
}
}

function escape_string($string) {

global $connection;

return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result) {

return mysqli_fetch_array($result);
}

/**********************************FRONT END FUNCTIONS*****************************************/

/************************************Get Room**************************************/

function get_room() {
    $query = query("SELECT * FROM room");
    confirm($query);

    $rows = mysqli_num_rows($query);

    if(isset($_GET['page'])) {

        $page = preg_replace('#[^0-9]#','',$_GET['page']);

    }else {

        $page = 1;
    }

    $perPage =  6;
    $lastPage = ceil($rows / $perPage);

    if($page < 1) {

        $page = 1;

    } elseif($page > $lastPage) {

        $page = $lastPage;
    }

    /****************************************MIDDLE NUMBERS****************************************/

    $middleNumbers = '';

    $sub1 = $page - 1;
    $sub2 = $page - 2;
    $add1 = $page + 1;
    $add2 = $page + 2;

    if($page == 1) {

        $middleNumbers .= '<li class="page-item active"><a>'. $page .'</a></li>';

        $middleNumbers .= '<li class="page-item">
        <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $add1 .'">' . $add1 . '</a></li>';

    } else if($page == $lastPage) {

        $middleNumbers .= '<li class="page-item">
        <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $sub1 .'">' . $sub1 . '</a></li>';
        
        $middleNumbers .= '<li class="page-item active"><a>'. $page .'</a></li>';

    } else if($page > 2 && $page < ($lastPage - 1)) {

        $middleNumbers .= '<li class="page-item">
        <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $sub2 .'">' . $sub2 . '</a></li>';

        $middleNumbers .= '<li class="page-item">
        <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $sub1 .'">' . $sub1 . '</a></li>';

        $middleNumbers .= '<li class="page-item active"><a>'. $page .'</a></li>';

        $middleNumbers .= '<li class="page-item">
        <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $add1 .'">' . $add1 . '</a></li>';

        $middleNumbers .= '<li class="page-item">
        <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $add2 .'">' . $add2 . '</a></li>';

        echo "<ul class='pagination'>{$middleNumbers}</ul>";

   } else if($page > 1 && $page < $lastPage) {

    $middleNumbers .= '<li class="page-item">
    <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $sub1 .'">' . $sub1 . '</a></li>';

    $middleNumbers .= '<li class="page-item active"><a>'. $page .'</a></li>';

    $middleNumbers .= '<li class="page-item">
    <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $add1 .'">' . $add1 . '</a></li>';


   }

   $limit = 'LIMIT ' . ($page - 1) * $perPage . ',' . $perPage;

   $query2 = query("SELECT * FROM room $limit");
   confirm($query2);

   $outputPagination = "";

   if($page != 1) {

    $prev = $page - 1;
     
    $outputPagination .= '<li class="page-item">
    <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $prev .'">Back</a></li>';

   }

   $outputPagination .= $middleNumbers;

   if($page != $lastPage) {

    $next = $page + 1;

    $outputPagination .= '<li class="page-item">
    <a class="page-link" href="'. $_SERVER['PHP_SELF'] .'?page='. $next .'">Next</a></li>';
   }


    

    while($row = fetch_array($query2)) {

        $room = <<<DELIMETER
        
        <div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
<a href="item.php?id={$row['room_id']}"><img src="../resources/uploads/{$row['room_image']}" alt=""></a>
<div class="caption">
    <h4 class="pull-right">&#36;{$row['room_price']}</h4>
    <h4><a href="item.php?id={$row['room_id']}">{$row['room_title']}</a>
    </h4>
    <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
    <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['room_id']}">Features</a>
</div>

</div>
</div>
DELIMETER;

echo $room;

    }

    echo "<div class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";

}

/*************************************Get Categories****************************************/

function get_categories() {

    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)) {

        $categories = <<<DELIMETER
        
         <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
        
        
DELIMETER;

echo $categories;
       
    }
}


function get_room_cat_page() {

    $query = query("SELECT * FROM room WHERE room_category_id= " . escape_string($_GET['id']) . " ");
    confirm($query);

    while($row = fetch_array($query)) {

        $room_image = display_image($row['room_image']);

        $get_room_cat_page = <<<DELIMETER
        
        <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            <img class="card-img-top" width="500" src="../resources/{$room_image}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title"><a href="product.html" title="View Product">{$row['room_title']}</a></h4>
                <p class="card-text">{$row['room_description']}</p>
                <div class="row">
                    <div class="col">
                        <p class="btn btn-danger btn-block">&#36;{$row['room_price']}</p>
                    </div>
                    <div class="col">
                        <a href="item.php?id={$row['room_id']}" class="btn btn-success btn-block">More Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
DELIMETER;

echo $get_room_cat_page;

    }

}

function login_user() {

    if(isset($_POST['submit'])) {

        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'");
        confirm($query);

        if(mysqli_num_rows($query) == 0) {

            set_message("Your Password or Username are wrong");
            redirect("login.php");

        }else {
            $_SESSION['username'] = $username;
            redirect("admin");
        }
    }
}

function send_message() {

    if(isset($_POST['submit'])) {

        $to = "iradisavljevic168@gmail.com";
        $from_name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $headers = "From: {$from_name} {$email}";

        $result = mail($to,$subject,$message,$headers);

        if(!result) {

            set_message("Sorry we couldn't send your message");
            redirect("contact.php");
        }else {

            set_message("Your message has been sent");
            redirect("contact.php");
        }
    }
}

/*************************************BACK END FUNCTIONS ********************************/


/************************ROOMS IN ADMIN ********************************/


/****************************UPLOAD PICTURE **************************************/

function display_image($picture) {

    global $upload_directory;

    return $upload_directory . DS . $picture;
}

function get_rooms_in_admin() {

    if(isset($_POST['checkBoxArray'])) {

        foreach($_POST['checkBoxArray'] as $roomValueId) {
      
            $bulk_options = $_POST['bulk_options'];

            switch($bulk_options) {
                case 'available':

        $query = query("UPDATE rooms SET room_status= '{$bulk_options}' WHERE room_id = {$roomValueId} ");
         confirm($query);

         break;

         case 'occupied':

         $query = query("UPDATE rooms SET room_status= '$bulk_options' WHERE room_id= {$roomValueId} ");
         confirm($query);
         break;

         case 'delete':

         $query = query("DELETE FROM rooms WHERE room_id= {$roomValueId} ");
         confirm($query);
         break;

         case 'clone':

            $query = query("SELECT * FROM rooms WHERE room_id = '{$roomValueId}' ");
            confirm($query);

            while($row = fetch_array($query)) {

                $room_title = $row['room_title'];
                $room_description = $row['room_description'];
                $room_price = $row['room_price'];
                $room_status = $row['room_status'];
                $room_category = $row['room_category'];
                $room_image = $row['room_image'];
            }

            $query = query("INSERT INTO rooms(room_title,room_description,room_price,room_status,room_category,room_image)
            VALUES('{$room_title}','{$room_description}','{$room_price}','{$room_status}','{$room_category}','{$room_image}')");
            confirm($query);

        break;
                    
            }
        }
      }
  

    $query = query("SELECT * FROM rooms ORDER BY room_id DESC");
    confirm($query);

    while($row = fetch_array($query)) {

     $room_category = show_room_category_title_in_rooms($row['room_category']);

      $room_image =  display_image($row['room_image']);

        $rooms = <<<DELIMETER

        <tr>
        <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value={$row['room_id']}></td>
        <td>{$row['room_id']}</td>
        <td>{$row['room_title']}</td>
        <td>{$row['room_description']}</td>
        <td>{$row['room_price']}</td>
        <td>{$row['room_status']}</td>
        <td>{$room_category}</td>
        <td><img width='100' src="../../resources/{$room_image}" alt=""></td>
        <td><a onClick="javascript: return confirm('Are you sure you want to delete this room?')"; class='btn btn-danger' href="../../resources/templates/back/delete_room.php?id={$row['room_id']}"><i class='fas fa-trash'></i></a></td>
        <td><a class='btn btn-info' href="index.php?edit_room&id={$row['room_id']}"><i class='fas fa-edit'></i></a></td>
        
        </tr>
        
        
        
DELIMETER;

echo $rooms;

    }
}

/****************Show Room Category in View Rooms*************************/

 function show_room_category_title_in_rooms($room_category) {

     $cat_query = query("SELECT * FROM categories WHERE cat_id = '{$room_category}' ");
       confirm($cat_query);

       while($category_row = fetch_array($cat_query)) {

          return $category_row['cat_title'];
       }


}

/****************************** Add Rooms in Admin **************************************/

function add_room_in_admin() {

    if(isset($_POST['publish'])) {

        $room_title = escape_string($_POST['room_title']);
        $room_description = escape_string($_POST['room_description']);
        $room_price = escape_string($_POST['room_price']);
        $room_status = escape_string($_POST['room_status']);
        $room_category = escape_string($_POST['room_category']);
        $room_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $room_image);

        $query = query("INSERT INTO rooms(room_title,room_description,room_price,room_status,room_category,room_image)
        VALUES('{$room_title}','{$room_description}','{$room_price}','{$room_status}','{$room_category}','{$room_image}')");
        confirm($query);
        set_message("New Room was reserved");
        redirect("index.php?rooms");


    }
}

/***************************************EDIT ROOM IN ADMIN*************************/

function edit_room_in_admin() {

    if(isset($_POST['edit'])) {
        
        $room_title = escape_string($_POST['room_title']);
        $room_description = escape_string($_POST['room_description']);
        $room_price = escape_string($_POST['room_price']);
        $room_size = escape_string($_POST['room_size']);
        $room_category = escape_string($_POST['room_category']);
        $room_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $room_image);

       $query = "UPDATE rooms SET ";
       $query .= "room_title = '{$room_title}', ";
       $query .= "room_description = '{$room_description}', ";
       $query .= "room_price = '{$room_price}', ";
       $query .= "room_size = '{$room_size}', ";
       $query .= "room_category = '{$room_category}', ";
       $query .= "room_image = '{$room_image}' ";
       $query .= "WHERE room_id=" . escape_string($_GET['id']);

       $send_update_query = query($query);
        confirm($send_update_query);
        set_message("New Room was edit");
        redirect("index.php?rooms");

    }
}


function show_room_category_in_add_room() {

    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)) {

$category_options = <<<DELIMETER
       
<option value="{$row['cat_id']}">{$row['cat_title']}</option> 
       
DELIMETER;

echo $category_options;

    }

}

/*******************************SHOW CATEGORIES IN ADMIN**************************/

function show_categories_in_admin() {

    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)) {

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        $category = <<<DELIMETER
        
    <tr>
    <td>{$cat_id}</td>
    <td>{$cat_title}</td>
    <td><a class='btn btn-danger' href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><i class='fas fa-trash'></i></a></td>
    </tr>    
        
DELIMETER;

echo $category;
    }
}

function add_category_in_admin() {

    if(isset($_POST['add_category'])) {

    $cat_title = escape_string($_POST['cat_title']);

    if(empty($cat_title) || $cat_title == " ") {

        echo "<p class='bg-danger'>THIS CANNOT BE EMPTY </p>";

    } else {

    $query = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
    confirm($query);
    set_message("Category created successfully");

    }

    }
}

/***********************************SHOW USERS IN ADMIN************************************/

function display_users_in_admin() {

    $query = query("SELECT * FROM users");
    confirm($query);

    while($row = fetch_array($query)) {

        $user_id = $row['user_id'];
        $username = $row['username'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $password = $row['password'];
        
       

    $users = <<<DELIMETER

    <tr>

<td>{$user_id}</td>
<td>{$username}</td>
<td>{$first_name}</td>
<td>{$last_name}</td>
<td>{$email}</td>
<td>{$password}</td>
<td><a class='btn btn-danger' href="../../resources/templates/back/delete_user.php?id={$row['user_id']}"><i class='fas fa-trash'></i></a></td>
</tr>
        
        
        
DELIMETER;

echo $users;

    }


}


/*******************ADD USER IN ADMIN****************************/

function add_user_in_admin() {

    
   


    if(isset($_POST['add_user'])) {

        $username = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $first_name = escape_string($_POST['first_name']);
        $last_name = escape_string($_POST['last_name']);
        $password = escape_string($_POST['password']);

        $data['message'] = $username;

        $pusher->trigger('notifications', 'new_user', $data);
        
      //  $user_photo = escape_string($_FILES['file']['name']);
       // $temp_photo = escape_string($_FILES['file']['tmp_name']);

       // move_uploaded_file($temp_photo, UPLOAD_DIRECTORY . DS . $user_photo);

       $select_randsalt_query = query("SELECT randSalt FROM users");
       confirm($select_randsalt_query);

       $row = fetch_array($select_randsalt_query);

       $randSalt = $row['randSalt'];

       $password = crypt($password, $randSalt);

        $query = query("INSERT INTO users(username,email,first_name,last_name,password,user_photo) VALUES('{$username}','{$email}','{$first_name}','{$last_name}','{$password}','{$user_photo}')");
        confirm($query);
        set_message("User has been added");
        redirect("index.php?users");

    }

}

/*********************DISPLAYING RESERVATIONS***********************************/

function display_reservations() {

    $query = query("SELECT * FROM reservations");
    confirm($query);

    while($row = fetch_array($query)) {

        $reservation_id = $row['reservation_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $arrival = $row['arrival'];
        $departure = $row['departure'];
        $number_of_adults = $row['number_of_adults'];
        $number_of_kids = $row['number_of_kids'];
        $number_of_nights_at_hotel = $row['number_of_nights_at_hotel'];

        $reservations = <<<DELIMETER

        <tr>
        <td>{$reservation_id}</td>
        <td>{$first_name}</td>
        <td>{$last_name}</td>
        <td>{$arrival}</td>
        <td>{$departure}</td>
        <td>{$number_of_adults}</td>
        <td>{$number_of_kids}</td>
       <td>{$number_of_nights_at_hotel}</td>
    </tr>
        
        
        
DELIMETER;

echo $reservations;

    }

}

function add_reservation_in_admin() {


    if(isset($_POST['add_reservation'])) {

        $first_name = escape_string($_POST['first_name']);
        $last_name = escape_string($_POST['last_name']);
        $arrival = escape_string($_POST['arrival']);
        $departure = escape_string($_POST['departure']);
        $number_of_adults = escape_string($_POST['number_of_adults']);
        $number_of_kids = escape_string($_POST['number_of_kids']);
        $number_of_nights_at_hotel = escape_string($_POST['number_of_nights_at_hotel']);

        $query = query("INSERT INTO reservations(first_name,last_name,arrival,departure,number_of_adults,number_of_kids,number_of_nights_at_hotel)
        VALUES('{$first_name}','{$last_name}','{$arrival}','{$departure}','{$number_of_adults}','{$number_of_kids}','{$number_of_nights_at_hotel}')");
        confirm($query);
        set_message("Reservation successfully added");
        redirect("index.php?reservations");
    }

}


/**********************************SLIDES FUNCTIONS************************************/


function get_slides() {

    $query = query("SELECT * FROM slides");
    confirm($query);

    while($row = fetch_array($query)) {

$slide_image = display_image($row['slide_image']);

$slides = <<<DELIMETER
        
<div class="item">
<img  class="slide-image" src="../resources/{$slide_image}" alt="">
</div>    
        
DELIMETER;

echo $slides;
    }

}

function get_active_slide() {

    $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm($query);

    while($row = fetch_array($query)) {

        $slide_image = display_image($row['slide_image']);

        $active_slide = <<<DELIMETER

        <div class="item active">
        <img class="slide-image" src="../resources/{$slide_image}" alt="">
        </div>    
                 
        
        
DELIMETER;

echo $active_slide;
    }

}

function add_slides() {

    if(isset($_POST['add_slide'])) {

        $slide_title = escape_string($_POST['slide_title']);
        $slide_image = escape_string($_FILES['file']['name']);
        $slide_temp_loc = escape_string($_FILES['file']['tmp_name']);

        if(empty($slide_title) || empty($slide_image)) {

         echo "<p class='bg-danger'>This fields cannot be empty</p>";

        } else {

            move_uploaded_file($slide_temp_loc, UPLOAD_DIRECTORY . DS . $slide_image);
        }

        $query = query("INSERT INTO slides(slide_title,slide_image) VALUES('{$slide_title}','{$slide_image}')");
        confirm($query);
        set_message("Slide added successfully");
        redirect("index.php?slides");
    }

}



function get_current_slide_in_admin() {

    $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm($query);

    while($row = fetch_array($query)) {

        $slide_image = display_image($row['slide_image']);

        $current_slide = <<<DELIMETER
        
       
        <img class="img-responsive" src="../../resources/{$slide_image}" alt="">
           
                
        
DELIMETER;

echo $current_slide;

    }

}

function get_slide_thumbnails_in_admin() {

    $query = query("SELECT * FROM slides ORDER BY slide_id ASC");
    confirm($query);

    while($row = fetch_array($query)) {

        $slide_image = display_image($row['slide_image']);

        $slide_thumbnails = <<<DELIMETER

        <div class="col-xs-6 col-md-3 image_container">
<a href="../../resources/templates/back/delete_slide.php?id={$row['slide_id']}">
<img  class="img-responsive slide_image" src="../../resources/{$slide_image}" alt="">
</a>

<div class="caption">
<p>{$row['slide_title']}</p>
</div>

</div>
        
        
DELIMETER;

echo $slide_thumbnails;

    }

}




?>