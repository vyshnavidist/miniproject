<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "cname"=>"","cimage"=>"","fid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cname'=>"Category name",'cimage'=>"Category image",'fid'=>"Flat name");

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>3,"maxlength"=>30),
    "cimage"=>array("filerequired"=>true),
    "fid"=>array("required"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['cimage'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {

$data=array(

       
        'cname'=>$_POST['cname'],
        'cimage'=>$fileName,
        'fid'=>$_POST['fid']
         
    );

    print_r($data);
  
    if($dao->insert($data,"roomcategory"))
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
Category name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Cimage:

<?= $form->fileField('cimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('cimage'); ?></span>

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

