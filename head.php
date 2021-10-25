<?php
	function separator() {
		echo "<div class=\"border-top my-4\"></div>";
	}
 ?>
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="description" content="SELL - A Simple E Learning Language">
	<meta name="author" content="Andreas Schwenk - TH Köln">

	<!-- TODO: icon -->

	<title>SELL - A Simple E Learning Language</title>

	<link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">

	<script>MathJax = { loader: {load: ['input/asciimath', 'output/svg', 'ui/menu'] }, };</script>
	<script type="text/javascript" id="MathJax-script" async src="node_modules/mathjax/es5/startup.js"></script>

	<script src="node_modules/mathjs/lib/browser/math.js" type="text/javascript"></script>

	<script src="node_modules/jquery/dist/jquery.min.js"></script>

	<link rel="stylesheet" href="node_modules/codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="node_modules/codemirror/theme/idea.css">
	<script src="node_modules/codemirror/lib/codemirror.js"></script>
    <script src="node_modules/codemirror/mode/clike/clike.js"></script>
	<script src="node_modules/codemirror/addon/mode/simple.js"></script>

    <script src="node_modules/sellquiz/build/js/sellquiz.min.js?version=<?php $date = date_create(); echo date_timestamp_get($date); ?>"></script>
    <script src="node_modules/sellquiz/build/js/sellquiz.ide.min.js?version=<?php $date = date_create(); echo date_timestamp_get($date); ?>"></script>

    <script src="index-examples.js"></script> <!-- TODO: only used in index.php -->

	<style>
		/* visible tabs:   https://github.com/codemirror/CodeMirror/blob/master/demo/visibletabs.html  */
		.cm-tab {
	         background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAMCAYAAAAkuj5RAAAAAXNSR0IArs4c6QAAAGFJREFUSMft1LsRQFAQheHPowAKoACx3IgEKtaEHujDjORSgWTH/ZOdnZOcM/sgk/kFFWY0qV8foQwS4MKBCS3qR6ixBJvElOobYAtivseIE120FaowJPN75GMu8j/LfMwNjh4HUpwg4LUAAAAASUVORK5CYII=);
	         background-position: right;
	         background-repeat: no-repeat;
	      }
		  .anchor {
			position:absolute;
			top:-50px;
		}
	</style>

	<script>	// https://codemirror.net/demo/simplemode.html
	CodeMirror.defineSimpleMode("sellmode", {
  // The start state contains the rules that are intially used
  start: [
    // The regex matches the token, the token property contains the type
    //{regex: /"(?:[^\\]|\\.)*?(?:"|$)/, token: "string"},
	{regex: /\$(?:[^\\]|\\.)*?(?:\$|$)/, token: "string"},
    // You can match multiple tokens at once. Note that the captured
    // groups must span the whole string in this case
    {regex: /(function)(\s+)([a-z$][\w$]*)/,
     token: ["keyword", null, "variable-2"]},
    // Rules are matched in the order in which they appear, so there is
    // no ambiguity between this one and the one above
    {regex: /(?:sin|cos|det|MM|xgcd|mod|in|sqrt)\b/,
     token: "keyword"},
    {regex: /true|false|null|undefined/, token: "atom"},
    {regex: /0x[a-f\d]+|[-+]?(?:\.\d+|\d+\.?\d*)(?:e[-+]?\d+)?/i,
     token: "number"},
    //{regex: /\/\/.*/, token: "comment"},
	{regex: /\%.*/, token: "comment"},
    {regex: /\/(?:[^\\]|\\.)*?\//, token: "variable-3"},
    // A next property will cause the mode to move to a different state
    {regex: /\/\*/, token: "comment", next: "comment"},
    {regex: /[-+\/*=<>!]+/, token: "operator"},
    // indent and dedent properties guide autoindentation
    {regex: /[\{\[\(]/, indent: true},
    {regex: /[\}\]\)]/, dedent: true},
    {regex: /[a-z$][\w$]*/, token: "variable"},
    // You can embed other modes with the mode property. This rule
    // causes all code between << and >> to be highlighted with the XML
    // mode.
    {regex: /<</, token: "meta", mode: {spec: "xml", end: />>/}}
  ],
  // The multi-line comment state.
  comment: [
    {regex: /.*?\*\//, token: "comment", next: "start"},
    {regex: /.*/, token: "comment"}
  ],
  // The meta property contains global information about the mode. It
  // can contain properties like lineComment, which are supported by
  // all modes, and also directives like dontIndentStates, which are
  // specific to simple modes.
  meta: {
    dontIndentStates: ["comment"],
    //lineComment: "//"
	lineComment: "%"
  }
});
	</script>

</head>
