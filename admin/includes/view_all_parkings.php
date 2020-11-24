<table class="table table-bordered table-hover">
    <thead>

        <th>Id</th>
        <th>Admin</th>
        <th>Title</th>
        <th>Region</th>
        <th>Status</th>
        <th>Image</th>
        <th>Date</th>
        <th>Cost</th>
        <th>Request Count</th>
        <th>Start Time</th>
        <th>End Time</th>


    </thead>
    <!-- Creating the table body -->
    <tbody>


        <?php


        //  finding all the posts -> Parkings
        $query = "SELECT * FROM posts";
        $select_posts = mysqli_query($connection, $query);
        // Displaying the content in the db
        while ($row = mysqli_fetch_assoc($select_posts)) {
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



            echo "<tr>";
            echo "<td>{$parking_id}</td>";
            echo "<td>{$parking_admin}</td>";
            echo "<td>{$parking_title}</td>";
            echo "<td>{$parking_region}</td>";

            echo "<td>{$parking_status}</td>";
            echo "<td><img width='100' src='../images/{$parking_image}'></td>";

            echo "<td>{$parking_date}</td>";
            echo "<td >{$parking_price}</td>";
            echo "<td>{$parking_request_count}</td>";
            echo "<td >{$parking_start}</td>";
            echo "<td>{$parking_end}</td>";

            echo "</tr>";
        }

        ?>

    </tbody>


</table>