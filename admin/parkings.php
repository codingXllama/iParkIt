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
                        <h2 class="page-header">
                            Parkings
                            <small>Manage Your Parking Lot</small>
                        </h2>
                    </div>
                </div>

                <!-- Creating the Parking lot table -->


                <?php

                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }


                switch ($source) {
                    case 'add_parking';
                        include "includes/add_parking.php";
                        break;

                    case '100';
                        echo "Cool";
                        break;
                    case '200';
                        echo "Amazing";
                        break;
                    case '300';
                        echo "Insane";
                        break;
                    case '400';
                        echo "Wonderful";
                        break;


                    default:
                        include "includes/view_all_parkings.php";
                }


                ?>









            </div>
            <!-- /.container-fluid -->

        </div>















        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>