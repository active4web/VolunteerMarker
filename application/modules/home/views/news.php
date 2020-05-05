<div class="offcanvas-overlay fixed-top w-100 h-100"></div>
<style>
.card-text{
    line-height: 25px;
    font-size: 14px;
    direction: rtl;
    text-align: justify;
    margin-top: 10px;
}
.title_link{
	font-size: 15px;
}
</style>
<section class=" section-pattern bg pt-130 pb-50">
        <!-- Banner Slider Begin -->
        <div class="container">
        <div class="row" >
		<?php foreach($rss as $feeds){
			foreach($feeds as $item){
		//print_r($item);
		$description = strip_tags($item['description']);
		?>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
		  <img class="card-img-right flex-auto d-none d-md-block" src="<?=$item['enclosure'];?>" data-holder-rendered="true" style="width: 220px; height: 220px;">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"><a href="<?=$item['link'];?>"> المصدر : المصري اليوم </a></strong>
              <h4 class="mb-0" style="text-align: right;"><a class="text-dark title_link" href="<?=$item['link'];?>"><?=mb_substr($item['title'],0,50);?>...</a></h4>
              <p class="card-text mb-auto"><?=mb_substr($description,0,100);?>...</a>
			  <div class="mb-1 text-muted"><?php if(!empty($item['pubDate'])) {$time = strtotime($item['pubDate']); ?>
			  <?= date("M j, Y g:i A", $time); }?> </div>
            </div>
          </div>
        </div>
		<?php }}?>
      </div>
      </div>
      </section>