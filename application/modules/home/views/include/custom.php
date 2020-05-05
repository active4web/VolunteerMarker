<script>
function getState_volunteer(val) {
$.ajax({
	type: "POST",
	url: "<?= base_url()?>home/get_state_volunteer",
	data:'country_id='+val,
	success: function(data){
		$("#state-volunteer").html(data);
	}
	});
}
</script>


<script>
function getregion_volunteer(val) {
$.ajax({
	type: "POST",
	url: "<?= base_url()?>home/get_region_volunteer",
	data:'country_id='+val,
	success: function(data){
		$("#region_id_volunteer").html(data);
	}
	});
}
</script>


<script>
function getstate_help_reques(val) {
$.ajax({
	type: "POST",
	url: "<?= base_url()?>home/get_state_volunteer",
	data:'country_id='+val,
	success: function(data){
		$("#state_help_reques").html(data);
	}
	});
}
</script>

<script>
function getregion_help_request(val) {
$.ajax({
	type: "POST",
	url: "<?= base_url()?>home/get_region_volunteer",
	data:'country_id='+val,
	success: function(data){
		$("#region_id_help_request").html(data);
	}
	});
}
</script>



<script>
function getregion_foundation(val) {
$.ajax({
	type: "POST",
	url: "<?= base_url()?>home/get_region_volunteer",
	data:'country_id='+val,
	success: function(data){
		$("#region_id_foundation").html(data);
	}
	});
}
</script>

<script>
function getstate_foundation(val) {
$.ajax({
	type: "POST",
	url: "<?= base_url()?>home/get_state_volunteer",
	data:'country_id='+val,
	success: function(data){
		$("#state_foundation").html(data);
	}
	});
}
</script>

<script>
$(document).ready(function(){
$(".switch_type").change(function() {
var value= $(this).val();
//alert(value);
if(value==0){
		$(".foundation").show("");
		$(".help_request").hide("");
		$(".volunteer").hide("");
	}else if(value==1){
		$(".volunteer").show("");
		$(".foundation").hide("");
		$(".help_request").hide("");
	}else if(value==2){
		$(".help_request").show("");
		$(".foundation").hide("");
		$(".volunteer").hide("");
	}
});

});
</script>

