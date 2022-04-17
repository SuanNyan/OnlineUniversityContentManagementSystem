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
                                    <div class="h3">All Magazines</div>
                                </div>
                            </div>
                        </div>
<div class="unit w-2-3">
   <div class="hero-callout">
     
         
       <table class="table table-bordered" id="table" >
  <thead>


    <tr>
      <th scope="col">#</th>
      <th scope="col">Magazine Title</th>
      <th scope="col">Total Articles</th>
      <th scope="col">Academic Year</th>
         <th scope="col">~</th>


    </tr>
  </thead>
  <tbody>
    <?php 
    $query=mysqli_query($connect,"SELECT m.magazine_id,m.name, COUNT(a.article_id) as total_articles,m.academic_year FROM `magazines` m, articles a WHERE m.magazine_id=a.magazine_id and a.is_approved=1 GROUP BY m.magazine_id ");

    while($row = mysqli_fetch_assoc($query)):

     ?>
    <tr>
      <th scope="row"></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['total_articles'] ?></td>
      <td><?php echo $row['academic_year'] ?></td>
            <td><a href="magazines.php?magazine_id=<?php echo $row['magazine_id']?>">View More</a></td>

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