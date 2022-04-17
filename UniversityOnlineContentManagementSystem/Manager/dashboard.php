<!DOCTYPE html>
<html>
<?php
  require('../config/connect.php');
 include('tags/header.php'); 
  include('validatelogin.php');
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
<body>
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
                                    <div>Manager Dashboard
                                      <div class="page-title-subheading">
                                            <?php 
 $querymagazine="Select name  from magazines where magazine_id='$magazineid'  ";
    $retquery=mysqli_query($connect,$querymagazine);
    $faculty=mysqli_fetch_assoc($retquery);

    echo $faculty['name'];

                                             ?>


                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Magazines</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $magazine['Mcount'] ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Students</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $student['Scount'] ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Contribution</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>
                                               <?php 

                         $query="Select Count(a.student_id) as scount from articles a,students s where a.student_id=s.student_id 
                               
                                
                           ";

                                                $ret=mysqli_query($connect,$query);
                                             

                                             $row =mysqli_fetch_assoc($ret);

  echo $row['scount'];
                                                 
                                             ?>
                                            </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <canvas id="myChart" ></canvas>
                        </div>
                        <?php include('tags/footer.php'); ?>
                    </div>
                </div>
                 <?php 
                 $magazineid=1;
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
</body>

   <?php include('../chart.php'); ?>
</html>