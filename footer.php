
<script src="codemirror-5.6/lib/codemirror.js"></script>
<script src="codemirror-5.6/addon/selection/active-line.js"></script>
<script src="codemirror-5.6/mode/tibasic/tibasic_fr.js"></script>
<script src="codemirror-5.6/mode/tibasic/tibasic_en.js"></script>
	<script type="text/javascript">
		var editor = CodeMirror.fromTextArea(document.getElementById("TTREA_code"), {
			<?php if($_SESSION['lang'] == "EN") echo "mode: 'tibasic_en',"; else echo "mode: 'tibasic_fr'," ?>
			styleActiveLine: true,
			lineNumbers: true,
			viewportMargin: Infinity,
			theme: "base16-dark"
		});
	
		function changeLang(lang) {
			var content = editor.getValue();
			document.getElementsByClassName("CodeMirror").remove();
			editor = CodeMirror.fromTextArea(document.getElementById("TTREA_code"), {
				mode: lang,
				styleActiveLine: true,
				lineNumbers: true,
				viewportMargin: Infinity,
				theme: "base16-dark"
			});
			editor.setValue(content);
			if(editor.lineCount() > 20)
				document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "auto";
			editor.on("change", function() {
				if(editor.lineCount() > 20)
					document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "auto";
				else
					document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "330px";
			});
		}

		document.getElementById("BT_triangle").addEventListener("click", function() {
			editor.replaceRange("►", editor.getCursor());
			editor.focus();
		});
		document.getElementById("BT_arrow").addEventListener("click", function() {
			editor.replaceRange("→", editor.getCursor());
			editor.focus();
		});
		document.getElementById("BT_theta").addEventListener("click", function() {
			editor.replaceRange("θ", editor.getCursor());
			editor.focus();
		});
		document.getElementById("BT_sigma").addEventListener("click", function() {
			editor.replaceRange("Σ", editor.getCursor());
			editor.focus();
		});
		document.getElementById("BT_delta").addEventListener("click", function() {
			editor.replaceRange("∆", editor.getCursor());
			editor.focus();
		});
		document.getElementById("BT_list").addEventListener("click", function() {
			editor.replaceRange("⌊", editor.getCursor());
			editor.focus();
		});
		document.getElementById("BT_neg").addEventListener("click", function() {
			editor.replaceRange("⁻", editor.getCursor());
			editor.focus();
		});
		document.getElementById("BT_subT").addEventListener("click", function() {
			editor.replaceRange("ᴛ", editor.getCursor());
			editor.focus();
		});


		editor.on("change", function() {
			if(editor.lineCount() > 20)
				document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "auto";
			else
				document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "330px";
		});
		if(editor.lineCount() > 20)
			document.querySelector(".cm-s-base16-dark.CodeMirror").style.height = "auto";


		Element.prototype.remove = function() {
			this.parentElement.removeChild(this);
		}
		NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
			for(var i = this.length - 1; i >= 0; i--) {
				if(this[i] && this[i].parentElement) {
					this[i].parentElement.removeChild(this[i]);
				}
			}
		}
	</script>
	
</body>
</html>
