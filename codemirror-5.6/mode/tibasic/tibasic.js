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

CodeMirror.defineMode('tibasic', function(_config, parserConfig) {
	var keywords1, keywords2;
 
	keywords1 = /(►DMS|►Dec|►Frac|Boxplot|round|pxl\-Test|augment|rowSwap|row\+|\*row|\*row\+|max|min|R►Pr|R►Pθ|ClrHome|P►Rx|P►Ry|median|randM|mean|solve|seq|fnInt|nDeriv|fMin|fMax|CubicReg|QuartReg|or|xor|and|RegEQ|Fix|Horiz|Full|Func|Param|Polar|Seq|IndpntAuto|IndpntAsk|DependAuto|DependAsk|Sequential|Simul|PolarGC|RectGC|CoordOn|CoordOff|Thick|Dot|Dot\-Thick|AxesOn|AxesOff|GridDot|GridOn|GridOff|LabelOn|LabelOff|Web|Time|Trace|ClrDraw|ZStandard|ZTrig|ZBox|Zoom In|Zoom Out|ZSquare|ZInteger|ZPrevious|ZDecimal|ZoomStat|ZoomRcl|PrintScreen|ZoomSto|FnOn|FnOff|StorePic|RecallPic|StoreGDB|RecallGDB|Line|Vertical|Pt\-On|Pt\-Off|Pt\-Change|Pxl\-On|Pxl\-Off|Pxl\-Change|Shade|Circle|Horizontal|Tangent|DrawInv|DrawF|rand|getKey|int|abs|det|identity|dim|sum|prod|not|iPart|fPart|npv|irr|bal|ΣPrn|ΣInt|►Nom|►Eff|dbd|lcm|gcd|randInt|randBin|sub|stdDev|variance|inString|normalcdf|invNorm|tcdf|X²cdf|Fcdf|binompdf|binomcdf|poissonpdf|poissoncdf|geometpdf|geometcdf|normalpdf|tpdf|X²pdf|Fpdf|randNorm|tvm_Pmt|conj|real|imag|angle|cumSum|expr|length|ΔList|ref|rref|►Rect|►Polar|SinReg|Logistic|LinRegTTest|ShadeNorm|Shade_t|ShadeX²|ShadeF|Matr►list|List►matr|Z\-Test|2\-SampZTest|1\-PropZTest|2\-PropZTest|X²\-Test|ZInterval|2\-SampZInt|1\-PropZInt|2\-PropZInt|GraphStyle|2\-SampTTest|2\-SampFTest|TInterval|2\-SampTInt|SetUpEditor|Pmt_End|Pmt_Bgn|Real|ExprOn|ExprOff|ClrAllLists|GetCalc|DelVar|Equ►String|String►Equ|Clear Entries|Select|ANOVA|ModBoxplot|NormProbPlot|G\-T|ZoomFit|DiagnosticOn|DiagnosticOff|Archive|UnArchive|Asm|AsmComp|AsmPrgm|GarbageCollect|ln|log|Fill|SortA|SortD|DispTable|Menu|Send|Get|PlotsOn|PlotsOff|Plot1|Plot2|Plot3|setDate|setTime|checkTmr|setDtFmt|setTmFmt|timeCnv|dayOfWk|getDtStr|getTmStr|getDate|getTime|startTmr|getDtFmt|getTmFmt|isClockOn|ClockOff|ClockOn|OpenLib|ExecLib|invT|LinRegTInt|Manual\-Fit|ZQuadrant1|matprintbox|remainder|logBASE|randIntNoRep|CLASSIC|MATHPRINT|STATWIZARD ON|STATWIZARD OFF|GridLine|BackgroundOn|BackgroundOff|GraphColor|TextColor|Asm84CPrgm|DetectAsymOn|DetectAsymOff|BorderColor|Thin|Dot\-Thin|Asm83CEPrgm|Asm84CEPrgm|LinRega\+bx\)|ExpReg|LnReg|PwrReg|Med[\-]Med|QuadReg|ClrList|ClrTable|Histogram|xyLine|Scatter|LinRegax\+b\) )\b/i;
	keywords2 = /(If|Then|Else|While|Repeat|For|End|Return|Lbl|Goto|Pause|Stop|IS\>|DS\<|Input|Prompt|Disp|DispGraph|Output)/gi;

	var variables1 = /^([A-Zθ]|Str[0-9]|L[1-6]|\[[A-J]\])\b/i;
	var numbers = /^(\d+)\b/i;

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

			if (stream.eatWhile(/\w/)) {
			 
				w = stream.current();

					if ((state.context == 1 || state.context == 4) && variables1.test(w)) {
						state.context = 4;
						return 'var2';
					}

					if (keywords1.test(w)) {
						state.context = 1;
						return 'keyword';
					} else if (keywords2.test(w)) {
						state.context = 2;
						alert('plop');
						return 'keyword2';
					} else if (state.context == 4 && numbers.test(w)) {
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
			} else if (stream.eat('$')) {
				if (stream.eatWhile(/[\da-f]/i))
					return 'number';
			} else if (stream.eat('%')) {
				if (stream.eatWhile(/[01]/))
					return 'number';
			} else {
				stream.next();
			}
			return null;
		}
	};
});

CodeMirror.defineMIME("text/x-tibasic", "tibasic");

});
