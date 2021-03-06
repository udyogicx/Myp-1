<?php

require_once '../core/init.php';
$user = new User();
if($user->isLoggedIn()) {
  $title='Patient : Order';
include BASEURL.'includes/head.php';
include BASEURL.'includes/navigation_patient.php';
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">GoodLife</a>
      </li>
      <li class="breadcrumb-item active">Order Medicine</li>
    </ol>

    <div class="center" id="order_medicine">

      <div class="row">
          <div class="col-md-3">
            <div class="how-it-proccess">
            <img src="../images/presc.png" class="img-responsive" alt="upload">
            <div style="text-align: center;">
              <span>Upload Prescriptions</span>
            </div>
          </div>
          </div>
          <div class="col-md-3">
            <div class="how-it-proccess">
            <img src="../images/order-process.png" class="img-responsive">
            <div style="text-align: center;">
                <span>Pharmacy process the order</span>
            </div>
          </div>
          </div>
          <div class="col-md-3">
            <div class="how-it-proccess">
            <img src="../images/deliver.png" class="img-responsive">
            <div style="text-align: center;">
                  <span>Doorstep Delivery</span>
            </div>
          </div>
          </div>
        </div>
<hr>
</div>

<?php
if(isset($_GET['order'])){
  $orderID=(int)$_GET['order'];
  $error_array=array();


  if(isset($_POST['submit'])){
    $prescription_path='';
    $delivery_address=escape($_POST['delivery_address']);
    $note=escape($_POST['note']);

  if(empty($_POST['delivery_address'])){
    $error_array[].='Delivery Address must be provided.';
    //var_dump($error_array);

  }
        if (isset($_FILES["prescription"]) && $_FILES["prescription"]["error"] == 0) {
            $photo=$_FILES['prescription'];
            //var_dump($photo);
            $photo_name=$photo['name'];
            $photo_name_array=explode('.',$photo_name);
            $file_name=$photo_name_array[0];

            if($file_name !=''){
            $file_ext=$photo_name_array[1];
                $mime=explode('/',$photo['type']);
                $mime_type=$mime[0];
                if ($mime_type != 'image') {
                  $error_array[].='File must be an image';
                }else {
                  $mime_ext=$mime[1];
                }

                $tmp_location=$photo['tmp_name'];
                $file_size=$photo['size'];
                $allowed=array('png','jpg','jpeg','gif');

                $upload_name=md5(microtime()).'.'.$file_ext;
                $upload_location=BASEURL.'prescription/'.$upload_name;
                $prescription_path='/Myp/prescription/'.$upload_name;

                if (!in_array($file_ext,$allowed)) {
                  $error_array[].='The file extension must be png,jpg,jpeg,gif';
                }
                if ($file_size> 5000000) {
                  $error_array[].='File must be under 5MB';
                }
                //var_dump($error_array);
          }

        }else{
          $error_array[].='Prescription must be provided';
        }
          if(empty($error_array)){
                if (isset($_FILES['prescription']) && $_FILES["prescription"]["error"] == 0) {
                    move_uploaded_file($tmp_location,$upload_location);
                  }
              $db=DB::getInstance();
              $db->insert(
                'order_medicine',
                array(
                  'user_id'=>$user->data()->id,
                  'delivery_address'=>Input::get('delivery_address'),
                  'note'=>Input::get('note'),
                  'prescription'=>$prescription_path
                )
              );
              Session::flash('success', 'Medicine Order Successful');
      				Redirect::to('orderedMedicine.php?order=<?php echo $user->data()->id; ?>');


            }else{


        foreach ($error_array as $err) {
          echo $err, '<br>';
        }
  		}



}
    ?>


    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Order Medicine</div>
    <div class="card-body">
     <div class="" id="order_medicine">
       <form class="form" method="post" enctype="multipart/form-data">
         <div class="form-group">
           <label for="prescription">Prescription*(Upload an image of the prescription):</label>
           <input type="file" name="prescription" class="form-control" required>

         </div>
         <div class="form-group">
           <label for="delivery_address">Delivery Address</label>
           <input type="text" name="delivery_address" cols="3" value="<?php echo escape(Input::get('delivery_address')); ?>" class="form-control">

         </div>
         <div class="form-group">
           <label for="note">Note</label>
           <textarea name="note" rows="4" cols="80" class="form-control" value=""><?php echo escape(Input::get('note')); ?></textarea>

         </div>
         <div class="form-group col-md-3 pull-right">
           <input type="submit" name="submit" value="Send Order" class="form-control btn btn-success">
         </div>

       </form>

          </div>
        </div>
      </div>
    </div>

        </div>
      </div>

    <?php
  }


?>


<?php

      include BASEURL.'includes/footer.php';
		}else{
			Redirect::to('../login.php');
		}
      ?>
