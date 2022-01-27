<!Doctype html>
<html>
    <head>
        <link href="viewimage.css" type="text/css" rel="stylesheet">
        <?php
                include("process.php");
                include("config.php");


            $rowperpage = 5;
            $row = 0;

            // Previous Button
            if(isset($_POST['but_prev'])){
                $row = $_POST['row'];
                $row -= $rowperpage;
                if( $row < 0 ){
                    $row = 0;
                }
            }

            // Next Button
            if(isset($_POST['but_next'])){
                $row = $_POST['row'];
                $allcount = $_POST['allcount'];

                $val = $row + $rowperpage;
                if( $val < $allcount ){
                    $row = $val;
                }
            }
        ?>
    </head>
    <body>
    <div id="content">
        <table width="100%" id="emp_table" border="0">
            <tr class="tr_header">
               <th>food_id</th>
                <th>food_name</th>
                <th>price</th>
                <th>description</th>
                <th>image</th>
                <th><a href="#">update</a>|<a href="#">Delete</a></th>
            </tr>
            <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM fooditems";

            $result = mysqli_query($con,$sql);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];

            // selecting rows
            $sql = "SELECT * FROM fooditems  ORDER BY food_id ASC limit $row,".$rowperpage;
            $result = mysqli_query($con,$sql);
            $sno = $row + 1;
            while($fetch = mysqli_fetch_array($result)){
            $food_id= $fetch['food_id'];
            $price = $fetch['price'];
            $food_name= $fetch['food_name'];
            $description= $fetch['description'];
             $file_path= $fetch['file_path'];
                
                ?>
                <tr>
                    <td align='center'><?php echo $food_id; ?></td>
                    <td align='center'><?php echo $food_name; ?></td>
                    <td align='center'><?php echo $price; ?></td>
                    <td align='center'><?php echo $description; ?></td>
                     <td align='center'><?php echo  $file_path;?></td>
                    <td><a href="updation.php">update</a>|<a href="delete.php">Delete</a></td>
                </tr>
            <?php
                $sno ++;
            }
            ?>
        </table>
        <form method="post" action="">
            <div id="div_pagination">
                <input type="hidden" name="row" value="<?php echo $row; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <input type="submit" class="button" name="but_prev" value="Previous">
                <input type="submit" class="button" name="but_next" value="Next">
            </div>
        </form>
    </div>
    </body>
</html>