<?php 
include('validatelogin.php');
include('header.php');
require('../config/connect.php');

$querymagazine="Select Count(magazine_id) as Mcount from Magazines  ";
    $retquery=mysqli_query($connect,$querymagazine);
    $magazine=mysqli_fetch_assoc($retquery);

$querystudents="Select Count(student_id) as Scount from students  ";
    $retquery=mysqli_query($connect,$querystudents);
    $student=mysqli_fetch_assoc($retquery);

 $magazineid=1;
if(isset($_POST['submit'])){
    $magazineid=$_POST['magazine_id'];
    }
 ?>    
 <div class="app-main__outer">
                        <div class="app-main__inner">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <div class="page-title-icon">
                                            <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                                            </i>
                                        </div>
                                        <div>Coordinator Dashboard
                                               <div class="page-title-subheading">
                                            <?php 
 $querymagazine="Select name  from magazines where magazine_id='$magazineid'  ";
    $retquery=mysqli_query($connect,$querymagazine);
    $faculty=mysqli_fetch_assoc($retquery);

    echo $faculty['name'];

                                             ?>


                                            </div>
                                            <div class="page-title-subheading">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-title-actions">
                                        
                                        
                                    </div>    </div>
                                           <div class="row">
                             <div class="form-group col-6">
                                            <form action="#" method="post">
                   
                    <select class="form-control" name="magazine_id">
                      <option value="1">Choose A Magazine___</option>
                        <?php $query=mysqli_query($connect,"Select * from magazines");
                            while($row=mysqli_fetch_assoc($query)):
                         ?>
                      <option value="<?php echo $row['magazine_id'] ?>">
                          <?php echo $row['name'] ?>
                      </option>
                      <?php endwhile; ?>
                 </select>
                 
                 </div>
                   <div class="col-6">
                     <button type="submit" name="submit" class="btn btn-lg btn-outline-info ">Show Data</button>  
                 </div>
                            </div> 

                            <div class="row">
                            <div class="col-md-4 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Magazines</div>
                                        </div>
                                           <?php 
                                    
                                            
                         $query="Select Count(magazine_id) as Mcount from Magazines  ";

                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                                 
                                             ?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $row['Mcount'] ?> </span></div>
                                        </div>
                                              <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Students</div>
                                        </div>
                                          <?php 
                                    
                                            
                         $query="Select Count(student_id) as scount from students where deleted_at is NULL  ";

                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                                 
                                             ?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $row['scount'] ?></span></div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 ">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Contributions</div>
                                        </div>
                                          <?php 
                                                                 $faculty_id=$_SESSION['faculty_id'];

                         $query="Select Count(a.student_id) as scount from articles a,students s where a.student_id=s.student_id 
                                and s.faculty_id='$faculty_id'
                           ";

                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                                 
                                             ?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $row['scount'] ?></span></div>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!--  <div class="tab-content text-center items-align-center">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Students, stuffs and magazines ratio.</h5>
                                                <canvas id="chart-area"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="container">
                            
                            <canvas id="myChart" 
                                width="400" 
                                height="200"
                                
                                >
                                
                            </canvas>
    
                        </div>  

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Sumitted Magazines
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Name</th>
                                                <th class="text-center">Title</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 
     $query="SELECT a.is_approved,a.article_id,m.name,m.magazine_id,s.profile_img_url,s.name as studentname,a.created_at FROM articles a inner join magazines m on m.magazine_id=a.magazine_id inner join  students s on a.student_id=s.student_id where s.faculty_id='$faculty_id' ";

                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                                 $MID=$row['article_id'];
                                                 $AID=$row['magazine_id'];
                                             ?>
                                            <tr>
                                                <td class="text-center text-muted"><?php echo $row['article_id'] ?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?php echo $row['studentname'] ?></div>
                                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?php echo $row['name'] ?></td>
                                                <td class="text-center">
                    
<?php if ($row['is_approved']==1): ?>
     <div class="badge badge-success">Success</div>
<?php else: ?>
            <div class="badge badge-warning">Pending</div>
           <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                       <form action="#" method='POST'> 

                        <a href="comment.php?QID=<?php echo $MID?>&&MID=<?php echo $AID ?>">   <button type='button' id='PopoverCustomT-1' class='btn btn-dark btn-sm'
                            <?php if ($row['is_approved']==1): ?>
                               disabled
                            <?php endif ?>
                            >Comment</button></a>
                                             </form>
                                                </td>
                                            </tr> 
                                             <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        <a href="Magazines.php" class="btn-wide btn btn-outline-info">See all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                               
                                   <p>© 2020 KMD University, Incorporated</p>
                                
                            </div>
                        </div>
                    </div>    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>


    <?php 
                 $magazineid=$_SESSION['faculty_id'];
if(isset($_POST['submit'])){
    $magazineid=$_POST['magazine_id'];

}


                $query=mysqli_query($connect,"select name from faculties");
                $facultyarray=array();
              while ($faculty=mysqli_fetch_assoc($query)){
                    array_push($facultyarray,$faculty['name']);
              }

        $nofoarticlesperfaculty=" SELECT count(a.article_id) as total_art FROM `faculties` f left join students s on f.faculty_id=s.faculty_id LEFT JOIN articles a on s.student_id=a.student_id and a.magazine_id='$magazineid' GROUP BY f.faculty_id 
";
    $selectquery=mysqli_query($connect,$nofoarticlesperfaculty);
    $nofoaritclesarray=array();

   while ($articlesno=mysqli_fetch_assoc($selectquery)){
                    array_push($nofoaritclesarray,$articlesno['total_art']);
              }
print_r($facultyarray[5]);

    ?>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<?php include('../chart.php'); ?>
</body>


</html>
