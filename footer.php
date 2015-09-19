<script src="codemirror-5.6/lib/codemirror.js"></script>
	<script src="codemirror-5.6/mode/tibasic/tibasic.js"></script>
	<script src="codemirror-5.6/addon/selection/active-line.js"></script>
	<script src="codemirror-5.6/mode/meta.js"></script>
	<script type="text/javascript">
		var editor = CodeMirror.fromTextArea(document.getElementById("TTREA_code"), {
			mode: "tibasic",
			styleActiveLine: true,
			lineNumbers: true,
			//viewportMargin: Infinity,
			theme: "3024-night"
		});
		document.getElementById("BT_triangle").addEventListener("click", function() {
			editor.replaceRange("►", editor.getCursor());
		});
		document.getElementById("BT_arrow").addEventListener("click", function() {
			editor.replaceRange("→", editor.getCursor());
		});
		editor.on("change", function() {
			alert('test');
		});
	</script>
</body>
</html>
