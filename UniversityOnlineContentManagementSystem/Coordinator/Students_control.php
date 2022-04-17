<?php 
   include('validatelogin.php');
   require('../config/connect.php');
$staffid=$_SESSION['staff'];

  include('header.php');

 ?>   <div class="app-main__outer">
                        <div class="app-main__inner">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <div class="page-title-icon">
                                            <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                                            </i>
                                        </div>
                                        <div>Students
                                        <?php 
                                
          $query="Select f.* from faculties f inner join staffs s on s.faculty_id=f.faculty_id where s.staff_id='$staffid' ";
                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);
                                             $row=mysqli_fetch_assoc($ret);
                                             $faculty_id=$row['faculty_id'];
                                             ?>
                                            <div class="page-title-subheading">
                                            	<?php echo $row['name'] ?>
                                            </div>
                                        </div>
                                    </div>
           </div>
       </div>
       <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                         
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Name</th>
                                                <th class="text-center">Number of Contribution</th>
                                                <th class="text-center">Email</th>
                                            
                                            </tr>
                                            </thead>
                                            <tbody>
                                                 <?php 
                                                $query="Select *,(select count(*) from articles where student_id=s.student_id) as count 
                                                
                                                from students s 
                                                where s.faculty_id='$faculty_id'
                                                ";
                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                             ?>
                                            <tr>
                                                <td class="text-center text-muted">~</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?php echo $row['name'] ?></div>
                                                                <div class="widget-subheading opacity-7">Student</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"> <?php echo $row['count'] ?></td>
                                                <td class="text-center">
                                                 <?php echo $row['email'] ?>
                                                </td>
                                                
                                            </tr>
                                           <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                            <br><br><br>
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
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
