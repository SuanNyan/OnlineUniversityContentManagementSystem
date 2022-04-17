
<?php 
                                            $connect=mysqli_connect('localhost','root','','ewsd');
if (isset($_GET['QID'])) 
{
    $MID=$_GET['QID'];
}
if (isset($_GET['MID']))
{
    $MGID=$_GET['MID'];
}

if (isset($_POST['btnsave']))
{


    $cmt=$_POST['cmt'];
   

   


    $insert="insert into comments(article_id,body,staff_id) 
             values('$MID','$cmt','1')";
    $ret=mysqli_query($connect,$insert);

   
    
} 
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
                                        <div>Comment Section                                        </div>
                                    </div>
           </div>
       </div>
        <div  v-for="book in books"  id="app">

                <div class="card m-3">
                    <!-- <img class="card-img-top" src="..." alt="Card image cap"> --><!-- IF YOU WANT TO USE IMAGE -->
                    <div class="card-body">
                        <?php 
                                    
                                            $connect=mysqli_connect('localhost','root','','ewsd');
                         $query="SELECT m.name,s.name as staffname,Date(m.created_at) as created_at,m.img_url FROM magazines m inner join staffs s on s.staff_id=m.staff_id where m.magazine_id='$MGID'  ";

                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);

                                             while ($row =mysqli_fetch_assoc($ret)) :
                                                 
                                             ?>
                        <h4 class="text-primary">{{    <?php echo $row['name'] ?>   }}</h4>
                        <h6 class="text-muted mb-4">{{<?php echo $row['staffname'] ?> }} . {{<?php echo $row['created_at'] ?>}}</h6>
                    <img src="../img/<?php echo $row['img_url'] ?>" class="img-fluid mb-3" >

      <?php endwhile; ?>
     
  <?php 


$connect=mysqli_connect('localhost','root','','ewsd');

$query=" SELECT * FROM articles where article_id='$MID'  ";



$ret=mysqli_query($connect,$query);
$count=mysqli_num_rows($ret);
$row=mysqli_fetch_assoc($ret);


?>
                        <a class="btn btn-primary" href="../doc/<?php echo $row['file_url']?>" >Detail</a><!-- THIS IS JUST AN EXAMPLE LINK BRO..  -->
                            
                    <div class="card-body">
                        <div class=" mt-4">
                                <form action="#" method='POST'>
                            <h6>Comment Section </h6>
                            <input type="text" class="mb-2 mt-2 form-control" name="cmt" value="lorem">
                            <button class="btn btn-primary mb-2" name="btnsave" v-on:click='Comment()'>Comment</button>
                        </div>

                    </form></div>
                        <?php 


$connect=mysqli_connect('localhost','root','','ewsd');
$query="SELECT body FROM comments WHERE article_id='$MID'  ";

$ret=mysqli_query($connect,$query);
$count=mysqli_num_rows($ret);

while ($row =mysqli_fetch_assoc($ret)) :

?>
                    <div class="card">

  
</div>
   <?php endwhile; ?> 
<br><br><br><br>
             <div class="card" style="width: 18rem; margin-left: 300px;">
                 

  <ul class="list-group list-group-flush">
      
    <?php 


$connect=mysqli_connect('localhost','root','','ewsd');
$query="SELECT body FROM comments WHERE article_id='$MID'  ";

$ret=mysqli_query($connect,$query);
$count=mysqli_num_rows($ret);

while ($row =mysqli_fetch_assoc($ret)) :

?>
    <li class="list-group-item">  <?php echo $row['body'] ?>   </li>
        <?php endwhile; ?> 
  </ul>

</div>           
                        <!-- <a class="text-right" href="#">Author</a> -->
                    </div>  

                </div><br>  
        </div>
<?php 
                                    
$connect=mysqli_connect('localhost','root','','ewsd');
$query=" SELECT * FROM articles where article_id='$MID'  ";

$ret=mysqli_query($connect,$query);
$count=mysqli_num_rows($ret);

while ($row =mysqli_fetch_assoc($ret)) :
 
?>
    <script type="text/javascript">
        var app =new Vue({
        el: '#app',
        data:{
          /*  bind: 'Laravel.pdf',*/
            books: {pdf:'../doc/<?php echo $row['file_url'] ?> ' }
        },
        methods:{
        /*Login:function(event) 
        {
            alert('Login Successful!')
        },
        Exit:function(event)
        {
            alert('Redirecting to home page...'),
            redirect('home.php')
        }*/
        Comment:function(event)
        {
            alert('Your comment has been submitted successfully!')
        }

        }
    })
</script>
   <?php endwhile; ?>
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
