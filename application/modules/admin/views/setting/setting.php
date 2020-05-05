<?php
$url=base_url();
ob_start();
if(!isset($_SESSION['admin_name'])||$_SESSION['admin_name']==""){ 
header("Location:$url"."admin/login"); 
}
else{
$id_admin=$_SESSION['id_admin'];
$admin_name=$_SESSION['admin_name'];
$last_login=$_SESSION['last_login'];
$curt='setting';
}
$site_info=$this->db->get_where('site_info')->result();
foreach($site_info as $site_info){
	$logo_site=$site_info->logo;
	$favicon=$site_info->favicon;
	$site_name_title=$site_info->name;
	$face=$site_info->facebook;
	$twitter=$site_info->twitter;
	$instagram=$site_info->instagram;
	$key_words=$site_info->keywords;
	$meta_desc=$site_info->description;
	$name_en=$site_info->name_en;
    $linkedin=$site_info->linkedin;
    
	 }
	
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>الاعدادات</title>
<?php include ("design/inc/header.php");?>
</head>
<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
		<!-- BEGIN HEADER -->
        <?php include ("design/inc/topbar.php");?>
        <!-- END HEADER -->
		<!-- BEGIN HEADER & CONTENT DIVIDER -->
		<div class="clearfix"> </div>
		<!-- END HEADER & CONTENT DIVIDER -->
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <?php include ("design/inc/sidebar.php");?>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
			<div class="page-content" style="min-height: 1261px;">
                    <!-- BEGIN PAGE HEAD-->
                    
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="<?=$url.'admin';?>">لوحة التحكم</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">الاعدادات</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->                                <!-- END PORTLET MAIN -->
                                <!-- PORTLET MAIN -->

                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                       <!--Start from-->	
                                <div class="tab-content">					
                                    <div class="tab-pane active" id="tab_5">
                                        <div class="portlet box blue ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>الاعدادات</div>
                                            </div>
                                        <div class="portlet light bordered form-fit">
                                            <div class="portlet-title">
                                                <div class="caption"></div>
                                                <div class="actions"></div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="<?=$url;?>admin/update_setting" class="form-horizontal form-bordered"  method="post" enctype="multipart/form-data">
                                                    <div class="form-body">
                                                        
<div class="form-group">
<div class="col-md-5" style="text-align:center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 250px; height: 75px;">
<img src="<?=$url;?>uploads/site_setting/<?php echo $logo_site?>" alt="" />
</div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
<img src="<?=$url;?>uploads/site_setting/default-placeholder.png" alt="" />
</div>
<div>
<span class="btn default btn-file">
<span class="fileinput-new">اللوجو<?=get_img_size("logo");?></span>
<span class="fileinput-exists">تغيير</span>
<input type="file" name="file"> </span>
<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
</div>
</div>
</div>

<div class="col-md-2" style="text-align:center"></div>
<div class="col-md-5" style="text-align:center">
<div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width:32px; height:32px;">
<img src="<?=$url;?>uploads/site_setting/<?php echo $favicon?>" alt="" /> </div>
<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
<img src="<?=$url;?>uploads/site_setting/default-placeholder.png" alt="" />
</div>
<div>
<span class="btn default btn-file">
<span class="fileinput-new">ايقونة الموقع<?=get_img_size("favicon");?></span>  
<span class="fileinput-exists"> تغيير </span>
<input type="file" name="file1"> </span>
<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
</div>
</div>

</div>
</div>

                    

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">إسم الموقع</span>
<input type="text" placeholder="إسم الموقع" class="form-control" name="site_name" 
value="<?php echo $site_name_title?>">
</div><div class="col-md-2"></div></div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block" style="text-align:left;direction:ltr;float:left">Site name</span>
<input type="text" placeholder="Site name" style="text-align:left;direction:ltr" class="form-control" name="site_name_en" value="<?php echo $name_en?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">رابط الفيس بوك</span>
<input type="text" placeholder="رابط الفيس بوك" class="form-control" name="facebook" value="<?php echo $face?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>


<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">رابط تويتر</span>
<input type="text" placeholder="رابط تويتر" class="form-control" name="twitter" value="<?php echo $twitter?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>

<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">رابط الأنستجرام</span>
<input type="text" placeholder="رابط الأنستجرام " class="form-control" name="instagram" value="<?php echo $instagram?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>
<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">رابط لينكد ان</span>
<input type="text" placeholder="رابط لينكد ان" class="form-control" name="linkedin" value="<?php echo $linkedin?>">
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>
			






  



<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">وصف ميتا</span>
<textarea class="form-control autosizeme" rows="4" placeholder="وصف ميتا" data-autosize-on="true"
style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 90px;" name="meta_desc"><?=$meta_desc?></textarea>
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>
                                                       
<div class="form-group">
<div class="col-md-2"></div>
<div class="col-md-8">
<span class="help-block">كلمات دلالية</span>
<textarea class="form-control autosizeme" rows="4" placeholder="كلمات دلالية" data-autosize-on="true" style="overflow: hidden; 
word-wrap: break-word; resize: horizontal; height: 90px;" name="key_words"><?php echo  $key_words?></textarea>
<!--<span class="help-block"> This is inline help </span>-->
</div>
<div class="col-md-2"></div>
</div>







                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">
                                                                <i class="fa fa-check"></i>تحديث</button>
                                                                <button type="reset" class="btn default">إلغاء</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
									</div>	
                                    <!---END FROM-->    
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
            </div>



		                </div>
		            </div>
		        </div>
		    </div>
		</div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php include ("design/inc/footer.php");?>
        <!-- END FOOTER -->

        <?php include ("design/inc/footer_js.php");?>
<?php 
if(isset($_SESSION['msg'])){
?>
<script>
$(document).ready(function(e) {
 toastr.success("<?php echo $_SESSION['msg']?>");
});
</script>
<?php }?>
</body></html>
