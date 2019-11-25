<input type="file" id="imgFile" />
<script>
	var fd = new FormData();
	fd.append('id', '123');
	fd.append('type', 'one');
	fd.append('img', $('#imgFile')[0].files[0]);

	$.ajax({
		type: 'POST',
		url: '/url/to/action',
		data: fd,
		processData: false,
		contentType: false,
		dataType: "json",
		success: function(data) {
			console.log(data);
		},
		error: function(data) {
			console.log(data);
		}
	});
</script>
