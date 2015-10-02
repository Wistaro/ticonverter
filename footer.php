
<script src="codemirror-5.6/lib/codemirror.js"></script>
<script src="codemirror-5.6/mode/tibasic/tibasic.js"></script>
	<script type="text/javascript">
		var editor = CodeMirror.fromTextArea(document.getElementById("TTREA_code"), {
			mode: "tibasic",
			styleActiveLine: true,
			lineNumbers: true,
			viewportMargin: Infinity,
			theme: "base16-dark"
		});

		document.getElementById("BT_triangle").addEventListener("click", function() {
			editor.replaceRange("►", editor.getCursor());
		});
		document.getElementById("BT_arrow").addEventListener("click", function() {
			editor.replaceRange("→", editor.getCursor());
		});
		document.getElementById("BT_theta").addEventListener("click", function() {
			editor.replaceRange("θ", editor.getCursor());
		});
		document.getElementById("BT_sigma").addEventListener("click", function() {
			editor.replaceRange("Σ", editor.getCursor());
		});
		document.getElementById("BT_delta").addEventListener("click", function() {
			editor.replaceRange("Δ", editor.getCursor());
		});
		document.getElementById("BT_list").addEventListener("click", function() {
			editor.replaceRange("⌊", editor.getCursor());
		});

		editor.on("change", function() {
			if(editor.lineCount() > 20)
				document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "auto";
			else
				document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "330px";
		});
	</script>
	
</body>
</html>
