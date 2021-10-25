<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
	<?php include 'nav.php'; ?>
	<br/>
    <div class="container">
		<div class="row text">
            <p class="text-center">
                <span class="display-4">SELL &mdash; Simple E-Learning Language</span><br/>
            </p>
            <p class="text-center">
                <span class="lead">An open source domain-specific language for online assessment</span>
            </p>
        </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 p-2">
				<div class="card rounded p-2 shadow-lg bg-light h-100">
					<h2 class="fw-lighter text-center py-0">Expressive</h2>
					<p class="px-2 py-0 fw-light">
						A short and simple syntax enables the questioner to focus on <b><b>educational</b></b> aspects.
					</p>
				</div>
			</div>
			<div class="col-lg-4 p-2">
				<div class="card rounded p-2 shadow-lg bg-light h-100">
					<h2 class="fw-lighter text-center py-0">Scalable</h2>
					<p class="px-2 py-0 fw-light">
						<b><b>Randomized</b></b> questions provide each student with individual exercises.
					</p>
				</div>
			</div>
			<div class="col-lg-4 p-2">
				<div class="card rounded p-2 shadow-lg bg-light h-100">
					<h2 class="fw-lighter text-center py-0">Exchangeable</h2>
					<p class="px-2 py-0 fw-light">
						Questions are written as <b><b>plaintext</b></b>. Sharing by mail, chat, forums is straightforward.
					</p>
				</div>
			</div>
			<div class="col-lg-4 p-2">
				<div class="card rounded p-2 shadow-lg bg-light h-100">
					<h2 class="fw-lighter text-center py-0">Embeddable</h2>
					<p class="px-2 py-0 fw-light">
						SELL questions can be integrated into <b><b>existing websites</b></b> with only a <a href="embed.php">few steps</a>.
					</p>
				</div>
			</div>
			<div class="col-lg-4 p-2">
				<div class="card rounded p-2 shadow-lg bg-light h-100">
					<h2 class="fw-lighter text-center py-0">Open Source</h2>
					<p class="px-2 py-0 fw-light">
						This project is licensed under the <a href="https://www.gnu.org/licenses/gpl-3.0.html" target="_blank">GNU General Public License v3.0</a>.
                        Find us on <a href="https://github.com/sellquiz" target="_blank">GitHub</a>.
					</p>
				</div>
			</div>
			<div class="col-lg-4 p-2">
				<div class="card rounded p-2 shadow-lg bg-light h-100">
					<h2 class="fw-lighter text-center py-0">DOWNLOAD</h2>
					<p class="px-2 py-0 fw-light">
						Install SELL via <code>npm install sellquiz</code> (<a href="https://www.npmjs.com/package/sellquiz">Link</a>).
						Find examples on <a href="https://github.com/sellquiz/sellquiz-standalone" target="_blank">GitHub</a>.
						<!--Find the latest release on <a href="https://github.com/sellquiz/" target="_blank">Github</a> or -->
					</p>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<div class="container">
		<!--TODO: gap, single choice, multiple choice, programming -->
		<div class="row bg-light p-2 rounded shadow-lg" style="border-style: solid;">
			<div class="col-lg-6 h-100 text-dark p-2">
				<p class="m-1 p-0">
                    <!--<b>Playground</b>&nbsp;-->
					<span class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Choose Example
						</button>
						<span id="examples-dropdown" class="dropdown-menu" aria-labelledby="dropdownMenuButton"></span>
					</span>
					<button type="button" class="btn btn-primary" onclick="compile();">Run!</button>
                    <button type="button" class="btn btn-primary" onclick="window.open('examples.php');">More examples</button>
				</p>
				<div class="card py-0 px-0 mt-3">
					<textarea id="mycode" class="" rows="16" style="resize: none; height:100%;"></textarea>
				</div>
			</div>
			<div class="col-lg-6 h-100 text-dark">
				<p class="text-center py-1" style="font-size: 135%;">Generated Question</p>
				<div class="col py-2 px-0 text-dark" id="sellQuestions"></div>
			</div>
			<div class="col-12 p-0">
				<p class="py-0 px-2">
					<a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" onclick="">Help</a>
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
		<br/><br/><br/>
	</div>
	<?php include 'footer.php'; ?>
	<script>
        // build examples dropdown menu
        let items_html = '';
        for(let i=0; i<sell_examples.length; i++) {
            let ex = sell_examples[i];
            items_html += '<a class="dropdown-item" onclick="set_example(' + i + ')">' + ex["title"] + '</a>\n';
        }
        document.getElementById("examples-dropdown").innerHTML = items_html;
        // create ModeMirror editor
		var editor = CodeMirror.fromTextArea(document.getElementById("mycode"), {
			lineNumbers: true,
			mode: "sellmode"
		});
		editor.setOption("theme", "idea");
		editor.setSize(null, 350);
        // show selected example code in editor
        function set_example(idx) {
            editor.getDoc().setValue(sell_examples[idx]["src"]);
            compile();
		}
        // set and compile first example
		set_example(0);		
		compile();
        // compile SELL code in editor
		function compile() {
			let code = editor.getDoc().getValue();            
            sellquiz.reset();
            sellquiz.setLanguage("en");
            sellquiz.setServicePath("node_modules/sellquiz/services/");
            var sellQuestionsDiv = document.getElementById("sellQuestions");
            if(sellquiz.autoCreateQuiz(code, sellQuestionsDiv) == false) {
                let err = sellquiz.getErrorLog().replaceAll("\n","<br/>");
				sellQuestionsDiv.innerHTML = '<p class="text-danger"><b>' + err + '</b></p>';
            }
            else
                setTimeout(function(){MathJax.typeset();},750);
		}
	</script>
	<?php include 'body_scripts.php'; ?>
</body>
