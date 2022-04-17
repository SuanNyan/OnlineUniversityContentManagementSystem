<!doctype html>
<?php 



if (isset($_POST['btnsave']))
{


    $Username=$_POST['un'];
    $Password=$_POST['pass'];
    $Email=$_POST['email'];
    $Faculty=$_POST['certi'];
    $Roles=$_POST['role'];
       $Certification=$_POST['certi'];
    $PhoneNumber=$_POST['phnum'];
 
 $connect=mysqli_connect('localhost','root','','ewsd');
$Select="Select * from faculties where name='$Faculty'";
 $ret=mysqli_query($connect,$Select);
 $count=mysqli_num_rows($ret);
$row =mysqli_fetch_assoc($ret);
$fack=$row['faculty_id'];
$Select2="Select * from roles where name='$Roles'";
 $ret=mysqli_query($connect,$Select2);
 $count=mysqli_num_rows($ret);
$row =mysqli_fetch_assoc($ret);
$Rg=$row['role_id'];
                            

    $insert="Insert into staffs(name,faculty_id,username,email,password,role_id) 
             values('Name','$fack','$Username','$Email','$Password','$Rg')";
    $ret=mysqli_query($connect,$insert);

     if($ret) 
        {
          echo "<script>window.alert('Your Registration successfully. Thanks for your artworks.')</script>";
           echo "<script>window.location='Register_Co.php'</script>";
        
        $mail = new PHPMailer(true);

$alert = '';


  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Marcusewsd@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Marcus@12345'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('Marcusewsd@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('minjiisminji6@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received.New Article Arrived!!!';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();

  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }

}
    else 
    {
        echo mysqli_error($connect);
    }
   
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
                                        <div>Hire Staff
                                            <div class="page-title-subheading">
                                            Enter all the requirement fields to hire.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-title-actions">
                                        
                                        
                                    </div>    </div>
                            </div>            
                            
                        
                    <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Fill the Requirements.</h5>
                                <form class="needs-validation"  method="POST">
                                    <div class="form-row">
                                  <div class="col-md-9 mb-3">
                                            <label for="validationCustom01">Name</label>
                                            <br>
                                            <input type="text" name="un" class="form-control" id="validationCustom01" placeholder="Johnny_Professional" value="" required>
                                             <br>    
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="validationCustom01">Email</label>
                                            <br>
                                            <input type="text" class="form-control" name="email" id="validationCustom01" placeholder="KMD.BIT@gmail.com" value="" required>
                                            <br> 
                                        </div>   
                                        <div class="col-md-4 mb-3">
                                          

                                       
                                            <label for="validationCustomUsername">Roles</label>
                                            <br>
                                            <div class="input-group">
                                                  <select class="input-group" name="role">
                                                    <?php 
                                            $connect=mysqli_connect('localhost','root','','ewsd');
                                                $query='SELECT * FROM roles';
                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);
                                       
                                           
                                             while ($row =mysqli_fetch_assoc($ret)) :
                                             ?>
                                                <option  type="text" class="form-control"   id="validationCustomUsername" required><?php echo $row['name'] ?></option>
                                                 <?php endwhile; ?>
                                            </select>
                                            </div>
                                             
                                        </div>
                                            <div class="col-md-9 mb-3">
                                            <label for="validationCustom01  ">Password</label>
                                            <br>
                                            <div class="input-group">
                                               <input type="text" class="form-control " name="pass" id="validationCustom01" placeholder="EG: TheTurtle" value="" required>
                                            </div>
                                        </div>

                                    </div>
                              <br>
                                    <div class="form-row">        
                                        <div class="col-md-6 mb-5">
                                            <label for="validationCustom04">Certification</label>
                                            <select class="input-group" name="certi">
                                                    <?php 
                                            $connect=mysqli_connect('localhost','root','','ewsd');
                                                $query='SELECT * FROM faculties';
                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);
                                      
                                           
                                             while ($row =mysqli_fetch_assoc($ret)) :
                                             $factul=$row['faculty_id'];  ?>

                                             <option  type="text" class="form-control"  id="validationCustomUsername" required><?php echo $row['name'] ?></option>
                                                 <?php endwhile; ?>
                                            </select>
                                         
                                        </div>
                                        <div class="col-md-3 mb-5">
                                            <?php echo $factul ?>
                                            <label for="validationCustom05">Phone Number</label>
                                            <input type="text" class="form-control" name="phnum" id="validationCustom05" placeholder="+977658391011" required>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="btnsave" type="submit">Register Stuff</button>
                                </form>
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
