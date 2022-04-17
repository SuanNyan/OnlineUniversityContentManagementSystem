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
                                    <div class="h3">
                                    
                                         <h3>All Students</h3>
                                         <div style="font-size:15px;"class="text-muted p">
                                          

           

                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
<div class="unit w-2-3">
   <div class="hero-callout">
     
         
       <table class="table table-bordered" id="table" >
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
         <th scope="col">Faculty</th>
           <th scope="col">Profile Pic</th>



    </tr>
  </thead>
  <tbody>
    
<?php $querystudent=mysqli_query($connect,"SELECT s.student_id,s.name,s.username,s.email,f.name as faculty,s.profile_img_url FROM `students` s,faculties f where s.faculty_id=f.faculty_id ");
while ($row=mysqli_fetch_assoc($querystudent)) :
 ?>
 
    <tr>
      <th scope="row"></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['faculty'] ?></td>

         <td>
          <a href="../img/<?php echo $row['profile_img_url'] ?>" class="btn btn-primary" target="_bash"> View Profile Imgae</a>
          </td>
    </tr>
   <?php endwhile; ?>
  </tbody>
</table>
   
              <script >$(document).ready( function () {
              
    $('#table').DataTable();
} );</script>          

    </div>
</div>

</body>
</html>