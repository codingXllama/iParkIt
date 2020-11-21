<?php


function insert_regions()
{

    // making our connection global
    // bringing in the conneciton variable for conneciton purposes
    global $connection;

    if (isset($_POST['submit_title'])) {

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
}

// creating the find categories function


function FindAllRegions()
{
    global $connection;

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
}


function deleteRegion()
{

    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];


        // using mySQL command via php
        $query = "DELETE from categories  WHERE cat_id={$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        // refresh the page 
        header("Location: categories.php");
    }
}
