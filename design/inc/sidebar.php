        <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item start <?php if($curt=='home'){echo'active open';}?>">
                        <a href="<?=$url;?>admin" class="nav-link ">
                            <i class="icon-home"></i>
                                        <span class="title">لوحة التحكم</span>
                                        <span class="selected"></span>
                                    </a>
                    </li>
                   
	<li class="nav-item start <?php if($curt=='help'||$curt=='institutions'||$curt=='services'||$curt=='setting'){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
								<span class="title">الاعدادات </span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                            
                             <li class="nav-item  ">
                              
                                    <a href="<?=base_url()?>admin/setting" class="nav-link ">
                                        <span class="title">الاعدادات</span>
                                    </a>
                                </li>
							   
							   <li class="nav-item  <?php if($curt=='services'||$curt=='setting'){echo'active open';}?>">
                              
                                    <a href="<?=base_url()?>admin/services/" class="nav-link ">
                                        <span class="title">مجال التطوع</span>
                                    </a>
                                </li>
                                
                                 <li class="nav-item  <?php if($curt=='institutions'){echo'active open';}?>">
                              
                                    <a href="<?=base_url()?>admin/services/institutions" class="nav-link ">
                                        <span class="title">المؤسسات المساعدة</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item  <?php if($curt=='help'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/services/help" class="nav-link ">
                                        <span class="title">نوع المساعدة</span>
                                    </a>
                                </li>
							
                            </ul>
                    </li>
                    
                    
	
                    
					<li class="nav-item start <?php if($curt=='homepage'){echo'active open';}?>">
                        
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
								<span class="title">الصفحة الرئيسية</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item  ">
                              
                                    <a href="<?=base_url()?>admin/pages/steps" class="nav-link ">
                                        <span class="title">خطوات الاستخدام</span>
                                    </a>
                                </li>
							
						
                            </ul>
                    </li>
				
                    
                    	<li class="nav-item start <?php if($curt=='places'|| $curt=='region'|| $curt=='city' ){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
								<span class="title">الأماكن</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
							<li class="nav-item  <?php if($curt=='places'){echo'active open';}?>">
							
							<a href="<?=base_url()?>admin/places/countries" class="nav-link ">
                            <i class="icon-note"></i>
								<span class="title">الدول</span>
							</a>
						</li>

							<li class="nav-item  <?php if($curt=='city' ){echo'active open';}?>">
								<a href="<?=base_url()?>admin/places/cities" class="nav-link">
                                <i class="icon-eye"></i>
									<span class="title">المدن</span>
								</a>
							</li>
							
								<li class="nav-item  <?php if($curt=='region'){echo'active open';}?>">
								<a href="<?=base_url()?>admin/places/region" class="nav-link">
                                <i class="icon-eye"></i>
									<span class="title">الأقليم</span>
								</a>
							</li>
							
							</ul>
                    </li>
                    
                                        
                      <li class="nav-item start <?php if($curt=="trainers"||$curt=='customers'||$curt=='bags_provider'){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-users"></i>
								<span class="title">التسجيلات 
								</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                            <li class="nav-item <?php if($curt=='customers'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/users/customers" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title">سجيل مؤسسات 
                                    </a>
								</li>

                                <li class="nav-item <?php if($curt=='trainers'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/users/trainers" class="nav-link ">
                                    <i class="fa fa-graduation-cap"></i>
                                        <span class="title">سجيل المتطوعين</span></span>
                                    </a>
								</li>
								
								 <li class="nav-item <?php if($curt=='bags_provider'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/users/bags_provider" class="nav-link ">
                                    <i class="fa fa-users"></i>
                                        <span class="title">طلب مساعدة 
                        </span>
                                    </a>
								</li>

                                </ul>
                    </li>
                    
                    
                    
                      <li class="nav-item start <?php if($curt=='courses'){echo'active open';}?>">
						<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-newspaper-o"></i>
								<span class="title">الأخبار الداخلية</span>
                                <span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                            <li class="nav-item <?php if($curt=='courses'){echo'active open';}?>">
                                    <a href="<?=base_url()?>admin/courses/inside" class="nav-link ">
                                        <i class="icon-note"></i>
                                        <span class="title">الأخبار الداخلية</span>
                                    </a>
								</li>

                            
								                        

                                </ul>
                    </li>
            
							
                             	
                            </ul>
                        </li>
                        
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
