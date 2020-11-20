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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Back Admin
                            <small>Manage Your Parking Lot</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->





                <!-- Category/Ticket Section -->
                <div class="col-xs-6">

                    <!-- checking if there is any data in the form -->
                    <?php if (isset($_POST['submit_title'])) {

                        $cat_title = $_POST['cat_title'];
                        $cat_status = $_POST['cat_status'];

                        // checking if the input is an empty string 

                        if (($cat_title == "" || empty($cat_title) && ($cat_status == "" || empty($cat_status)))) {
                            echo "This field should not be empty";
                        } else {
                            $query = "INSERT INTO categories(cat_title,cat_status)";
                            $query .= "VALUE('{$cat_title}','{$cat_status}')";

                            $create_category_query = mysqli_query($connection, $query);


                            // checking if the query is not happening 
                            if (!$create_category_query) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }
                        }
                    }



                    ?>






                    <!-- This form is responsible for psotinig the cat_title -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input type="text" class="form-control" name="cat_title">
                            <label for="cat_status">Add Status</label>
                            <input type="text" class="form-control" name="cat_status">
                        </div>

                        <div class="form-group">
                            <input class=" btn btn-primary" type="submit" name="submit_title" value="Add Category">
                        </div>
                    </form>
                    <!-- End of posting the cat_title -->


                    <!-- Extra form for something else -->
                    <!-- <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Something</label>
                            <input type="text" class="form-control" name="submit_status">
                        </div>

                        <div class="form-group">
                            <input class=" btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form> -->
                    <!-- end of new form -->
                </div>






                <!-- Add Category Form -->
                <div class="col-xs-6">


                    <!-- php to mySQL command is here -->
                    <?php $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($connection, $query);
                    ?>



                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Lot Location</th>
                                <th>Status</th>
                                <th>Has Paid</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            // Displaying the content in the db
                            while ($row = mysqli_fetch_assoc($select_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                $cat_status = $row['cat_status'];


                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "  <td>{$cat_status}</td>";
                                echo "<td>Yes</td>";
                                echo "<tr></tr>";
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