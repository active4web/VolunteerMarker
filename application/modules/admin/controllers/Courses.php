<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('data','','true');
        $this->load->model('paging','','true');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url','text'));
        $this->load->library('lib_pagination'); 
    }

    public function index(){
		redirect(base_url().'admin/Courses/inside','refresh');
    }
	
	public function gen_random_string()
    {
        $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
        $final_rand='';
        for($i=0;$i<4; $i++) {
            $final_rand .= $chars[ rand(0,strlen($chars)-1)];
        }
        return $final_rand;
    }
	
	
    public  function search_username(){
        $phone=$this->input->post('phone');
        $len=strlen($phone);
        $a=array();
        $sql=$this->db->get_where('customers',array('view'=>'1','phone!='=>""))->result();
        if(count($sql)>0){
        foreach($sql as $sql){
        $user_phone=$sql->phone;
        if(substr($user_phone,0,$len)==$phone){
        array_push($a,$user_phone);
        }
        }
    }
echo json_encode($a);    
    }


    public function customer_search(){
        $phone=$this->input->get('phone');
		$where = "phone=$phone";
        $pg_config['sql'] = $this->data->get_sql('customers',$where,'id','DESC');
        $pg_config['per_page'] = 40;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/users/customer_search", $data); 
    }	
    public function inside(){
		
       $tables = "products";
    $config = array();
    $config['base_url'] = base_url().'admin/courses/inside'; 
    $config['total_rows'] = $this->data->record_count($tables,array(),'','id','desc');
    $config['per_page'] =30;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';   
    $config['last_link'] = '»»';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['first_link'] = '««';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '<';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
   // $config['suffix'] = '?' . http_build_query($_GET, '', "&");
    //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
    
    $this->pagination->initialize($config);
    if($this->uri->segment(4)){
    $page = ($this->uri->segment(4)) ;
    }
    else{
    $page =0;
    }
    
    $rs = $this->db->get($tables);
    if($rs->num_rows() == 0):
    $data["results"] = array();
    $data["links"] = array();
      //$main_data=$this->db->get_where($tables,array('view'=>'1'))->result();
$result_amount=0;
$data["result_amount"] = $result_amount;
    else:
    $data["results"] = $this->data->view_all_data($tables, array(), $config["per_page"], $page,'id','desc');
    $main_data=$this->db->get_where($tables)->result();
$result_amount=count($main_data);

    $str_links = $this->pagination->create_links();
    $data["links"] = explode('&nbsp;',$str_links);
     $data["result_amount"] = $result_amount;
    endif;
        $this->load->view("admin/courses/inside", $data); 
    }
    
  
      public function insidecourses_content(){
		$id_course=$this->input->get("course_id");
        $pg_config['sql'] = $this->data->get_sql('course_info',array("id_course"=>$id_course,'type!='=>2),'id','DESC');
        $pg_config['per_page'] = 40;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/courses/insidecourses_content", $data); 
    }  
    
     public function bags_content(){
		$id_course=$this->input->get("course_id");
        $pg_config['sql'] = $this->data->get_sql('course_info',array("id_course"=>$id_course,'type'=>2),'id','DESC');
        $pg_config['per_page'] = 40;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/courses/bags_content", $data); 
    }  
         public function add_course_content(){
        $this->load->view("admin/courses/add_course_content"); 
    }  
    
    
    
	public function add_content_action(){
	    $type=$this->input->post('type');
	    $course_id=$this->input->post('course_id');
	    if($type!=2){
	   $user_id = get_table_filed('products',array('id'=>$course_id),"user_id");
	   $status= get_table_filed('products',array('id'=>$course_id),"type");
	    }
	    else if($type==2){
	    $user_id = get_table_filed('bag_info',array('id'=>$course_id),"user_id");
	     $status=2;
	    }
       $field_values_array = $_POST['field_name'];
       for($i=0; $i<count($field_values_array); $i++){
$data['content'] = $field_values_array[$i];
$data['id_course'] = $course_id;
$data['id_user'] =$user_id;
$data['type'] =$status;
$this->db->insert('course_info',$data);
}
$this->session->set_flashdata('msg', 'تم الأضافة بنجاح');
if($type==1){
redirect(base_url()."admin/courses/insidecourses_content?course_id=$course_id",'refresh');
}
else {
  redirect(base_url()."admin/courses/bags_content?course_id=$course_id",'refresh');  
}
}
    
    
    
        public function rate_details(){
	   $id=$this->input->get('id');
	   $course_type=$this->input->get('course_type');
	   	$where =array("id_course"=>$id,"course_key"=>$course_type) ;
        $pg_config['sql'] = $this->data->get_sql('reviews',$where,'id','DESC');
        $pg_config['per_page'] = 40;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/courses/rate_details", $data); 
    }
   
           public function bags(){
		$where = "status='3'";
        $pg_config['sql'] = $this->data->get_sql('bag_info','','id','DESC');
        $pg_config['per_page'] = 40;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/courses/bags", $data); 
    }
    
 public function bags_rate(){
	   $id=$this->input->get('id');
	   $course_type=$this->input->get('course_type');
	   	$where =array("id_course"=>$id,"course_key"=>$course_type) ;
        $pg_config['sql'] = $this->data->get_sql('reviews',$where,'id','DESC');
        $pg_config['per_page'] = 40;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/courses/bags_rate", $data); 
    }
	
	public function show_none(){
		$where = "status='0'";
        $pg_config['sql'] = $this->data->get_sql('customers',$where,'id','DESC');
        $pg_config['per_page'] = 10;
        $data = $this->lib_pagination->create_pagination($pg_config);
        $this->load->view("admin/customers/show_none", $data); 
    }
	
	public function edit(){
		$id=$this->input->get('id');
        $data['data'] = $this->data->get_table_data('products',array('id'=>$id));
         $data['country'] = $this->data->get_table_data('country',array('view'=>'1'));
         $data['category'] = $this->data->get_table_data('category',array('view'=>'1'));
         $data['Institute'] = $this->data->get_table_data('Institute',array('id_course'=>$id));
        $this->load->view("admin/courses/edit",$data); 
	}
	
	public function edit_bag(){
		$id=$this->input->get('id');
        $data['data'] = $this->data->get_table_data('bag_info',array('id'=>$id));
        $this->load->view("admin/courses/edit_bag",$data); 
	}	
	
		public function edit_content(){
		$id=$this->input->get('id');
        $data['data'] = $this->data->get_table_data('course_info',array('id'=>$id));
        $this->load->view("admin/courses/edit_content",$data); 
	}	
	
	
	


	public function edit_content_action(){
	    $id_courses=$this->input->post('id');
	    $type=$this->input->post('type');
	    $course_id=$this->input->post('course_id');
        $content=$this->input->post('content');
$data['content'] = $content;
$this->db->update('course_info',$data,array("id"=>$id_courses));

$this->session->set_flashdata('msg', 'تم الأضافة بنجاح');
if($type==1){
redirect(base_url()."admin/courses/insidecourses_content?course_id=$course_id",'refresh');
}
else {
  redirect(base_url()."admin/courses/bags_content?course_id=$course_id",'refresh');  
}
}

	
	public function editbag_action(){
	    $id_courses=$this->input->post('id');
        $title=$this->input->post('title');
        $bage_hrs=$this->input->post('bage_hrs');
        $week_bage_daies=$this->input->post('week_bage_daies');
 $bage_total_daies=$this->input->post('bage_total_daies');
        $cat_id=$this->input->post('cat_id');
      $bage_details=$this->input->post('bage_details');

         $data['bage_name'] = $title;
         $data['bage_details'] = $bage_details;
         $data['bage_hrs'] = $bage_hrs;
         $data['bage_total_daies'] = $bage_total_daies;
         $data['creation_date'] = date("Y-m-d");
         $data['dep_id'] = $cat_id;
         $data['week_bage_daies'] = $week_bage_daies;
        $this->db->update('bag_info',$data,array("id"=>$id_courses));
if($_FILES['img_course']['name']!=""){
$file=$_FILES['img_course']['name'];
$file_name="img_course";
$config=get_img_config_course('bag_info','uploads/products/',$file,$file_name,'img','gif|jpg|png|jpeg',600000,600000,600000,array('id'=>$id_courses),"400","400",$id_courses);
}

if($id_courses!=""){
echo 1;
}
else {
echo 0;
}
}
	
	public function get_state(){
    header ('Content-Type: text/html; charset=UTF-8'); 
$country_id=$this->input->post('country_id');
$data_p=$this->db->get_where('city',array('view'=>'1','country_id'=>$country_id))->result();
if(count($data_p)>0){
    echo "<option value=''>حدد المدينة</option>";
    foreach($data_p as $data_p){
 echo "<option value='$data_p->id'>$data_p->name</option>";
    }
}
else {
  echo "<option value=''>لا يوجد حاليا اى بيانات</option>";   
}
}    

	
public function edit_action(){
$id_courses=$this->input->post('id');

$link=$this->input->post('link');
        $institute_about_en=$this->input->post('institute_about_en');
        $institute_about=$this->input->post('institute_about');
        $source_en=$this->input->post('source_en');
        $source=$this->input->post('source');
        $title=$this->input->post('title');
        $title_en=$this->input->post('title_en');
        
       
         $data['title'] = $title;
         $data['title_en'] = $title_en;
         $data['source'] = $source;
         $data['source_en'] = $source_en;
         $data['institute_about'] = $institute_about;
         $data['institute_about_en'] = $institute_about_en;
         $data['link'] = $link;

$this->db->update('products',$data,array("id"=>$id_courses));
        
if($_FILES['img']['name']!=""){
$file=$_FILES['img']['name'];
$file_name="img";
$config=get_img_config_course('products','uploads/products/',$file,$file_name,'img','gif|jpg|png|jpeg',600000,600000,600000,array('id'=>$id_courses),"400","400",$id_courses);
}


if($id_courses!=""){
echo 1;
}
else {
echo 0;
}

	}
	


    
 public function add_course(){
  $this->load->view("admin/courses/add_course"); 
    }

    public function add_action(){
        $link=$this->input->post('link');
        $institute_about_en=$this->input->post('institute_about_en');
        $institute_about=$this->input->post('institute_about');
        $source_en=$this->input->post('source_en');
        $source=$this->input->post('source');
        $title=$this->input->post('title');
        $title_en=$this->input->post('title_en');
        
       
         $data['title'] = $title;
         $data['title_en'] = $title_en;
         $data['source'] = $source;
         $data['source_en'] = $source_en;
         $data['institute_about'] = $institute_about;
         $data['institute_about_en'] = $institute_about_en;
         $data['link'] = $link;
         $data['creation_date'] = date("Y-m-d");
        $this->db->insert('products',$data);
        
$id_courses = $this->db->insert_id();

if($_FILES['img']['name']!=""){
$file=$_FILES['img']['name'];
$file_name="img";
$config=get_img_config_course('products','uploads/products/',$file,$file_name,'img','gif|jpg|png|jpeg',600000,600000,600000,array('id'=>$id_courses),"400","400",$id_courses);
}




if($id_courses!=""){
echo $config;
}
else {
echo 0;
}
    }

public function test(){
do_resize(42);  

}






    function active(){
        $id = $this->input->post("id");
        $ser = $this->db->get_where("products",array("id"=>$id,"view" => "1"))->num_rows();
        if ($ser == 1) {
            $this->db->update("products",array("view" => "0"),array("id"=>$id));
            echo "0";
        }
        if ($ser == 0) {
            $this->db->update("products",array("view" => "1"),array("id"=>$id));
            echo "1";
        } 
    }





    public function delete(){
        $id_customers = $this->input->get('id_customers');
        $check=$this->input->post('check');

        if($id_customers!=""){
        $ret_value=$this->db->update('products',array('delete_key'=>'0'),array('id'=>$id_customers)); 
        }
     
        if(isset($check) && $check!=""){  
        $check=$this->input->post('check');
        $length=count($check);
        for($i=0;$i<$length;$i++){
        $ret_value=$$this->db->update('products',array('delete_key'=>'0'),array('id_customers'=>$check[$i]));    
        }
        }
        $this->session->set_flashdata('msg', 'تم الحذف بنجاح');
redirect(base_url().'admin/courses/inside/','refresh');


    }
    
 
    
    

}