// CodeMirror, copyright (c) by Marijn Haverbeke and others
// Distributed under an MIT license: http://codemirror.net/LICENSE
 
(function(mod) {
	if (typeof exports == "object" && typeof module == "object") // CommonJS
	mod(require("../../lib/codemirror"));
	else if (typeof define == "function" && define.amd) // AMD
	define(["../../lib/codemirror"], mod);
	else // Plain browser env
	mod(CodeMirror);
})(function(CodeMirror) {
"use strict";

CodeMirror.defineMode('tibasic_en', function(_config, parserConfig) {
	var keywords1, keywords2, others, graph;
 
	keywords1 = /^(►DMS|►Dec|►Frac|round|pxl\-Test|augment|rowSwap|row\+|\*row|\*row\+|max|min|R►Pr|R►Pθ|DispGraph|P►Rx|P►Ry|median|randM|mean|solve|seq|fnInt|nDeriv|fMin|fMax|CubicReg|QuartReg|RegEQ|rand|int|abs|det|identity|dim|sum|prod|not|iPart|fPart|npv|irr|bal|ΣPrn|ΣInt|►Nom|►Eff|dbd|lcm|gcd|randBin|sub|stdDev|variance|inString|normalcdf|invNorm|tcdf|X²cdf|Fcdf|binompdf|binomcdf|poissonpdf|poissoncdf|geometpdf|geometcdf|normalpdf|tpdf|X²pdf|Fpdf|randNorm|tvm_Pmt|conj|imag|angle|cumSum|expr|length|ΔList|ref|rref|►Rect|►Polar|SinReg|Logistic|LinRegTTest|ShadeNorm|Shade_t|ShadeX²|ShadeF|Matr►list|List►matr|Z\-Test|2\-SampZTest|1\-PropZTest|2\-PropZTest|X²\-Test|ZInterval|2\-SampZInt|1\-PropZInt|2\-PropZInt|GraphStyle|2\-SampTTest|2\-SampFTest|TInterval|2\-SampTInt|SetUpEditor|Pmt_End|Pmt_Bgn|ClrAllLists|GetCalc|DelVar|Equ►String|String►Equ|Clear Entries|Select|ANOVA|ModBoxplot|NormProbPlot|G\-T|ZoomFit|DiagnosticOn|DiagnosticOff|Archive|UnArchive|Asm|AsmPrgm|GarbageCollect|ln|log|Fill|SortA|SortD|DispTable|Menu|Send|Get|setDate|setTime|checkTmr|setDtFmt|setTmFmt|timeCnv|dayOfWk|getDtStr|getTmStr|getDate|getTime|startTmr|getDtFmt|getTmFmt|isClockOn|OpenLib|ExecLib|invT|LinRegTInt|Manual\-Fit|ZQuadrant1|matprintbox|remainder|logBASE|randIntNoRep|GraphColor|Text|TextColor|Asm84CPrgm|BorderColor|Asm83CEPrgm|Asm84CEPrgm|LinReg\(a\+bx\)|ExpReg|LnReg|PwrReg|Med[\-]Med|QuadReg|ClrList|ClrTable|Histogram|xyLine|Scatter|LinReg\(ax\+b\))\b/i;
	keywords2 = /^(PrintScreen|and|or|ZoomSto|StorePic|randInt|RecallPic|StoreGDB|RecallGDB|CaptVar|Clear|entries|Archive|UnArchive|Asm|AsmComp|AsmPrgm|GarbageCollect|If|xor|Then|Else|While|Repeat|For|End|Menu|Send|Asm83CEPrgm|Asm84CEPrgm)\b/i;
	graph = /^(pxl-Test|ClrDraw|StoreGDB|ClrHome|Text|Line|Vertical|Pt-On|Pt-Off|Pt-Change|Pxl-On|Pxl-Off|Pxl-Change|Shade|Circle|Horizontal|Tangent|DrawF|DrawInv|GraphStyle|GraphOn|Plo1|Plot2|Plot3|GraphColor|TextColor|BorderColor)\b/i;
	others = /^(Return|Lbl|Goto|DelVar|getkey|Pause|Stop|IS\>|DS\<|Input|Prompt|Disp|Output|ZXscl|ZYscl|Xscl|Yscl|Xmin|Xmax|Ymin|Ymax|Tmin|Tmax|θMin|θMax|ZXmin|ZXmax|ZYmin|ZYmax|Zθmin|Zθmax|ZTmin|ZTmax|TblStart|PlotStart|ZPlotStart|nMax|ZnMax|nMin|ZnMin|∆Tbl|Tstep|θstep|ZTstep|Zθstep|∆X|∆Y|XFact|YFact|TblInput|PMT|GraphPas|ZgraphPas|Xres|ZXres|TracePas|Radian|Degree|Normal|Sci|Eng|Float|Ans|Fix|Horiz|Full|Func|Param|Polar|Seq|Auto|Answer|Dec|Simul|PolarGC|RectGC|CoordOn|CoordOff|Thick|Dot\-Thick|AxesOn|AxesOff|GridDot|GridOn|GridOff|GridLine|LabelOn|LabelOff|Web|uvAxes|vwAxes|uwAxes|Graph|Trace|ZStandard|ZTrig|Zbox|Zoom|Zorthonormal|ZintConf|Zprevious|ZDecimal|ZoomStat|ZoomRcl|FnOn|FnOff|Real|ExprOn|ExprOff|G\-T|ZminMax|DiagnosticOn|DiagnosticOff|Manual\-Fit|ZQuadrant1|matprintbox|CLASSIC|MATHPRINT|AUTO|DEC|FRAC|FRAC\-APPROX|STATWIZARD|BackgroundOn|BackgroundOff|DetectAsymOn|DetectAsymOff|thin|dot)\b/i;

	var numbers = /\d+?.?\d+_/;
	var variables = /^(⌊[A-Z0-9]{1,8}|L₁|L₂|L₃|L₄|L₅|L₆|GDB[0-9]|Image[0-9]|Y₁|Y₂|Y₃|Y₄|Y₅|Y₆|Y₇|Y₈|Y₉|Y₀|X₁ᴛ|Y₁ᴛ|X₂ᴛ|Y₂ᴛ|X₃ᴛ|Y₃ᴛ|X₄ᴛ|Y₄ᴛ|X₅ᴛ|Y₅ᴛ|X₆ᴛ|Y₆ᴛ|r₁|r₂|r₃|r₄|r₅|r₆|Str[0-9])\b/;
	var values = /^(prgm[a-z0-9θ]{1,8}|RED|BLUE|BLACK|MAGENTA|GREEN|ORANGE|BROWN|NAVY|YELLOW|WHITE|LTBLUE|MEDGRAY|GRAY|LTGRAY|DARKGRAY)\b/;

	return {
		startState: function() {
			return {
				context: 0
			};
		},
		token: function(stream, state) {
			if (!stream.column())
				state.context = 0;

			if (stream.eatSpace())
				return null;

			var w;

			if (stream.eatWhile(/[a-zθ0-9₁₂₃₄₅₆►⌊ΔΣéèàê\.-]/i)) {
			 
				w = stream.current();
					
					if (keywords1.test(w)) {
						state.context = 1;
						return 'keyword';
					} else if (keywords2.test(w)) {
						state.context = 2;
						return 'property';
					} else if (numbers.test(w)) {
						return 'number';
					} else if (others.test(w)) {
						return 'comment';
					} else if (variables.test(w)) {
						return 'atom';
					} else if (graph.test(w)) {
						return 'variable-2';
					} else if (values.test(w)) {
						return 'number';
					}

					
				if (stream.match(numbers)) {
					return 'number';
				} else {
					return null;
				}
			} else if (stream.eat('"')) {
				while (w = stream.next()) {
					if (w == '"')
						break;
					if (w == '→')
						break;

					if (w == '\\')
						stream.next();
				}
				return 'string';
			} else if (stream.eat('\'')) {
				if (stream.match(/\\?.'/))
					return 'number';
			} else if (stream.eat('.') || stream.sol() && stream.eat('#')) {
				state.context = 5;

				if (stream.eatWhile(/\w/))
					return 'def';
			} else {
				stream.next();
			}
			return null;
		}
	};
});

CodeMirror.defineMIME("text/x-tibasic", "tibasic_en");

});
