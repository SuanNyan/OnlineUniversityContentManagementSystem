  <?php 

   include('validatelogin.php');
  include('header.php');

   ?>

   <div class='table-responsive'>
                                        <table class='align-middle mb-0 table table-borderless table-striped table-hover'>
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
                                            $connect=mysqli_connect('localhost','root','','ewsd');
                                                $query='SELECT a.article_id,m.name,m.magazine_id,s.name as studentname,a.created_at FROM articles a inner join magazines m on m.magazine_id=a.magazine_id inner join 
                                                students s on a.student_id=s.student_id';
                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
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

                                                 <a href="comment.php"  name='MID' value='1'>   <button type='button' id='PopoverCustomT-1' class='btn btn-success btn-sm'>Comment</button></a>
                                             </form>
                                                </td>
                                            </tr> 
"                               <?php endwhile; ?>
                                           
                                            </tbody>
                                        </table>
                                    </div>