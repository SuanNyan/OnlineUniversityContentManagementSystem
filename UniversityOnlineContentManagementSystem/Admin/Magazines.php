<?php 
include('header.php');
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
                                        <div>Stuffs
                                            <div class="page-title-subheading">
                                            	Roles, and Fire staff here.
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
                                                <th>Title</th>
                                                <th class="text-center">Std_name</th>
                                                <th class="text-center">Submitted date</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                  <?php 
                                            $connect=mysqli_connect('localhost','root','','ewsd');
                                                $query='SELECT a.article_id,m.name,m.magazine_id,s.name as studentname,a.created_at FROM articles a inner join magazines m on m.magazine_id=a.magazine_id inner join 
                                                students s on a.student_id=s.student_id where a.is_approved=0 ';

                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                                 $MID=$row['article_id'];
                                             ?>
                                            <tr>
                                                <td class='text-center text-muted'><?php echo $row['article_id'] ?></td>
                                                <td>
                                                    <div class='widget-content p-0'>
                                                        <div class='widget-content-wrapper'>
                                                            <div class='widget-content-left mr-3'>
                                                                <div class='widget-content-left'>
                                                                    <img width='40' class='rounded-circle' src='assets/images/avatars/4.jpg' alt=''>
                                                                </div>
                                                            </div>
                                                            <div class='widget-content-left flex2'>

                                                                <div class='widget-heading'><?php echo $row['name'] ?></div>
                                                                <div class='widget-subheading opacity-7'></div>
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
                                                <a href="approve.php ? QID=<?php echo $MID ?>"><button type='button' name='btnapprove' id='PopoverCustomT-1' class='btn btn-success btn-sm'>Approve</button></a>
                                                <a href="approve.php ? QID=<?php echo $MID ?>">
                                                     <button type="button" id="PopoverCustomT-1" class="btn btn-danger btn-sm">Deny</button>
                                                     </a>
                                                 </form>
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
