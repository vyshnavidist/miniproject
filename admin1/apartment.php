<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
       "rate"=>"", "aimage"=>"","cid"=>"","floor"=>"","astatus"=>"","fid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('rate'=>"Apartment rate",'aimage'=>"Apartment image",'cid'=>"Category Name",'floor'=>"Floor number",'astatus'=>"Apartment status",'fid'=>"Flat Name");

$rules=array(
    "rate"=>array("required"=>true),
    "aimage"=>array("filerequired"=>true),
    "cid"=>array("required"=>true),
    "floor"=>array("required"=>true),
    "astatus"=>array("required"=>true),
    "fid"=>array("required"=>true)
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['aimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {

$data=array(

        'rate'=>$_POST['rate'],
        'aimage'=>$fileName,      
        'cid'=>$_POST['cid'],
        'astatus'=>$_POST['astatus'], 
        'floor'=>$_POST['floor'],
        'fid'=>$_POST['fid']
        
         
    );

    print_r($data);
  
    if($dao->insert($data,"apartment"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>


<?php
    
}
else
echo $file->errors();
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

 <div class="row">
                    <div class="col-md-6">
Apartment Rate:

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
Category Name:

<?php
     $options = $dao->createOptions('cname','cid',"roomcategory");
     echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
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

<div class="row">
                    <div class="col-md-6">
Apartment status:

<?= $form->textBox('astatus',array('class'=>'form-control')); ?>
<?= $validator->error('astatus'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Flat Name:

<?php
     $options = $dao->createOptions('fname','fid',"flats");
     echo $form->dropDownList('fid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('fid'); ?>

</div>
</div>



<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>

