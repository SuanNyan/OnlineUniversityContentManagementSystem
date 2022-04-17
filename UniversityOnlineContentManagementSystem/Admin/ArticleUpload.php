<!doctype html>
<?php 
if (isset($_POST['btnsave']))
{

$staffName=$_POST['name'];
    $MagazineName=$_POST['Mname'];
    $description=$_POST['wd'];
    $academic_year=$_POST['ay'];
    $Closure=$_POST['sd'];
    $FClosure=$_POST['dd'];
       
 
 $connect=mysqli_connect('localhost','root','','ewsd');
$Select="Select * from staffs where username='$staffName'";
 $ret=mysqli_query($connect,$Select);
 $count=mysqli_num_rows($ret);
$row =mysqli_fetch_assoc($ret);
$fack=$row['staff_id'];

                            

    $insert="Insert into magazines(name,description,staff_id,academic_year,closure_date,final_closure_date,new_articles,created_at,updated_at) 
             values('$MagazineName','$description','$fack','$academic_year','$Closure','$FClosure','1',Now(),Now())";
    $ret=mysqli_query($connect,$insert);

    if ($ret) 
    {
        echo "<script>alert('Upload Successful');</script>";
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
                                        <div>Upload Article
                                            <div class="page-title-subheading">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-title-actions">
                                        
                                        
                                    </div>    </div>
                            </div>            
                            
                         <form class="needs-validation"  method="POST">
                    <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Fill the Requirements.</h5>
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                    <div class="col-md-10 mb-3">
                                          <label for="validationCustom01">Choose Admin name</label>
                                          <select class="input-group"  name="name">
                                         <?php 
                                            $connect=mysqli_connect('localhost','root','','ewsd');
                                                $query='SELECT * FROM staffs';
                                                $ret=mysqli_query($connect,$query);
                                             $count=mysqli_num_rows($ret);
                                       
                                           
                                             while ($row =mysqli_fetch_assoc($ret)) :
                                             ?>
                                            <label for="validationCustom01">Admin name</label>
                                            <br>
                                            <option class="form-control " id="validationCustom01" ><?php echo $row['username'] ?></option> 
                                             <?php endwhile; ?>
                                            </select>
                                        </div>
                                        
                                         <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Magazine name</label>
                                            <br>
                                            <input type="text" class="form-control" name="Mname" id="validationCustom01" placeholder="EG: TheTurtle" value="" required>
                                         </div>
                                         <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Academic Year</label>
                                            <br>
                                            <input type="text" class="form-control " name="ay" id="validationCustom01" placeholder="EG 2020-2021" value="" required>
                                         </div>
                                         <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Write Description</label>
                                            <br>
                                            <input type="text" class="form-control " name="wd" id="validationCustom01" placeholder="" value="" required>
                                         </div>
                                    </div>
                                    <div class="form-row">
                                        
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">Submitted-Date</label>
                                            <input type="date" name="sd" class="form-control" id="validationCustom04" placeholder="24/9/2020" required>
                                            <div class="invalid-feedback">
                                                Please provide a date.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Due-Date</label>
                                            <input type="date" name="dd"  class="form-control" id="validationCustom05" placeholder="10/2/2021" required>
                                            <div class="invalid-feedback">
                                                Please provide a date.
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="btnsave" type="submit">Upload Title</button>
                                </form>
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
