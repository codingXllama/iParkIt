<?php

if (isset($_GET['p_id'])) {
}


//  finding all the posts -> Parkings
$query = "SELECT * FROM posts";
$select_posts_by_id = mysqli_query($connection, $query);
// Displaying the content in the db
while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $parking_id = $row['post_id'];
    $parking_title = $row['post_title'];
    $parking_image = $row['post_image'];
    $parking_status = $row['post_status'];
    $parking_region = $row['post_location'];
    $parking_price = $row['post_price'];
    $parking_admin = $row['post_author'];
    $parking_request_count = $row['post_comment_count'];
    $parking_start = $row['post_start'];
    $parking_end = $row['post_end'];
    $parking_date = $row['post_date'];
}

?>




<form action="" method="post" enctype="multipart/form-data">



    <div class="form-group">
        <label for="title">Parking Title</label>
        <input value="<?php echo $parking_title; ?>" type="text" class="form-control" name="parking_title">
    </div>


    <div class="form-group">
        <label for="title">Parking Region ID</label>
        <input type="text" class="form-control" name="parking_region_id">
    </div>


    <div class="form-group">
        <label for="parking_region">Parking Region</label>
        <input value="<?php echo $parking_region; ?>" type="text" class="form-control" name="parking_region">
    </div>


    <div class="form-group">
        <label for="parking_admin">Parking Admin</label>
        <input value="<?php echo $parking_admin; ?>" type=" text" class="form-control" name="parking_admin">
    </div>

    <div class=" form-group">
        <label for="parking_status">Parking Status</label>
        <input type="text" class="form-control" name="parking_status">
    </div>



    <div class="form-group">
        <label for="parking_image">Parking Image</label>
        <input value="<?php echo $parking_image; ?>" type="file" class="form-control" name="image">
    </div>



    <!-- Start and End Time for the parking slot -->
    <div class=" form-group">
        <label for="startTime">Start Time: </label>
        <input id=" startTime" type="time" name="startTime" value="<?php echo $startTime; ?>">
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <span>
            <label for="endTime">End Time: </label>
            <input id=" endTime" type="time" name="endTime">
        </span>
    </div>




    <div class="form-group">
        <label for="title">Parking Tags</label>
        <input type="text" class="form-control" name="parking_tags">
    </div>




    <div class="form-group">

        <input type="submit" class="btn btn-primary" name="create_parking">
    </div>


</form>