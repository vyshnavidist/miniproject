<?php
 require('../config/autoload.php'); ?>
<?php
include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','roomcategory','cid='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "cname"=>$info[0]['cname'],"cimage"=>"");

	$form = new FormAssist($elements,$_POST);
  $dao=new DataAccess();

$labels=array('cname'=>"Category name",'cimage'=>"Category image");

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "cimage"=>array("filerequired"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
  if(isset($_FILES['cimage']['cname'])){

if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {
  $flag=true;
    }
  }
$data=array(

        'cname'=>$_POST['cname'],
        'cimage'=>$fileName
          //'simage'=>$_POST['simage'],
    );
  $condition='cid='.$_GET['id'];

    if($dao->update($data,'roomcategory',$condition))
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
                        
  Category name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Cimage

<?= $form->fileField('cimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cimage'); ?></span>

</div>
</div>
<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>