<?php
require('connect.php');
session_start();
if (isset($_GET['article_id'])) 
{
  $ArticleID=$_GET['article_id'];
  $select4="SELECT * from articles where article_id='$ArticleID'";
  $run4=mysqli_query($connection,$select4);
  $row4=mysqli_num_rows($run4);
  $array4=mysqli_fetch_array($run4);
  if ($row4<1) 
{
 echo "<script>window.alert('Warning:There is no comments for this article.')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>KMD University - Think High, Aim Big, Get Knowledge</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/main.css">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    </head>
    <body>
<form action="StudentComment.php" method="POST" enctype="multipart/form-data">
<?php
require('WebHeader.php');
?>
<br><br>
        <div>
    <div id="app">
        <div class="container card-img-top">
          <img src="../img/<?php echo $array4['article_photo_url_1'];?>" alt="" class="img-thumbnail" width="200px" height="50%">

                    </div>
            <div class="container" v-for="book in books" style="height: 800px;">
                <div class="card " >
                    <!-- <img class="card-img-top" src="..." alt="Card image cap"> --><!-- IF YOU WANT TO USE IMAGE -->
                    <div class="card-body">
                        <h1 class="text-primary text-center"><?php echo basename($array4['file_url']);?></h1>
                        <h6 class="text-muted text-center mb-4">Uploaded at:<?php echo $array4['created_at'];?></h6>
                        <p class="text-center text-muted"></p>
                        <!-- THIS IS JUST AN EXAMPLE LINK BRO..  -->
                        <!-- <a class="text-right" href="#">Author</a> -->
                    </div>  
                    
                    
                   <div class="text-center"><a v-bind:href="book.pdf" class="mr-2 text-center" target="_bash">View Doc</a></div>
                   <br><br>
                                      <div class="container">
                                        <div class=" mt-4">
                            <h3 class="text-center">Comment Section</h3>
                <?php  
                $articlename=$array4['file_url'];
                $articleid=$array4['article_id'];
                $commentquery="SELECT c.*,a.* FROM comments c,articles a 
                                where c.article_id=a.article_id and c.article_id='$articleid'";
                $commentrat=mysqli_query($connection,$commentquery);
                $commentcount=mysqli_num_rows($commentrat);
                for($x=0;$x<$commentcount;$x++) 
                { 
                    $arr1=mysqli_fetch_array($commentrat);
                    $commentid=$arr1['comment_id'];
                    $comment=$arr1['body'];
                    $commenteddate=$arr1['created_at'];
                    $staffid=$arr1['staff_id'];
                
                ?>
                <textarea disabled="disabled" class="form-control mb-4"><?php echo $comment;?></textarea> 


                        <?php
                    }
                }
                        ?>
                         </div>
                        </div>
                </div>  
            </div>
        </div>
    </div>
    <?php
    require('WebFooter.php');
    ?>
    <script type="text/javascript">
        var app =new Vue({
        el: '#app',
        data:{
          /*  bind: 'Laravel.pdf',*/
            books: [
                { pdf:'../docs/<?php echo $articlename ?>'}
            ]
        }/*,
        methods:{
        Login:function(event) 
        {
            alert('Login Successful!')
        },
        Exit:function(event)
        {
            alert('Redirecting to home page...'),
            redirect('home.php')
        }

        }*/
    })
</script>
    </form>
    </body>
    </html>