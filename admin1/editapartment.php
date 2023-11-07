<?php
 require('../config/autoload.php'); ?>
 <?php
include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','apartment','aid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "rate"=>$info[0]['rate'],"aimage"=>"","cid"=>"","floor"=>"");

	$form = new FormAssist($elements,$_POST);
  $dao=new DataAccess();

$labels=array('rate'=>"Apartment Rate",'aimage'=>"Apartment image",'cid'=>"Category Name",'floor'=>"Floor");

$rules=array(
    "rate"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "aimage"=>array("filerequired"=>true),
    "cid"=>array("filerequired"=>true),
    "floor"=>array("filerequired"=>true)
   
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
  if(isset($_FILES['aimage']['rate']['floor']['cid'])){

if($fileName=$file->doUploadRandom($_FILES['aimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {
  $flag=true;
    }
  }
$data=array(

        'rate'=>$_POST['rate'],
        'aimage'=>$fileName,
        'cid'=>$_POST['cid'],
        'floor'=>$_POST['floor']
          //'simage'=>$_POST['simage'],
    );
  $condition='aid='.$_GET['id'];

    if($dao->update($data,'apartment',$condition))
    {
        $msg="Successfully Updated";
//header('location:viewstudents.php');
    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

<?php
    
}


}
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
                        
  Apartment rate:

<?= $form->textBox('rate',array('class'=>'form-control')); ?>
<?= $validator->error('rate'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Apartment image:

<?= $form->fileField('aimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('aimage'); ?></span>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
                        
 Category name:

<?= $form->textBox('cid',array('class'=>'form-control')); ?>
<?= $validator->error('cid'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
                        
  Floor:

<?= $form->textBox('floor',array('class'=>'form-control')); ?>
<?= $validator->error('floor'); ?>

</div>
</div>




<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>