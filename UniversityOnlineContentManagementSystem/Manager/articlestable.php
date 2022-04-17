<!DOCTYPE html>
<html>
<?php include('tags/header.php');
include('validatelogin.php');//for checking login
include('connect.php');
 ?>

<?php include('tags/navigation.php');?>
<div class="app-main__outer">
    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="fa fa-address-book icon-gradient bg-amy-crisp">
                                        </i>
                                    </div>
                                    <div class="h3"><?php 
                                     $faculty_id=$_GET['faculty_id'];
                                    $queryarticle=mysqli_query($connect,"Select * From faculties where faculty_id='$faculty_id'");
                                    $row=mysqli_fetch_assoc($queryarticle);

                                     ?>
                                         <h3><?php echo $row['name'] ?></h3>
                                         <div style="font-size:15px;"class="text-muted p">
                                           <?php 
                                           $magazineid=$_GET['magazine_id'];
                                    $querymagazine=mysqli_query($connect,"Select * From magazines where magazine_id='$magazineid'");
                                    $row=mysqli_fetch_assoc($querymagazine);

                                     ?>

            <?php echo $row['name'] ?>-<?php echo $row['academic_year'] ?>

                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
<div class="unit w-2-3">
   <div class="hero-callout">
     <form action="zipanddownload.php" method="post" enctype="multipart-form/data">
         
       <table class="table table-bordered" id="table" >
  <thead>


    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Article</th>
      <th scope="col">Approved By</th>
         <th scope="col">Image-1</th>
           <th scope="col">Image-2</th>



    </tr>
  </thead>
  <tbody>
    <?php $querystudent=mysqli_query($connect,"SELECT s.name,a.file_url as article,st.name as staffname From students s,articles a,magazines m,staffs st where s.student_id=a.student_id and st.staff_id=a.staff_id and a.magazine_id=m.magazine_id and a.magazine_id=$magazineid and s.faculty_id='$faculty_id'");

  while ($row=mysqli_fetch_assoc($querystudent)):
 ?>
    <tr>
      <th scope="row"><input type="checkbox" name="files[]" value="<?php echo $row['article'] ?>" /></th>
      <td><?php echo $row['name'] ?></td>
      <td><a href="/ewsd/<?php echo $row['article'] ?>">View Doc</a></td>
      <td><?php echo $row['staffname'] ?></td>
         <td><a href="magazines.php?magazine_id=<?php echo $row['magazine_id']?>">View Image</a></td>
<td><a href="magazines.php?magazine_id=<?php echo $row['magazine_id']?>">View Image</a></td>
    </tr>
   <?php endwhile; ?>
  </tbody>
</table>
<button type="submit" class="btn btn-primary">Zip And Download</button>
</form>
   
              <script >$(document).ready( function () {
              
    $('#table').DataTable();
} );</script>          

    </div>
</div>

</body>
</html>