<?php

include('security.php');

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Subject Edit</h6>
        </div>

        <div class="card-body">

        <?php

        if(isset($_POST['dept_cate_editbtn'])){

            $id = $_POST['edit_id'];

            $query = "SELECT * FROM semesters where semester_id = '$id'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $rowediting){

            ?>

                <form action="semester_code.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="updating_semester_id" value="<?php echo $rowediting['semester_id']?>">

                <?php
        $department = "SELECT * FROM dept_category";
        $dept_run = mysqli_query($conn,$department);

        if(mysqli_num_rows($dept_run)>0){
          ?>
           <div class="form-group">
                <label> Dept List Name </label>
                <select name="edit_dept_cate_id" id="" class="form-control" required>
                    <option value="">Choose Your Department Category</option>
                    <?php
                      foreach($dept_run as $row){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
                    <?php
                      }
                    ?>
                </select>
            </div>
            
          <?php
        }
        else{
          echo "No Data Available";
        }
        ?>
        <div class="form-group">
                <label> Semester Name </label>
                <input type="text" name="edit_semester_name" class="form-control" value="<?php echo $rowediting['semester_name'];?>" required>
            </div>
            
        
            <div class="form-group">
                <a href="semester.php" class="btn-btn danger">CANCEL</a>
                <button type="submit" name="dept_update_btn" class="btn btn-primary">UPDATE</button>
                </div>
                </form>

            <?php
            }
            }
            ?>


        </div>

    </div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>d