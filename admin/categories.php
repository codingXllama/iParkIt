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

                    <!-- Insert region function -->
                    <?php insert_regions(); ?>






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


                    <!-- Adding in the Update region section -->
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


                            <!-- Finding the regions -->
                            <?php FindAllRegions();     ?>




                            <!-- Deleting the regions -->
                            <?php deleteRegion(); ?>


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