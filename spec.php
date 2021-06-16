<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
	<?php include 'nav.php'; ?>
	
	<!--<div id="content"></div>-->

	<div class="container">
		<div class="row">
			<div class="col-sm">

				<br/>
				<blockquote class="blockquote text-center">
					<h1><b>Specification</b></h1>
				</blockquote>

				<p class="text-center">
					The exact langauge specification is work in progress and will be available later.<br/>Refer to the <a href="examples.php">examples</a>.
				</p>
			</div>

		</div>

		<div class="row">
			<div class="col-sm">

<h2>1. Introduction</h2>
Static:

<div class="bg-light border-left p-2" style="border-width: 4px !important;">
<pre class="p-0 m-0">
<code>Sum
Calculate $ 3+4 = #7 $.</code>
</pre><!--<button type="button" class="btn btn-success m-0 py-0">&#9654;</button>-->
</div>
<div class="bg-white border-left border-success p-2" style="border-width: 4px !important;">
	<div id="sellexample1"></div>
</div>



Randomized simple:

<div class="bg-light border-left p-2" style="border-width: 4px !important;">
<pre class="p-0 m-0">
<code>Sum
    a, b in { 2, 3, ..., 10 }
Calculate $ a+b = #(a+b) $.</code>
</pre><!--<button type="button" class="btn btn-success m-0 py-0">&#9654;</button>-->
</div>
<div class="bg-white border-left border-success p-2" style="border-width: 4px !important;">
	<div id="sellexample2"></div>
</div>


Randomized:

<div class="bg-light border-left p-2" style="border-width: 4px !important;">
<pre class="p-0 m-0">
<code>Product    #fundamentals   #easy
    a, n in { 2, 3, ..., 6 }
Calculate $ prod_(i=1)^n a = #a^n $
    ? Multiply $a*a*...*a$ ($n$ times).</code>
</pre><!--<button type="button" class="btn btn-success m-0 py-0">&#9654;</button>-->
</div>

<br/>
<h2>2. Text Segments</h2>

<br/>
<h2>3. Code Segments</h2>


<br/>
<h2>4. List of Functions</h2>

<br/>
<h2>5. Formal Grammar</h2>

<div class="bg-light border-left p-2" style="border-width: 4px !important;">
<pre class="p-0 m-0">
<code><?php echo file_get_contents("node_modules/sellquiz/grammar.txt"); ?></code>
</pre>
</div>

			</div>
		</div>

	</div>


	<br/><br/>
	<?php include 'footer.php'; ?>
	<script>
		//render_page("spec.txt", "Language Specification", "Rev: 0.1 &nbsp;&nbsp;&nbsp; Editor: <a href=\"https://www.th-koeln.de/personen/andreas.schwenk/\" target=\"_blank\">Andreas Schwenk</a>", 8);

		/*
<h2>1. Introduction</h2>
Static:

<div class="bg-light border-left p-2" style="border-width: 4px !important;">
<pre class="p-0 m-0">
<code>Sum
Calculate $ 3+4 = #7 $.</code>
</pre><!--<button type="button" class="btn btn-success m-0 py-0">&#9654;</button>-->
</div>
<div class="bg-white border-left border-success p-2" style="border-width: 4px !important;">
	<div id="sellexample1"></div>
</div>
		*/

		/*let example_idx = 0;
		var sell_refs = [];

		function sell_example(question, ) {
			let sell = new Sell("en", )      // TODO: var name <-> second param
			example_idx ++;
		}*/

		let q1 = `Sum\nCalculate $ 3+4 = #7 $.`;
		var sellexample1 = new sell.Sell("en", "sellexample1");
		if(!sellexample1.importQuestions(q1))
			alert(sellexample1.log);
		let sellexample1Div = document.getElementById("sellexample1");
		let html1 = sellexample1.html;
		html1 = html1.substr(0, html1.length-7); // remove '<br/>'
		sellexample1Div.innerHTML = html1;

		let q2 = `Sum\n\ta, b in { 2, 3, ..., 10 }\n\tc := a+b\nCalculate $ a+b = #c $.`;
		var sellexample2 = new sell.Sell("en", "sellexample2");
		if(!sellexample2.importQuestions(q2))
			alert(sellexample2.log);
		let sellexample2Div = document.getElementById("sellexample2");
		let html2 = sellexample2.html;
		html2 = html2.substr(0, html2.length-7); // remove '<br/>'
		sellexample2Div.innerHTML = html2;

	</script>
	<?php include 'body_scripts.php'; ?>
</body>
