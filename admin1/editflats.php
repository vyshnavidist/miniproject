<?php
 require('../config/autoload.php'); ?>
 <?php
include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','flats','fid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "fname"=>$info[0]['fname'],"fimage"=>"","flocation"=>"","cid"=>"");

	$form = new FormAssist($elements,$_POST);
  $dao=new DataAccess();

$labels=array('fname'=>"Flat name",'fimage'=>"Flat image",'flocation'=>"Flat Location",'cid'=>"Category Name");

$rules=array(
    "fname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "fimage"=>array("filerequired"=>true),
    "flocation"=>array("filerequired"=>true)
   
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
  if(isset($_FILES['fimage']['fname']['flocation'])){

if($fileName=$file->doUploadRandom($_FILES['fimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {
  $flag=true;
    }
  }
$data=array(

        'fname'=>$_POST['fname'],
        'fimage'=>$fileName,
        'flocation'=>$_POST['flocation']
          //'simage'=>$_POST['simage'],
    );
  $condition='fid='.$_GET['id'];

    if($dao->update($data,'flats',$condition))
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
                        
  Flat Name:

<?= $form->textBox('fname',array('class'=>'form-control')); ?>
<?= $validator->error('fname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Flat image:

<?= $form->fileField('fimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('fimage'); ?></span>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
                        
  Flat Location:

<?= $form->textBox('flocation',array('class'=>'form-control')); ?>
<?= $validator->error('flocation'); ?>

</div>
</div>




<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>