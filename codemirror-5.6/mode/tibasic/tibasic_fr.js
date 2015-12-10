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

CodeMirror.defineMode('tibasic_fr', function(_config, parserConfig) {
	var keywords1, keywords2, others, graph;
 
	keywords1 = /^(►DMS|►Dec|►Frac|sousch|arrondi|chaîne|Fill|permutLigne|ligne|max|min|R►Pr|R►Pθ|P►Rx|P►Ry|médianne|MatAléat|moyenne|résoudre|suite|fnInt|nDeriv|fMin|fMax|RegCubique|RegQuatre|RegEQ|Arrangement|Combinaison|VARSTRING|NbrAléat|partEnt|abs|dét|identité|dim|somme|prod|ent|partDéc|vactNet|tauxRi|paSolde|paSomPrinc|ΣInt|►Nom|►Eff|jed|ppcm|pgcd|entAléat|BinAléat|Sous-chaine|Ecart-type|variance|carChaine|normalFRép|FracNormale|studentFRép|X²FRép|FFRép|binomfdp|binomFRép|poissonFdp|poissonFRép|géomtFdp|géomtFRép|normalFdp|StudentFdp|Χ²Fdp|Ffdp|normAléat|vatPmt|vat_I%|vat_Vact|vat_N|vat_vacq|conj|reel|imag|argument|somCum|expr|longueur|Δliste|Gauss|Gauss-Jordan|►Rect|►Polaire|RegSin|Logistique|RegLinTTest|OmbreNorm|Matr►list|List►matr|Z-Test|T-Test|2-CompZTest|1-PropZTest|2-PropZTest|χ²-Test|2-CompZIntC|1-PropZInt|2-PropZInt|2-CompTTest|2-CompFTest|TintConf|2-CompTIntC|ListesDéfaut|Pmt_Fin|Pmt_Déb|EffToutListes|Equ►Chaine|Chaine►Equ|Sélect|ANUVA|GraphBoitMoust|GraphProbNorm|ln|log|sin|Arcsin|cos|Arccos|tan|Arctan|sh|Argsh|ch|Argch|th|Argth|Remplir|Tricroi|Tridécroi|défDate|défHeure|AffMintr|défFmtDt|défFmtHr|convHeur|joursem|AffChDt|affChHr|affDate|affHeure|actMintr|affFmtDt|affFmtHr|actHorl|HorlNAff|HorlAff|OuvrirBiblio|ExécBiblio|invT|χ²GOF-Test|LinRegTInt|remainder|logBASE|randIntNoRep|Stats|1-Var|2-Var|RegLin\(a\+bx\)|RegExp|RegLn|RegPuiss|Med-Med|RegQuad|EffListe|EffTable|Histogramme|Polygone|Nuage|RegLin\(ax\+b\))\b/i;
	keywords2 = /^(PrintScreen|et|ou|SauveFen|SauveImage|nbrAléatEnt|RappelImage|SauveBDG|RappelBDG|getkey|CaptVar|EffVar|Efface|entrées|Archive|DésArchive|Asm|AsmComp|AsmPrgm|RéorganiserMém|If|Then|Else|While|Repeat|For|End|Menu|Envoi|Capt|Asm83CEPrgm|Asm84CEPrgm)\b/i;
	graph = /^(pxl-Test|EffDessin|EnrBDG|EffDess|EffÉcran|Texte|Ligne|Line|Verticale|Pt-Aff|Pt-Naff|Pt-Change|Pxl-Aff|Pxl-Naff|Pxl-Change|Ombre|Cercle|Horizontale|Tangente|DessRecip|DessFonct|GraphStyle|AffGraph|Graph1|Graph2|Graph3|CouleurGraph|CouleurTexte|CouleurBord)\b/i;
	others = /^(Return|Lbl|Goto|DelVar|Pause|Stop|IS>|DS<|Input|Prompt|Disp|Output|ZXscl|ZYscl|Xscl|Yscl|Xmin|Xmax|Ymin|Ymax|Tmin|Tmax|θMin|θMax|ZXmin|ZXmax|ZYmin|ZYmax|Zθmin|Zθmax|ZTmin|ZTmax|TblStart|PlotStart|ZPlotStart|nMax|ZnMax|nMin|ZnMin|∆Tbl|Tstep|θstep|ZTstep|Zθstep|∆X|∆Y|XFact|YFact|TblInput|PMT|GraphPas|ZgraphPas|Xres|ZXres|TracePas|Radian|Degré|Normal|Sci|Ing|Flottant|Rep|Fixe|Horiz|PleinEcr|Fonct|Param|Polaire|Suite|ValeursAuto|ValeursDem|CalculsAuto|CalculsDem|Séquentiel|Simul|CoordPol|CoordRect|CoordAff|CoordNAff|Relié|Thick|NonRelié|Dot\-Thick|AxesAff|AxesNAff|GridDot|QuadAff|QuadNAff|EtiqAff|EtiqNAff|Toile|uvAxes|vwAxes|uwAxes|Graph|Format|Trace|ZStandard|ZTrig|Zboîte|Zoom|Zorthonormal|ZintConf|Zprécédent|Zdécimal|ZoomStat|ZoomRpl|FonctAff|FonctNAff|Réel|ExpAff|ExpNAff|G\-T|ZminMax|CorrelAff|CorrelNAff|Manual\-Fit|ZQuadrant1|matprintbox|CLASSIC|MATHPRINT|CLASSIC|AUTO|DEC|FRAC|FRAC-APPROX|STATWIZARD|ON|STATWIZARD|OFF|LigneAff|ArrPlanAff|ArrPlanNAff|DétectAsymAct|DétectAsymDés|Fin|Point)\b/i;

	var numbers = /\d+?.?\d+_/;
	var variables = /(⌊[A-Z0-9]{1,8}|L₁|L₂|L₃|L₄|L₅|L₆|BDG1|BDG2|BDG3|BDG4|BDG5|BDG6|BDG7|BDG8|BDG9|BDG0|Img0|Img1|Img2|Img3|Img4|Img5|Img6|Img7|Img8|Img9|Y₁|Y₂|Y₃|Y₄|Y₅|Y₆|Y₇|Y₈|Y₉|Y₀|X₁ᴛ|Y₁ᴛ|X₂ᴛ|Y₂ᴛ|X₃ᴛ|Y₃ᴛ|X₄ᴛ|Y₄ᴛ|X₅ᴛ|Y₅ᴛ|X₆ᴛ|Y₆ᴛ|r₁|r₂|r₃|r₄|r₅|r₆|Chn[0-9])\b/;
	var values = /(ROUGE|BLEU|NOIR|MAGENTA|VERT|ORANGE|MARRON|BLEU|MRN|JAUNE|BLANC|CLR|MOY|GRIS|FON)\b/;

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

CodeMirror.defineMIME("text/x-tibasic", "tibasic_fr");

});
