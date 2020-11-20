<?php include "includes/admin_header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation section  -->
        <?php include "includes/admin_nav.php" ?>
        <!-- End of Navigation  -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="page-header">
                            Welcome Back Admin
                            <small>Manage Your Parking Lot</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->





                <!-- Category/Ticket Section -->
                <div class="col-xs-3">

                    <!-- checking if there is any data in the form -->
                    <?php if (isset($_POST['submit_title'])) {

                        $cat_title = $_POST['cat_title'];
                        $cat_status = $_POST['cat_status'];
                        $lot_size = $_POST['lot_size'];

                        // checking if the input is an empty string 

                        if (($cat_title == "" || empty($cat_title) && ($cat_status == "" || empty($cat_status)) && ($lot_size == "" || empty($lot_size)))) {
                            echo "This field should not be empty";
                        } else {
                            $query = "INSERT INTO categories(cat_title,cat_status,lot_size)";
                            $query .= "VALUE('{$cat_title}','{$cat_status}','{$lot_size}')";

                            $create_category_query = mysqli_query($connection, $query);


                            // checking if the query is not happening 
                            if (!$create_category_query) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }
                        }
                    }



                    ?>






                    <!-- This form is responsible for posting/ adding Parking region -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Location</label>
                            <input type="text" class="form-control" name="cat_title">
                            <label for="cat_status">Add Status</label>
                            <input type="text" class="form-control" name="cat_status">
                            <label for="lot_size">Add Lot Size</label>
                            <input type="number" class="form-control" name="lot_size">
                        </div>

                        <div class="form-group">
                            <input class=" btn btn-primary" type="submit" name="submit_title" value="Add Location">
                        </div>
                    </form>
                    <!-- End of adding a parking region -->


                    <!-- adding in the Update region section -->
                    <?php

                    if (isset($_GET['edit'])) {
                        $cat_id = $_GET['edit'];
                        include "includes/region_update.php";
                    }

                    ?>

                </div>




                <!-- Add Category Form -->
                <div class="col-xs-6">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Lot Location</th>
                                <th>Status</th>
                                <th>Lot Size</th>
                            </tr>
                        </thead>
                        <tbody>


                            <!-- php content goes here -->

                            <?php


                            //  finding all the categories/regions 
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $query);
                            // Displaying the content in the db
                            while ($row = mysqli_fetch_assoc($select_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                $cat_status = $row['cat_status'];
                                $lot_size = $row['lot_size'];


                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo " <td>{$cat_status}</td>";
                                echo "<td>{$lot_size}</td>";
                                // Creating the delete get super global, value and key pair to remove a cat_id (parking_location)
                                //the key name is delete
                                echo "<td><a href='categories.php?delete={$cat_id}'>Remove Region</a></td>";
                                echo "<td><a href='categories.php?edit={$cat_id}'>Edit Region</a></td>";
                                echo "<tr></tr>";
                            }

                            ?>



                            <?php

                            if (isset($_GET['delete'])) {
                                $the_cat_id = $_GET['delete'];


                                // using mySQL command via php
                                $query = "DELETE from categories  WHERE cat_id={$the_cat_id}";
                                $delete_query = mysqli_query($connection, $query);
                                // refresh the page 
                                header("Location: categories.php");
                            }












                            ?>


                            <tr>
                                <!-- <td>1</td>
                                <td>London Region</td>
                                <td>Taken</td>
                                <td>Yes</td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>












            </div>
            <!-- /.container-fluid -->

        </div>















        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>