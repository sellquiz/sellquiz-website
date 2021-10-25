<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
	<?php include 'nav.php'; ?>
    <br/>
    <div class="container">
		<div class="row text">
            <p class="text-center">
                <span class="display-4">SELL &mdash; Examples</span><br/>
            </p>
            <p class="text-center">
                <span class="lead">Click on the &raquo;Edit&laquo; button in one of the examples below.</span>
                <br/>
                <span class="lead">&#8212; Examples in English will be provided soon. &#8212;</span>
            </p>
        </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<p class="text-center">
					<h4>Höhere Mathematik</h4>
					<a href="examples.php?task=ma1-1.txt">Grundlagen</a> &middot;
					<a href="examples.php?task=ma1-2.txt">Elementare Funktionen</a> &middot; 
					<a href="examples.php?task=ma1-3.txt">Folgen, Reihen und Stetigkeit</a> &middot; 
					<a href="examples.php?task=ma1-4.txt">Differentialrechnung</a> &middot; 
					<a href="examples.php?task=ma1-5.txt">Integralrechnung</a> &middot; 
					<a href="examples.php?task=ma1-6.txt">Lineare Algebra 1</a> &middot; 
					<a href="examples.php?task=ma2-1.txt">Komplexe Zahlen</a> &middot; 
					<a href="examples.php?task=ma2-3.txt">Lineare Algebra 2</a> &middot; 
					<a href="examples.php?task=ma2-4.txt">Funktionen von mehreren Variablen</a>
                    <br/><br/>
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
		<div class="row bg-light p-2 rounded shadow-lg" style="border-style: solid;">
			<div class="col-lg-12 h-100 text-dark p-2">
                <a id="playground-anchor">
				    <h3>Playground</h3> 
                </a>
				<div class="card py-0 px-0 mt-3">
					<textarea id="mycode" class="" rows="8" style="resize: none;"></textarea>
				</div>
			</div>
			<div class="col-lg-12 h-100 text-dark">
				<div class="col py-2 px-0 text-dark" id="sellPlaygroundQuestions"></div>
			</div>
			<div class="col-12 p-0">
				<p class="py-0 px-2">
                    <button type="button" class="btn btn-primary" onclick="compile();">Update</button>
                    <!--<button type="button" class="btn btn-primary" onclick="evaluate();">Evaluate</button>-->
					<a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" onclick="">Help</a>
				</p>
				<div class="row">
					<div class="col">
						<div class="collapse multi-collapse px-2 pt-1 pb-0" id="multiCollapseExample1">
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
    <br/>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				<div id="sellQuestions" class="p-3"></div>
			</div>
		</div>
	</div>
	<script>
        // go to last site behavior
        function goBack() {
			window.history.back();
		}
        // create CodeMirror editor
		var editor = CodeMirror.fromTextArea(document.getElementById("mycode"), {
			lineNumbers: true,
			mode: "sellmode"
		});
		editor.setOption("theme", "idea");	

		//var sellInst = null, sellPlayground = null;
		
        
		$( document ).ready(function() {
			const params = new URLSearchParams(window.location.search);
			let task = params.get('task');
			if(task == null)
				task = "ma1-1.txt";
			let timestamp = ts = Math.round((new Date()).getTime() / 1000);
			task = 'node_modules/sellquiz/examples/' + task + '?time=' + timestamp;
			$.ajax({
				url: task,
				type: 'GET',
				success: function(data,status,xhr) {
					let q = xhr.responseText;
					// remove first two lines (which are used as comments)
					if(q.startsWith("%")) {
						let lines = q.split("\n");
						lines.splice(0, 2);
						q = lines.join('\n');
					}
                    // compile and render questions
                    sellquiz.reset();
                    sellquiz.setLanguage("en");
                    sellquiz.setServicePath("node_modules/sellquiz/services/");
                    let sellQuestionsDiv = document.getElementById("sellQuestions");
                    if(sellquiz.autoCreateQuiz(q, sellQuestionsDiv, true) == false)
                        alert(sellquiz.getErrorLog()); // TODO!!
                    else
                        setTimeout(function(){MathJax.typeset();},750);
                    // load the first question into the playground
					editSellQuestion(0);
				},
				error: function(xhr, status, error) {
					alert("ERROR: " + xhr.responseText);
				}
			});
		});
        // clicked on "Edit" button within a question
		function editSellQuestion(qidx) {
            let src = sellquiz.getQuestionSource(qidx).trim();
			editor.getDoc().setValue(src);
			compile();
			window.scrollTo(0, 0);
		}
        let compile_function_has_run = false;
        // compile a SELL question in playground
		function compile() {
            if(compile_function_has_run == false)
                compile_function_has_run = true;
            else {
                // TODO: remove last question to prevent memory leak.
                // TODO: there is currently no remove function in the sellquiz-API.
            }
			let code = editor.getDoc().getValue();		
            let qIdx = sellquiz.createQuestion(code);
            let sellPlaygroundQuestionsDiv = document.getElementById("sellPlaygroundQuestions");
            sellquiz.setQuestionHtmlElement(qIdx, sellPlaygroundQuestionsDiv);
            if(qIdx < 0) {
                let err = sellquiz.getErrorLog().replaceAll("\n","<br/>");
                sellPlaygroundQuestionsDiv.innerHTML = '<p class="text-danger"><b>' + err + '</b></p>';
            }
            else {
                html = sellquiz.getQuestionHighLevelHTML(qIdx);
                sellPlaygroundQuestionsDiv.innerHTML = html;
                setTimeout(function(){MathJax.typeset();},750);
            }
		}
	</script>
	<?php include 'footer.php'; ?>
	<?php include 'body_scripts.php'; ?>
</body>
