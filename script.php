<script>
$('body').ready(function(){
	function load_unseen_notification(view = '')
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data){
				$('.dropdown-menu2').html(data.notification2);
				if(data.unseen_notification2 > 0){
					$('.count2').html(data.unseen_notification2);
				}
			}
		});
	}
	load_unseen_notification();
});
</script>
