<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
	<?php include 'nav.php'; ?>


	<div class="container">
		<div class="row">
			<div class="col-sm">

				<br/>
				<blockquote class="blockquote text-center">
					<h1><b>Examples</b></h1>
					<i>Examples in English will be provided soon.</i>
				</blockquote>

				<p class="text-center">
					<h4>Höhere Mathematik</h4>
					<a href="examples.php?task=ma1-1.txt">Grundlagen</a> &middot;
					<a href="examples.php?task=ma1-2.txt">Elementare Funktionen</a> &middot; 
					<a href="examples.php?task=ma1-3.txt">Folgen, Reihen und Stetigkeit</a> &middot; 
					<a href="examples.php?task=ma1-4.txt">Differentialrechnung</a> &middot; 
					<a href="examples.php?task=ma1-5.txt">Integralrechnung</a> &middot; 
					<a href="examples.php?task=ma1-6.txt">Lineare Algebra 1</a> &middot; 

					<a href="examples.php?task=ma2-1.txt">Komplexe Zahlen</a> &middot; 
					<a href="examples.php?task=ma2-3.txt">Lineare Algebra 2</a>

					<h4>Programmierung in Java</h4>
					<a href="examples.php?task=pi1-keywords.txt">Schlüsselworte</a> &middot;
					<a href="examples.php?task=pi1-ctrl.txt">Kontrollstrukturen</a> &middot;
					<a href="examples.php?task=pi1-logic.txt">Aussagenlogische Operatoren</a> &middot;
					<a href="examples.php?task=pi1-methods.txt">Methoden</a> &middot;
					<a href="examples.php?task=pi1-arrays.txt">Arrays</a> &middot;
					<a href="examples.php?task=pi1-oop.txt">Objekte und Klassen</a>
	
					<br/><br/>
				</p>
			</div>

		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col pb-3">
				<!--<h2>Playground &nbsp; <small><a href="examples.php">More examples</a></small></h2>-->
				<!--To evaluate the following questions, click on the arrow.
				Click on <b>edit</b> to put questions into the playground.-->
				<p class="text-center text-secondary">(Also refer to examples below playground!)</p>
			</div>
		</div>
		<div class="row bg-light p-2 rounded shadow-lg" style="border-style: solid;">
			<div class="col-lg-12 h-100 text-dark p-2">
				<h3>Playground</h3> 
				<ul>
					<li>Feel free to edit any of the questions below this box: Click on the "edit"-button to import it into this playground.</li>
					<li>Click "Run!" to apply changes.</li>
				</ul>
				<div class="card py-0 px-0 mt-3">
					<textarea id="mycode" class="" rows="8" style="resize: none;"></textarea>
				</div>
				<p class="m-1 p-0">
					<button type="button" class="btn btn-success" onclick="play();">Run!</button>
				</p>
			</div>
			<div class="col-lg-12 h-100 text-dark">
				<!--<p class="text-center py-1" style="font-size: 135%;">Generated Question</p>-->
				<div class="col py-2 px-0 text-dark" id="sellPlaygroundQuestions"></div>
			</div>

			<div class="col-12 p-0">
				<p class="py-0 px-2">
					<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" onclick="">Help</a>
				</p>
				<div class="row">
					<div class="col">
						<div class="collapse multi-collapse px-2 pt-1 pb-0" id="multiCollapseExample1">

							<!--Key aspects:-->
							<ul>
								<li>
									The first line is used as <b>headline</b>.
								</li>
								<li>
									<b>Code</b> is indented by tabs. It is used to draw <b>random variables</b> and to calculate the solution.
								</li>
								<li>
									<b>Equations</b> are denoted in <a href="http://asciimath.org/" target="_blank">AsciiMath</a>-syntax and can be embedded into dollar signs. Example:
									<ul>
										<li><code>$ sqrt(x) $</code> is displayed as `sqrt(x)`.
										</li>
									</ul>
								</li>
								<li>
									<b>Text formatting</b> is similar to <a href="https://daringfireball.net/projects/markdown/" target="_blank">Markdown</a>. Examples:
									<ul>
										<li>A bullet point is denoted by <code>*</code> at the beginning of a line.</li>
										<li><code>__bold__</code> is displayed <b>bold</b>.</li>
									</ul>
								</li>
								<li>
									The <b>solution textfield</b> is created by a hashtag <code>#</code> following the solution variable.
								</li>
							</ul>
							For detailed information, visit the <a href="tut.php">tutorials</a> and <a href="spec.php">language specification</a>.

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php separator(); ?>

	<div class="container">
		<div class="row">
			<div class="col-sm">
				<div id="sellQuestions" class="p-3"></div>
			</div>
		</div>
	</div>

	<?php separator(); ?>

	<script>

		var editor = CodeMirror.fromTextArea(document.getElementById("mycode"), {
			lineNumbers: true,
			mode: "sellmode"
		});
		editor.setOption("theme", "idea");	

		var sell = null, sellPlayground = null;
		
		function goBack() {
			window.history.back();
		}
		$( document ).ready(function() {
			const params = new URLSearchParams(window.location.search);
			let task = params.get('task');
			if(task == null)
				task = "ma1-1.txt";
			let timestamp = ts = Math.round((new Date()).getTime() / 1000);
			task = 'examples/' + task + '?time=' + timestamp;
			$.ajax({
				url: task,
				type: 'GET',
				success: function(data,status,xhr) {
					let q = xhr.responseText;
					sell = new Sell("de", "sell");
					sell.editButton = true;
					if(!sell.importQuestions(q))
						alert(sell.log);
					let sellQuestionsDiv = document.getElementById("sellQuestions");
					sellQuestionsDiv.innerHTML = sell.html;

					editSellQuestion(0);
					
					setTimeout(function(){
						MathJax.typeset();
						sell.updateMatrixInputs();
					},
					750);
				},
				error: function(xhr, status, error) {
					alert("ERROR: " + xhr.responseText);
				}
			});
		});

		function editSellQuestion(qidx) {
			let src = sell.questions[qidx].src.trim();
			editor.getDoc().setValue(src);
			play();
			window.scrollTo(0, 0);
		}

		function play() {
			let sellPlaygroundQuestionsDiv = document.getElementById("sellPlaygroundQuestions");
			let code = editor.getDoc().getValue();
			sellPlay = new Sell("de", "sellPlay");
			if(!sellPlay.importQuestions(code)) {
				let err = sellPlay.log.replaceAll("\n","<br/>");
				sellPlaygroundQuestionsDiv.innerHTML = '<p class="text-danger"><b>' + err + '</b></p>';
			} else {
				sellPlaygroundQuestionsDiv.innerHTML = sellPlay.html;
				sellPlay.updateMatrixInputs();
				setTimeout(function(){MathJax.typeset();},750);
			}
		}

	</script>


	<!--<div id="content"></div>
	<br/><br/>
	<script>
		//render_page("embed.txt", "Website Integration", "Rev: 0.1 &nbsp;&nbsp;&nbsp; Editor: Andreas Schwenk", 12);
	</script>-->
	<?php include 'footer.php'; ?>
	<?php include 'body_scripts.php'; ?>
</body>
