<script>
	$('span.demo1').contextMenu('myMenu1', {

		bindings: {

			'open': function(t) {

				alert('Trigger was '+t.id+'\nAction was Open');

			},

			'email': function(t) {

				alert('Trigger was '+t.id+'\nAction was Email');

			},

			'save': function(t) {

				alert('Trigger was '+t.id+'\nAction was Save');

			},

			'delete': function(t) {

				alert('Trigger was '+t.id+'\nAction was Delete');

			}

		}

	});
</script>

<span class="demo1" id="demo1_yellow">
	<b>RIGHT CLICK FOR DEMO</b>
</span>
<div class="contextMenu" id="myMenu1">

	<ul>

		<li id="open"><img src="folder.png" /> Open</li>

		<li id="email"><img src="email.png" /> Email</li>

		<li id="save"><img src="disk.png" /> Save</li>

		<li id="close"><img src="cross.png" /> Close</li>

	</ul>

</div>
