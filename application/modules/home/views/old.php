

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
                <div class="col-md-5 col-ms-12">
                    <!-- Section Title Begin -->
                    <div class="section-title text-center" style="background-color: #fff;padding: 10px; border: 2px solid #fff;">
                        <p class="p" style="color: #000;margin-top: 7px; font-size: 15px; text-align: center;"> نظام المساعدات المركزي     </p>
                       <form method="POST" action="#" class="contact-form">
                            <div class="row">
                                
                                 <div class="col-md-12" id="city_search">

<select name="register_type" class="theme-input-style" id="register_type">
                                       <option value="0">تسجيل مؤسسة</option>
                                        <option value="1">تسجيل كمتطوع</option>
                                       <option value="2">تسجيل طلب مساعدة</option>

                                      </select>
                                      </div>
                                      <div class="row foundation" style="margin:0px">
                                <div class="col-md-12 foundation">
                                                                       <label>اسم المؤسسة</label>

                                    <input type="text" name="name" class="theme-input-style" placeholder="اسم المؤسسة">
                                </div>
                               <div class="col-md-12 foundation">
                                   <label>البريد الألكترونى</label>
                            <input type="text" name="name" class="theme-input-style" placeholder="البريد الالكترونى">

                                </div>
                                  <div class="col-md-12 foundation" >
                                         <label>رقم الحوال</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="رقم الجوال">
                                   </div> 
                                <div class="col-md-12 foundation">
                                             <label>الدولة</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="الدولة">
                                   </div>
                                   <div class="col-md-12 foundation" >
                                        <label>المحافظة</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="المحافظة">
                                   </div>
                                   <div class="col-md-12 foundation">
                                <label>الاقليم</label>

                                    <input type="text" name="name" class="theme-input-style" placeholder="الاقليم">
                                   </div>
                                
<div class="col-md-12 foundation" id="city_search">
    <label>نوع التسجيل</label>
<select name="course_key" class="theme-input-style" id="course_key_search">
    <option value="1">تقديم مساعدة</option>
	<option value="2">طلب تطوع</option>
</select>
</div>
                                   
                    </div>
                    
                                   
                                   
                 <div class="row volunteer" style="display:none;margin:0px">
                                <div class="col-md-12 volunteer">
                                     <label>الاسم</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="الاسم">
                                </div>
                               <div class="col-md-12 volunteer">
                                   <label>رقم الهوية</label>
                            <input type="text" name="name" class="theme-input-style" placeholder="رقم الهوية">

                                </div>
                                
                                <div class="col-md-12 volunteer">
                                    <label>البريد الألكترونى</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="البريد الالكترونى">
                                   </div>
                                   <div class="col-md-12 volunteer">
                                       <label>رقم الجوال</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="رقم الجوال">
                                   </div>  
                         
                                   <div class="col-md-12 volunteer" >
                                       <label>الدولة</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="الدولة">
                                   </div>
                                   <div class="col-md-12 volunteer">
                                       <label>المحافظة</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="المحافظة">
                                   </div>
                                         <div class="col-md-12 foundation">
                                <label>الاقليم</label>

                                    <input type="text" name="name" class="theme-input-style" placeholder="الاقليم">
                                   </div>
                                  <div class="col-md-12 volunteer" >
                                      <label>مجال التطوع</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="مجال التطوع ">
                                   </div> 
                                  <div class="col-md-12 volunteer">
                                      <label>الوقت المتاح لتطوعك</label>
                                    <input type="date" name="name" class="theme-input-style" placeholder="الوقت المتاح لتطوعك">
                                   </div>                                    
                                   
                                   

                                   
                    </div>
                    
                    <div class="row help_request" style="display:none;margin:0px">
                                <div class="col-md-12 help_request">
                                    <label>الاسم</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="الاسم">
                                </div>
                             
                                <div class="col-md-12 help_request">
                                    <label>البريد الألكترونى</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="البريد الالكترونى">
                                   </div>
                                   <div class="col-md-12 help_request">
                                       <label>رقم الجوال</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="رقم الجوال">
                                   </div>  
                                   
                                   <div class="col-md-12 help_request" >
                                        <label>الدولة</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="الدولة">
                                   </div>
                                   <div class="col-md-12 help_request">
                                        <label>المحافظة</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder="المحافظة">
                                   </div>
                                         <div class="col-md-12 foundation">
                                <label>الاقليم</label>

                                    <input type="text" name="name" class="theme-input-style" placeholder="الاقليم">
                                   </div>
                                  <div class="col-md-12 help_request" >
                                       <label>نوع المساعدة</label>
                                    <input type="text" name="name" class="theme-input-style" placeholder=" نوع المساعدة">
                                   </div> 
                                                
                                     <div class="col-md-12 help_request" id="city_search">
<label>المؤسسة المساعدة</label>
<select name="course_key" class="theme-input-style" id="course_key_search">
    <option value="1">تقديم مساعدة</option>
	<option value="2">طلب تطوع</option>
</select>
</div>
                                   
                    </div>
                    
                                <div class="col-12">
                                    <button type="submit" class="btn searchbutton mainheader" style="background-color:#367dfe !important;width:100%">
                                       <span>تسجيل الأن</span></button>
                                </div>
                            </div>
                            <div class="form-response"></div>
                        </form>
                    </div>
                    
                    
               
                </div>
                <div class="col-md-1 col-ms-12"></div>
                <div class="col-md-6 col-ms-12">
                  <img src="<?= DIR_DES_STYLE?>site_setting/<?=$home_page->slider_background?>" style="width:100%">
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


    
   <!-- <section class="section section-l bg-light section-protect" id="protect" style="direction:ltr">
                <div class="container">
                    <div class="section-head text-center wide-lg">
                        <h5 class="subtitle">Do’s &amp; Don’ts</h5>
                        <h2 class="title">Protect yourself</h2>
                        <p style="margin: 0;line-height: 30px;padding-top: 20px; font-size: 19px;">The best thing you can do now is plan for how you can adapt your daily routine. Take few steps to protect yourself as Clean your hands often, Avoid close contact, Cover coughs and sneezes, clean daily used surfaces etc. The best way to prevent illness is to avoid being exposed to this virus.</p>
                    </div><!-- .section-head -->
                   <!-- <div class="section-content" style="direction:ltr">
                        <div class="row g-gs justify-content-center flex-lg-nowrap">
                            <div class="col-md-8 col-lg-5 col-xl-6 align-self-end">
                                <div class="protect-block-gfx">
                                    <img src="http://demo.themenio.com/kovid19/images/gfx/protect.png" alt="">
                                </div>
                            </div><!-- .col -->
                            <!--<div class="col-6 col-mb-5 col-sm-6 col-lg-4 col-xl-3 flex-grow-1 order-lg-first">
                                <div class="protect-item negative">
                                    <div class="protect-gfx">
                                        <img src="http://demo.themenio.com/kovid19/images/gfx/donts-a.png" alt="">
                                    </div>
                                    <div class="protect-text">
                                        <h5 class="title">Avoid Close Contact</h5>
                                    </div>
                                </div><!-- .protext-item -->
                               <!-- <div class="protect-item negative">
                                    <div class="protect-gfx">
                                        <img src="http://demo.themenio.com/kovid19/images/gfx/donts-b.png" alt="">
                                    </div>
                                    <div class="protect-text">
                                        <h5 class="title">Don’t Touch Face</h5>
                                    </div>
                                </div><!-- .protext-item -->
                                <div class="protect-item negative">
                                    <div class="protect-gfx">
                                        <img src="http://demo.themenio.com/kovid19/images/gfx/donts-c.png" alt="">
                                    </div>
                                    <div class="protect-text">
                                        <h5 class="title">Social Distancing</h5>
                                    </div>
                                </div><!-- .protext-item -->
                            </div><!-- .col -->
                            <div class="col-6 col-mb-5 col-sm-6 col-lg-4 col-xl-3 flex-grow-1 ">
                                <div class="protect-item positive">
                                    <div class="protect-gfx">
                                        <img src="http://demo.themenio.com/kovid19/images/gfx/dos-a.png" alt="">
                                    </div>
                                    <div class="protect-text">
                                        <h5 class="title">Wash Your Hands</h5>
                                    </div>
                                </div><!-- .protext-item -->
                                <div class="protect-item positive">
                                    <div class="protect-gfx">
                                        <img src="http://demo.themenio.com/kovid19/images/gfx/dos-b.png" alt="">
                                    </div>
                                    <div class="protect-text">
                                        <h5 class="title">Drink Much Watar</h5>
                                    </div>
                                </div><!-- .protext-item -->
                                <div class="protect-item positive">
                                    <div class="protect-gfx">
                                        <img src="http://demo.themenio.com/kovid19/images/gfx/dos-c.png" alt="">
                                    </div>
                                    <div class="protect-text">
                                        <h5 class="title">Use Face Mask</h5>
                                    </div>
                                </div><!-- .protext-item -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section>
    
        <section class="gradient_bg_db pd-50 pt-50">
        <div class="container">
            <div class="row">
        <div class="col-md-5 col-ms-12"><img src="<?=DIR_DES_STYLE?>site_setting/<?=$home_page->breif_img?>" style="width:100%"></div>
                 <div class="col-md-1 col-ms-12"></div>

                <div class="col-md-6 pt-50 pb-80 col-ms-12" style="direction:rtl;text-align:right"><?=$home_page->breif_txt_ar?>
                <div class="single-info" style="text-align:center">
                                   
                                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Begin -->
    <section class="gradient_bg_db pt-50 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- CTA Content Begin -->
                    <div class="cta-content text-center text-white">
                        <hr class="hr">
                        <h2>LATEST UPDATE</h2>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4 col-ms-12" style="margin-bottom:40px">
                          <div class="blog-item">
                                    <div class="blog-image">
                                        <img src="http://demo.themenio.com/kovid19/images/blog/blog-a.jpg" alt="">
                                    </div>
                                    <div class="blog-text">
                                        <h2 class="title" style="letter-spacing: -0.025em;margin-bottom: 0.875rem;font-size: 1.25rem;"><a href="#">Caring for someone at home</a></h2>
                                        <p>Most people who get sick with COVID-19 will have only mild illness and should recover at home. Care at home can help stop the spread of COVID-19</p>
                                    </div>
                                </div>
                            
                        </div>
                       
                        
                        <div class="col-md-4 col-ms-12" style="margin-bottom:40px">
                          <div class="blog-item">
                                    <div class="blog-image">
                                        <img src="http://demo.themenio.com/kovid19/images/blog/blog-b.jpg" alt="">
                                    </div>
                                    <div class="blog-text">
                                        <h2 class="title" style="letter-spacing: -0.025em;margin-bottom: 0.875rem;font-size: 1.25rem;">
                                            <a href="#">15 ways to keep safe and healthy</a></h2>
                                        <p>Most people who get sick with COVID-19 will have only mild illness and should recover at home. Care at home can help stop the spread of COVID-19</p>
                                    </div>
                                </div>
                            
                        </div>
                       
                       
                       <div class="col-md-4 col-ms-12" style="margin-bottom:40px">
                          <div class="blog-item">
                                    <div class="blog-image">
                                        <img src="http://demo.themenio.com/kovid19/images/blog/blog-c.jpg" alt="">
                                    </div>
                                    <div class="blog-text">
                                        <h2 class="title" style="letter-spacing: -0.025em;margin-bottom: 0.875rem;font-size: 1.25rem;">
                                            <a href="#">If You Think You Are Sick</a></h2>
                                        <p>Most people who get sick with COVID-19 will have only mild illness and should recover at home. Care at home can help stop the spread of COVID-19</p>
                                    </div>
                                </div>
                            
                        </div>
                       
                        
                    </div>
                    <!-- CTA Content End -->
                </div>
            </div>
        </div>
    </section>
    <!-- CTA End -->



  <script type="text/javascript">
    </script>

</body>
</html>