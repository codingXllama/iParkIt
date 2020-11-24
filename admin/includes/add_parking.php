<?php


if (isset($_POST['create_parking'])) {



    $parking_title = $_POST['parking_title'];
    $parking_admin = $_POST['parking_admin'];
    $parking_region_id = $_POST['parking_region_id'];
    $parking_status = $_POST['parking_status'];

    $parking_image = $_FILES['image']['name'];
    $parking_image_temp = $_FILES['image']['tmp_name'];
    $parking_tags = $_POST['parking_tags'];




    // $parking_start = $row['post_start'];
    // $parking_end = $row['post_end'];
    $parking_date = date('d-m-y');
    $parking_request_count = 4;


    // moving the temp img to the actual img location


    move_uploaded_file($parking_image_temp, "../images/$parking_image");


    $query = "INSERT into 
    posts (       post_category_id,        post_title,            post_author,   post_date,    post_image        ,post_tags,     post_comment_count,      post_status)";

    $query .= "Values({$parking_region_id},'{$parking_title}','{$parking_admin}',now(),
                       '{$parking_image}','{$parking_tags}',{$parking_request_count},'{$parking_status}'

    )";


    $create_parking_query = mysqli_query($connection, $query);


    // checking if the query is not happening 
    queryChecker($create_parking_query);
}


?>






<form action="" method="post" enctype="multipart/form-data">



    <div class="form-group">
        <label for="title">Parking Title</label>
        <input type="text" class="form-control" name="parking_title">
    </div>


    <div class="form-group">
        <label for="title">Parking Region ID</label>
        <input type="text" class="form-control" name="parking_region_id">
    </div>


    <div class="form-group">
        <label for="parking_region">Parking Region</label>
        <input type="text" class="form-control" name="parking_region">
    </div>


    <div class="form-group">
        <label for="parking_admin">Parking Admin</label>
        <input type="text" class="form-control" name="parking_admin">
    </div>

    <div class="form-group">
        <label for="parking_status">Parking Status</label>
        <input type="text" class="form-control" name="parking_status">
    </div>



    <div class="form-group">
        <label for="parking_image">Parking Image</label>
        <input type="file" class="form-control" name="image">
    </div>



    <div class="form-group">
        <label for="title">Parking Tags</label>
        <input type="text" class="form-control" name="parking_tags">
    </div>



    <div class="form-group">

        <input type="submit" class="btn btn-primary" name="create_parking">
    </div>


</form>