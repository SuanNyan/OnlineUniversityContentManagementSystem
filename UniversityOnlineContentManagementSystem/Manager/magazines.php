<!DOCTYPE html>
<html>
<?php include('tags/header.php'); 
include('validatelogin.php');//for checking login
?>
<body>
<?php include('tags/navigation.php');?>
<div class="app-main__outer">
    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="fa fa-bookmark icon-gradient bg-amy-crisp">
                                        </i>
                                    </div>
                                    <div class="h3"><?php 
                                     $magazineid=$_GET['magazine_id'];
                                    $querymagazine=mysqli_query($connect,"Select * From magazines where magazine_id='$magazineid'");
                                    $row=mysqli_fetch_assoc($querymagazine);

                                     ?>
                                         <h3><?php echo $row['name'] ?></h3>
                                         <span class="badge badge-dark"><?php echo $row['academic_year'] ?></span>
                                     </div>
                                </div>
                            </div>
                        </div>
    <div id="app">
        <div class="container">
        <div class="row">
            <?php $query=mysqli_query($connect,"SELECT * from faculties");
                    while ($row =mysqli_fetch_assoc($query)):
                        $id=$row['faculty_id'];
                       
             ?>
            <div class="col-sm-4 mb-4 mt-5">
                <div class="card" style="height: 350px;">
                    <div class="card-body">
                        <h4 class="text-primary text-center">
                        <?php echo  $row['name']; ?>   
                        </h4>
                       <div ><h5 class="text-muted text-center text-uppercase">total articles<div><h3 class="mt-2 font-weight-bold display-3">
                           <?php 
                            $query1=mysqli_query($connect,"Select count(a.article_id) as articles from articles a, students s,magazines m
                                WHERE a.student_id=s.student_id 
                                and m.magazine_id=a.magazine_id
                                and s.faculty_id='$id'
                                and a.magazine_id='$magazineid'
                            ");

                            $articles=mysqli_fetch_assoc($query1);
                                echo $articles['articles'];
                            ?>

                       </h3></div></h5>

                   </div>
                        <div class="text-center mt-5"><a href="articlestable.php?faculty_id=<?php echo $row['faculty_id']?>&magazine_id=<?php echo $magazineid ?>" class="btn btn-success text-white">Details</a></div>
                    </div>  
                </div>  
            </div>
        <?php endwhile; ?>
        </div>
    </div>
    </div>
<?php include('tags/footer.php');?>
    </div>
</div>
<script src="vue/app.js"></script>
</body>
</html>