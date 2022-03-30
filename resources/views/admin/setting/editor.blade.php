{{-- Editor Style --}}
<style>
    * { border-radius:0 !important; }
body {
    font-family:"Open Sans", sans-serif;
    font-size: 16px;
    font-weight: 300;
    line-height: 1.6;
    color: #494949;
    background: #eaeaea;
		margin: 5% 0;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    color: inherit;
    font-family:"Raleway", sans-serif;
    font-weight: 300;
    line-height: 1.1;
}

.title h1, .title h2, .title h3, .title h4 { margin: 5px; }
.title {
    position: relative;
    display: block;
    padding-bottom: 0;
    border-bottom: 3px double #dcdcdc;
    margin-bottom: 30px;
}
	.title::before {
		width: 15%;
		height: 3px;
		background: #53bdff;
		position: absolute;
		bottom: -3px;
		content:'';
	}
a {
    color: #53bdff;
    text-decoration: none;
    outline: 0;
}
	a:hover {
		color: #06a0ff;
		text-decoration: none;
	}
p { margin: 10px 0; }

/* ==========================================================================
   WYSIWYG
   ========================================================================== */
#editor {
	resize: vertical;
	overflow: auto;
	line-height: 1.5;
	background-color: #fafafa;
  background-image: none;
	border: 0;
  border-bottom: 1px solid #3b8dbd;
	min-height: 150px;
	box-shadow: none;
	padding: 8px 16px;
	margin: 0 auto;
	font-size: 14px;
	transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
}
	#editor:focus {
		background-color: #f0f0f0;
		border-color: #38af5b;
		box-shadow: none;
		outline: 0 none;
	}

/* ==========================================================================
   Buttons
   ========================================================================== */
.btn {
  font-family:"Raleway", sans-serif;
  font-weight: 300;
  font-size: 1em;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  border: none;
  border-bottom: .15em solid black;
  padding: 0.65em 1.3em;
}
.btn-xs {
	font-size: .80em;
	padding: .25em .75em;
}

.btn-default {
  border-color: #d9d9d9;
  background-image: linear-gradient(#ffffff, #f2f2f2);
}
	.btn-default:hover { background: linear-gradient(#f2f2f2, #e6e6e6); }
</style>

{{-- Editor Options --}}
<div class="container">
	<div class="title">
		<h3>Simple Bootstrap WYSIWYG Editor</h3>
	</div>

	<div id="editparent">
		<div id="editControls">
			<div class="btn-group">
				<a class="btn btn-xs btn-default" data-role="undo" href="#" title="Undo"><i class="fa fa-undo"></i></a>
				<a class="btn btn-xs btn-default" data-role="redo" href="#" title="Redo"><i class="fa fa-repeat"></i></a>
			</div>
			<div class="btn-group">
				<a class="btn btn-xs btn-default" data-role="bold" href="#" title="Bold"><i class="fa fa-bold"></i></a>
				<a class="btn btn-xs btn-default" data-role="italic" href="#" title="Italic"><i class="fa fa-italic"></i></a>
				<a class="btn btn-xs btn-default" data-role="underline" href="#" title="Underline"><i class="fa fa-underline"></i></a>
				<a class="btn btn-xs btn-default" data-role="strikeThrough" href="#" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
			</div>
			<div class="btn-group">
				<a class="btn btn-xs btn-default" data-role="indent" href="#" title="Blockquote"><i class="fa fa-indent"></i></a>
				<a class="btn btn-xs btn-default" data-role="insertUnorderedList" href="#" title="Unordered List"><i class="fa fa-list-ul"></i></a>
				<a class="btn btn-xs btn-default" data-role="insertOrderedList" href="#" title="Ordered List"><i class="fa fa-list-ol"></i></a>
			</div>
			<div class="btn-group">
				<a class="btn btn-xs btn-default" data-role="h1" href="#" title="Heading 1"><i class="fa fa-header"></i><sup>1</sup></a>
				<a class="btn btn-xs btn-default" data-role="h2" href="#" title="Heading 2"><i class="fa fa-header"></i><sup>2</sup></a>
				<a class="btn btn-xs btn-default" data-role="h3" href="#" title="Heading 3"><i class="fa fa-header"></i><sup>3</sup></a>
				<a class="btn btn-xs btn-default" data-role="p" href="#" title="Paragraph"><i class="fa fa-paragraph"></i></a>
			</div>
		</div>
		<div id="editor" contenteditable></div>
		<textarea name="ticketDesc" id="editorCopy" required="required" style="display:none;"></textarea>
	</div>
</div>


<script>
    jQuery(document).ready(function($) {
	/** ******************************
		* Simple WYSIWYG
		****************************** **/
	$('#editControls a').click(function(e) {
		e.preventDefault();
		switch($(this).data('role')) {
			case 'h1':
			case 'h2':
			case 'h3':
			case 'p':
				document.execCommand('formatBlock', false, $(this).data('role'));
				break;
			default:
				document.execCommand($(this).data('role'), false, null);
				break;
		}

		var textval = $("#editor").html();
		$("#editorCopy").val(textval);
	});

	$("#editor").keyup(function() {
		var value = $(this).html();
		$("#editorCopy").val(value);
	}).keyup();
	
	$('#checkIt').click(function(e) {
		e.preventDefault();
		alert($("#editorCopy").val());
	});
});
</script>