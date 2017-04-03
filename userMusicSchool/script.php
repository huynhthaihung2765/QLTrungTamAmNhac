<script>
$('body').ready(function(){
	$('.comment_form').on('submit', function(event){
		event.preventDefault();
		if($('#subject').val() != '' && $('#comment').val() != '' && $('#tenmonhoc').val() != '' && $('#capdo').val() != ''  && $('#buoitrongngay').val() != ''){
			if($('#ngaytrongtuan').val() != '' && $('#giaovien').val() != '' && $('#tennguoixin').val() != ''){
				var form_data = $(this).serialize();
				$.ajax({
					url:"insert.php",
					method:"POST",
					data:form_data,
					success:function(data){
						$('.comment_form')[0].reset();
					}
				})
			}
		}
		else {
			alert("Both Fields are required");
		}
	});
});
</script>
