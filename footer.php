
<script src="codemirror-5.6/lib/codemirror.js"></script>
<script src="codemirror-5.6/mode/tibasic/tibasic.js"></script>
	<script type="text/javascript">
		var editor = ace.edit("TTREA_code");
   		editor.setTheme("ace/theme/monokai");
   		editor.getSession().setMode("ace/mode/basic");
		var editor = CodeMirror.fromTextArea(document.getElementById("TTREA_code"), {
			mode: "tibasic",
			styleActiveLine: true,
			lineNumbers: true,
			viewportMargin: Infinity,
			theme: "3024-night"
		});
//
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
//
		editor.on("change", function() {
			if(editor.lineCount() > 20)
				document.querySelector(".cm-s-3024-night.CodeMirror").style.height = "auto";
			else
				document.querySelector(".cm-s-3024-night.CodeMirror").style.height = "330px";
		});
	</script>
	
</body>
</html>
