 <div class="col-md-4">










     <!-- Blog Search Well -->
     <div class="well">
         <h4>Parking Search</h4>
         <!-- start of search form -->
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
     </div>
     <!-- /.input-group -->
 </div>





 <!-- START OF SEARCHING PARKING LOCATION -->
 <div class="well">

     <?php $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection, $query);
        ?>
     <h4>Parking Locations</h4>
     <div class="row">
         <div class="col-lg-12">
             <ul class="list-unstyled">
                 <?php
                    // Displaying the content in the db
                    while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                        $cat_title = $row['cat_title'];

                        echo "<li><a href='#'>{$cat_title}</a></li>";
                    }

                    ?>
             </ul>
         </div>

     </div>
     <!-- /.row -->
 </div>



























 <!-- Side Widget Well -->
 <?php include "includes/widget.php" ?>

 </div>