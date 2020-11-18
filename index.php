<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>



<body>

    <!-- Navigation -->
    <?php include "includes/nav.php"  ?>

    <!-- Page Content -->
    <div class="container">
        <h1 class="page-header">
            iParkIt
            <small>View Latest Parking Spot(s)</small>
            <span>
                <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                        <!-- end of search form -->
                </form>
            </span>
        </h1>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 listing" id="listing">


                <?php

                $query = "SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection, $query);

                // Displaying the content in the db 
                // Creating the logic for pulling info from the DB
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_start = $row['post_start'];
                    $post_end = $row['post_end'];
                    $post_price = $row['post_price'];




                    // Break out from PHP
                ?>

                    <div class="listingx">


                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            Location: <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                        <p>START TIME: <span><?php echo $post_start ?></span>PM</p>
                        <p>END TIME: <span><?php echo $post_end ?></span>PM</p>
                        <p>COST: <span>$<?php echo $post_price ?></span></p>
                        <hr>
                        <img class="img-responsive" width="50%" src="images/<?php
                                                                            echo $post_image  ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">RESERVE <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    </div>
                    <!-- coming back to PHP to add the end of the curly bracket of the while loop -->
                <?php } ?>







            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sideBar.php" ?>

        </div>
        <!-- /.row -->

        <hr>



    </div>
    <!-- /.container -->

    <?php include "includes/footer.php"  ?>