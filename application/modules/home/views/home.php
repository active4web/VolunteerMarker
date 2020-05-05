<!-- Preloader Begin -->
<?php
   foreach($home_page as $home_page)
   foreach($site_info as $site_info)
   ?>
<!-- Offcanvas Begin -->
<div class="offcanvas-overlay fixed-top w-100 h-100"></div>
<!-- Offcanvas End -->
<!-- Slider Begin -->
<section class=" section-pattern bg pt-130 pb-50">
   <!-- Banner Slider Begin -->
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-ms-12">
            <!-- Section Title Begin -->
            <div class="section-title text-center" style="background-color: #fff;padding: 10px; border: 2px solid #fff;">
               <p class="p" style="color: #000;margin-top: 7px; font-size: 15px; text-align: center;"> نظام المساعدات المركزي </p>
               
                  <div class="row">
                     <div class="foundation" style="margin:0px;display:none;width:100%">
						<form method="POST" action="<?= base_url()?>home/foundation" class="contact-form">
						 <div class="col-md-12" id="city_search">
							<select name="register_type" class="theme-input-style switch_type" required>
								<option value="0" selected>تسجيل مؤسسة</option>
								<option value="1">تسجيل كمتطوع</option>
								<option value="2">تسجيل طلب مساعدة</option>
							</select>
						 </div>
                        <div class="col-md-12 foundation">
                           <input type="text" name="name" class="theme-input-style" placeholder="اسم المؤسسة" required>
                        </div>
                        <div class="col-md-12 foundation">
                           <input type="text" name="email" class="theme-input-style" placeholder="البريد الالكترونى" required>
                        </div>
                        <div class="col-md-12 foundation">
                           <input type="text" name="phone" class="theme-input-style" placeholder="رقم الجوال" required>
                        </div>
                        
                         <div class="col-md-12 foundation">

<select name="country_id" class="theme-input-style" id="country_id_foundation" onchange="getstate_foundation(this.value)"; required>
                            <option value="">حدد الدولة من فضلك </option>
                               <?php
                            foreach($country_foundation as $country_foundation){
                            ?>
                             <option value="<?= $country_foundation->id?>"><?= $country_foundation->title;?></option>
                           <?php }?>
                           </select>
                        </div>
                        
                        <div class="col-md-12 foundation">
             <select name="city_id" class="theme-input-style" id="state_foundation" onchange="getregion_foundation(this.value)";>
                     <option value="">المحافظة</option>
                  </select>
                        </div>
                        <div class="col-md-12 foundation">
                           <select name="region_id" class="theme-input-style" id="region_id_foundation">
                <option value="">الاقليم</option>
                </select>
                        </div>
                        <div class="col-md-12 foundation" id="city_search">
                           <select name="type_registration" class="theme-input-style" id="type_registration" required>
                              <option >تقديم مساعدة</option>
                              <option>طلب تطوع</option>
                           </select>
                        </div>
                        <div class="col-md-12 foundation">
                           <input placeholder="العنوان" type="text" value="" class="form-control span6" id="us2-address" required>
                           <div id="us2" style="width: 100%;height: 200px;"></div>
                           <input type="hidden" name="lat" class="form-control" style="width: 150px" id="let" />
                           <input type="hidden" name="lag" class="form-control" style="width: 150px" id="lag" />
                        </div>
						<div class="col-12">
							<button type="submit" class="btn searchbutton mainheader" style="background-color:#367dfe !important;width:100%">
							<span>تسجيل الأن</span></button>
						</div>
						</form>
                     </div>
					
                     <div class="volunteer" style="margin:0px;width:100%">
						<form method="POST" action="<?= base_url()?>home/volunteer" class="contact-form">
						<div class="col-md-12" id="city_search">
							<select name="register_type" class="theme-input-style switch_type" required>
							   <option value="1" selected>تسجيل كمتطوع</option>
							   <option value="0">تسجيل مؤسسة</option>
							   <option value="2">تسجيل طلب مساعدة</option>
							</select>
						 </div>
                        <div class="col-md-12 volunteer">
                           <input type="text" name="name" id="name" class="theme-input-style" placeholder="الاسم" required>
                        </div>
                        <div class="col-md-12 volunteer">
                           <input type="text" name="nationalid" id="nationalid" class="theme-input-style" placeholder="رقم الهوية" required>
                        </div>
                        <div class="col-md-12 volunteer">
                           <input type="text" name="email" id="email" class="theme-input-style" placeholder="البريد الالكترونى" required>
                        </div>
                        <div class="col-md-12 volunteer">
                           <input type="text" name="phone" id="phone" class="theme-input-style" placeholder="رقم الجوال" required>
                        </div>
                        
                        <div class="col-md-12 volunteer" > 
                        <select name="country_id" class="theme-input-style" id="country_id_volunteer" onchange="getState_volunteer(this.value)"; required>
                            <option value="">حدد الدولة من فضلك </option>
                               <?php
                            foreach($country_volunteer as $volunteer_country){
                            ?>
                             <option value="<?= $volunteer_country->id?>"><?= $volunteer_country->title;?></option>
                           <?php }?>
                           </select>
                        </div>
                        
                        <div class="col-md-12 volunteer">
                  <select name="city_id" class="theme-input-style" id="state-volunteer" onchange="getregion_volunteer(this.value)";>
                     <option value="">المحافظة</option>
                  </select>
                        </div>
                        <div class="col-md-12 volunteer">
        <select name="region_id" class="theme-input-style" id="region_id_volunteer">
                <option value="">الاقليم</option>
                </select>
                        </div>
                        <div class="col-md-12 volunteer" >
                            <select name="type_registration" class="theme-input-style" id="type_registration" required>
                            <option value="">حدد مجال التطوع</option>
                               <?php
                            foreach($services as $services){
                            ?>
                             <option ><?= $services->name;?></option>
                           <?php }?>
                           </select>
                           
                        </div>
                        <div class="row" style="margin:0px">
                        <div class="col-md-6 volunteer">
                           <input type="date" name="date" id="date" class="theme-input-style" placeholder="الوقت المتاح لتطوعك" required>
                        </div>
                        <div class="col-md-4 volunteer">
                        <select name="hour" class="theme-input-style" id="hour" required>
                            <option value="">حدد الساعة</option>
                             <option >1</option>
                             <option >2</option>
                             <option >3</option>
                             <option >4</option>
                             <option >5</option>
                             <option >6</option>
                             <option >7</option>
                             <option >8</option>
                             <option >9</option>
                             <option >10</option>
                             <option >11</option>
                             <option >12</option>
                           </select>
                           </div>
                       <div class="col-md-2 volunteer">
                        <select name="time" class="theme-input-style" id="time" required>
                             <option ><?= lang("am")?></option>
                             <option ><?= lang("pm")?></option>
                           </select>
                           </div>
                           </div>
						<div class="col-12">
							<button type="submit" class="btn searchbutton mainheader" style="background-color:#367dfe !important;width:100%">
							<span>تسجيل الأن</span></button>
						</div>
						</form>
                     </div>
					 
					 
					 
                     <div class="help_request" style="margin:0px;display:none;width:100%">
						<form method="POST" action="#" class="contact-form">
						<div class="col-md-12" id="city_search">
							<select name="register_type" class="theme-input-style switch_type" required>
								<option value="2" selected>تسجيل طلب مساعدة</option>
								<option value="1">تسجيل كمتطوع</option>
								<option value="0">تسجيل مؤسسة</option>
							</select>
						 </div>
                        <div class="col-md-12 help_request">
                           <input type="text" name="name" class="theme-input-style" placeholder="الاسم" required>
                        </div>
                        <div class="col-md-12 help_request">
                           <input type="text" name="name" class="theme-input-style" placeholder="البريد الالكترونى" required>
                        </div>
                        <div class="col-md-12 help_request">
                           <input type="text" name="name" class="theme-input-style" placeholder="رقم الجوال" required>
                        </div>
                        <div class="col-md-12 help_request">

<select name="country_id" class="theme-input-style" id="country_id_help_request" onchange="getstate_help_reques(this.value)"; required>
                            <option value="">حدد الدولة من فضلك </option>
                               <?php
                            foreach($country_help as $country_help_request){
                            ?>
                             <option value="<?= $country_help_request->id?>"><?= $country_help_request->title;?></option>
                           <?php }?>
                           </select>
                        </div>
                        <div class="col-md-12 help_request">
         <select name="city_id" class="theme-input-style" id="state_help_reques" onchange="getregion_help_request(this.value)";>
                <option value="">المحافظة</option>
                                </select>
                        </div>
                        <div class="col-md-12 help_request">
                             <select name="region_id" class="theme-input-style" id="region_id_help_request">
                <option value="">الاقليم</option>
                                </select>
                        </div>
                        <div class="col-md-12 help_request">
<select name="help" class="theme-input-style" id="help" required>
                            <option value="">حدد نوع المساعدة </option>
                               <?php
                            foreach($help as $help){
                            ?>
                             <option ><?= $help->name;?></option>
                           <?php }?>
                           </select>
                        </div>
                        <div class="col-md-12 help_request" id="city_search">
                           <select name="institutions" class="theme-input-style" id="institutions" required>
                            <option value="">حدد المؤسسة المطلوبة </option>
                               <?php
                            foreach($institutions as $institutions){
                            ?>
                             <option ><?= $institutions->name;?></option>
                           <?php }?>
                           </select>
                        </div>
						<div class="col-12">
							<button type="submit" class="btn searchbutton mainheader" style="background-color:#367dfe !important;width:100%">
							<span>تسجيل الأن</span></button>
						</div>
						</form>
                     </div>
                     
                  </div>
                  <div class="form-response"></div>
               
            </div>
         </div>
         <div class="col-md-6 col-ms-12">
            <div id="mapCanvas" style="width: 100%;height:700px;"></div>
            <!--<img src="<?= DIR_DES_STYLE?>site_setting/<?=$home_page->slider_background?>" style="width:100%">-->
         </div>
      </div>
   </div>
   <!-- Banner Slider End -->
</section>
<!-- Slider End -->
<section class=" section-pattern  pt-50 pb-50" style="margin-top:0px;">
   <!-- Banner Slider Begin -->
   <div class="container">
      <div class="row" >
         <div class="col-md-4 col-ms-12">
            <img src="<?=DIR_DES_STYLE?>site_setting/<?=$home_page->img_step1?>" style="width:100%">
            <h3 style="font-size: 20px;text-align: center;color: #2a81ea;line-height: 30px;">Droplets that from infected person coughs or sneezes</h3>
            <p class="p" style="text-align:center;font-size:15px"><?=$home_page->content_first?></p>
         </div>
         <div class="col-md-4 col-ms-12" style="">
            <img src="<?=DIR_DES_STYLE?>site_setting/<?=$home_page->img_step2?>" style="width:100%"> 
            <h3 style="font-size: 20px;text-align: center;color: #2a81ea;line-height: 30px;">Touching or contact with infected surfaces or objects</h3>
            <p class="p" style="text-align:center;font-size:15px"><?=$home_page->content_second?></p>
         </div>
         <div class="col-md-4 col-ms-12">
            <img src="<?=DIR_DES_STYLE?>site_setting/<?=$home_page->img_step3?>" style="width:100%">
            <h3 style="font-size: 20px;text-align: center;color: #2a81ea;line-height: 30px;">Person-to-person spread as close contact with infected</h3>
            <p class="p" style="text-align:center;font-size:15px"><?=$home_page->content_third?></p>
         </div>
      </div>
   </div>
   <!-- Banner Slider End -->
</section>
<!-- CTA Begin -->
<section class="gradient_bg_db pt-50 pb-80">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <!-- CTA Content Begin -->
            <div class="cta-content text-center text-white">
               <hr class="hr">
               <h2><?= lang("LATEST_UPDATE");?></h2>
            </div>
            <div class="row">
               <?php
                  foreach($info_news as $infonews){
                  ?>
               <div class="col-md-4 col-ms-12" style="margin-bottom:40px">
                  <div class="blog-item">
                     <div class="blog-image">
                        <img src="<?= base_url()?>uploads/products/<?= $infonews->img?>" alt="">
                     </div>
                     <div class="blog-text">
                        <h3 class="title" style="letter-spacing: -0.025em;margin-bottom: 0.875rem;font-size: 1.25rem;">
                           <?php
                              if($infonews->link!=""){
                              ?>
                           <a href="<?= $infonews->link;?>" target="_blank"><?php echo ( $lang == 'arabic' )?$infonews->institute_about: $infonews->institute_about_en ; ?></a>
                           <?php } else {?>
                           <?php echo ( $lang == 'arabic' )?$infonews->institute_about: $infonews->institute_about_en ; ?>
                           <?php }?>
                        </h3>
                        <p><?php echo ( $lang == 'arabic' )?$infonews->institute_about: $infonews->institute_about_en ; ?></p>
                     </div>
                  </div>
               </div>
               <?php }?>
            </div>
            <!-- CTA Content End -->
         </div>
      </div>
   </div>
</section>
<!-- CTA End -->
<script type="text/javascript"></script>
</body>
</html>