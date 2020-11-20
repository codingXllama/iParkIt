<!-- Start of Editing Region Section-->
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title"></label>
        <!-- <input type="text" class="form-control" name="cat_title"> -->
        <label for="cat_status"></label>
        <!-- <input type="text" class="form-control" name="cat_status"> -->
        <label for="lot_size"></label>
        <!-- <input type="number" class="form-control" name="lot_size"> -->

        <?php

        if (isset($_GET['edit'])) {

            $cat_id = $_GET['edit'];


            //  finding all the categories/regions 
            $query = "SELECT * FROM categories where cat_id = $cat_id";
            $select_categories_id = mysqli_query($connection, $query);
            // Displaying the content in the db
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                $cat_status = $row['cat_status'];
                $lot_size = $row['lot_size'];
        ?>
                <?php echo "<label for='cat_status'>Edit Region</label>" ?>
                <input type="text" class="form-control" name="cat_title" value="<?php

                                                                                if (isset($cat_title)) {
                                                                                    echo $cat_title;
                                                                                }


                                                                                ?>">
                <?php echo "<label for='cat_status'>Edit Status</label>" ?>
                <input type="text" class="form-control" name="cat_status" value="<?php

                                                                                    if (isset($cat_status)) {
                                                                                        echo $cat_status;
                                                                                    }


                                                                                    ?>">
                <?php echo "<label for='cat_status'>Edit Lot Size</label>" ?>
                <input type="text" placeholder="lot size" class="form-control" name="lot_size" value="<?php

                                                                                                        if (isset($lot_size)) {
                                                                                                            echo $lot_size;
                                                                                                        }


                                                                                                        ?>">
        <?php }
        } ?>



        <?php

        //updating the query
        if (isset($_POST['update_region'])) {
            $the_cat_title = $_POST['cat_title'];
            $the_cat_status = $_POST['cat_status'];
            $the_lot_size = $_POST['lot_size'];


            // using mySQL command via php
            // $query1 = "UPDATE  categories  SET cat_title = '{$the_cat_title}' WHERE cat_id={$cat_id}";
            // $query2 = "UPDATE  categories  SET cat_status = '{$the_cat_status}' WHERE cat_id={$cat_id}";
            // $query3 = "UPDATE  categories  SET lot_size = '{$the_lot_size}' WHERE cat_id={$cat_id}";


            $query = "UPDATE  categories  SET cat_title = '{$the_cat_title}',cat_status = '{$the_cat_status}',lot_size = '{$the_lot_size}' WHERE cat_id={$cat_id}";

            $update_query = mysqli_query($connection, $query);
            if (!$update_query) {
                die("QUERY FAILED " . mysqli_error($connection));
            }
        }

        ?>

    </div>

    <div class="form-group">
        <input class=" btn btn-primary" type="submit" name="update_region" value="Update Region">
    </div>
</form>
<!-- End of Editing a parking region -->