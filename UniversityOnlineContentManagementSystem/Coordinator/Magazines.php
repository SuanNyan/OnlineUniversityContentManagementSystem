<?php
   include('validatelogin.php');
  include('header.php');
  require('../config/connect.php');
 ?>
Magazines<!doctype html>
   <div class="app-main__outer">
                        <div class="app-main__inner">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <div class="page-title-icon">
                                            <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                                            </i>
                                        </div>
                                        <div>Magazines
                                            <div class="page-title-subheading">
                                            	All students magazines here.
                                            </div>
                                        </div>
                                    </div>
           </div>
       </div>
             
       <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    
 

   <div class='table-responsive'>
         <table class='align-middle mb-0 table table-borderless table-striped table-hover text-center'>
                                            <thead>
                                            <tr>
                                                <th class='text-center'>ID</th>
                                                <th>Title</th>
                                                <th class='text-center'>Std_name</th>
                                                <th class='text-center'>Submitted date</th>
                                                <th class='text-center'>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                      <?php 
                             $faculty_id=  $_SESSION['faculty_id'];

                                            
                        $query="SELECT a.is_approved,a.article_id,m.name,m.magazine_id,s.profile_img_url,s.name as studentname,a.created_at FROM articles a inner join magazines m on m.magazine_id=a.magazine_id inner join 
                                                students s on a.student_id=s.student_id where s.faculty_id='$faculty_id'";
          
                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                                 $MID=$row['article_id'];
                                                 $AID=$row['magazine_id'];


                                             ?>

                                            <tr>


 <td class='text-center text-muted'><?php echo $row['article_id'] ?></td>
                                                <td>
                                                    <div class='widget-content p-0'>
                                                        <div class='widget-content-wrapper'>
                                                            <div class='widget-content-left mr-3'>
                                                                <div class='widget-content-left'>
 <img width='40' class='rounded-circle' src='../img/<?php echo $row['profile_img_url'] ?>' alt=''>
                                                                </div>
                                                            </div>
                                                            <div class='widget-content-left flex2'>

                                                                <div class='widget-heading'></div>
                                                                <div class='widget-subheading opacity-7'><?php echo $row['name'] ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class='text-center'>
                                                                                                <?php echo $row['studentname'] ?>   
                                                </td>
                                                <td class='text-center'>
                                            <?php echo $row['created_at'] ?>
                                                </td>
                                                <td class='text-center'>
                                              
 

                                          
                                     
                                               
                                              
 <form action="#" method='POST'>

    <?php 

    if ($row['is_approved']==1): ?>
 <button type='button' name='btnapprove' id='PopoverCustomT-1' class='btn btn-success btn-sm' disabled>Approved</button>
    <?php else: ?>
 <a href="approve.php?QID=<?php echo $MID ?>">
  
    <button type='button' name='btnapprove' id='PopoverCustomT-1' class='btn btn-success btn-sm'>Approve</button>


</a>
<a href="comment.php?QID=<?php echo $MID?>&&MID=<?php echo $AID ?>">   <button type='button' id='PopoverCustomT-1' class='btn btn-dark btn-sm'>Comment</button></a>
               <?php endif; ?>                              </form>
                                     
                                                </td>
                                            </tr> 
                               <?php endwhile; ?>  
                                           
                                            </tbody>
                                        </table>
                                    </div>  
                                    
                                </div>
                            </div>
                        </div>
                    </form>
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
