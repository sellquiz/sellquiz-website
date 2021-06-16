<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
	<?php include 'nav.php'; ?>

	<!--<div class="jumbotron jumbotron-fluid py-3">
		<div class="container">
			<h1 class="fw-lighter"><b>S</b>imple <b>E</b>-<b>L</b>earning <b>L</b>anguage</h1>
		</div>
	</div>-->

	<br/>
	<blockquote class="blockquote text-center">
		<h1><b>SELL &mdash; Simple E-Learning Language</b></h1>
		An open source domain-specific  language for online assessment
	</blockquote>

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
					</p>
				</div>
			</div>
			<div class="col-lg-4 p-2">
				<div class="card rounded p-2 shadow-lg bg-light h-100">
					<h2 class="fw-lighter text-center py-0">DOWNLOAD</h2>
					<p class="px-2 py-0 fw-light">
						Install SELL via <code>npm install sellquiz</code>.
						Find a simple usage example on <a href="https://github.com/sellquiz/sellquiz-standalone" target="_blank">Github</a>.
						<!--Find the latest release on <a href="https://github.com/sellquiz/" target="_blank">Github</a> or -->
					</p>
				</div>
			</div>
		</div>
	</div>

	<!--<div class="container">
		<div class="row">
			<div class="col text-left">
				<p class="py-0 fw-light" style="font-size: 111%;">
					SELL (Simple E-Learning Language) is a <b><b>formal language</b></b> for online assessment in mathematics.<br/>
					The open source <b><b>reference implementation</b></b> (JavaScript) can be easily integrated into existing websites.
				</p>
			</div>
		</div>
	</div>-->

	<!--<div class="container">
		<div class="row">
			<div class="col pb-3">
				<h2>Download</h2>
				The reference implementation is open source. It is written in vanilla JavaScript and can be integrated into existing websites easily.<br/>
				Find the latest release on <a href="https://gitlab.com/hm4mint/sell/-/releases" target="_blank">GitLab</a>.
			</div>
		</div>
	</div>-->

	<br/>

	<div class="container">
		<div class="row">
			<div class="col pb-3">
				<h2>Playground &nbsp;</h2>
			</div>
		</div>
		<!--TODO: gap, single choice, multiple choice-->
		<div class="row bg-light p-2 rounded shadow-lg" style="border-style: solid;">
			<div class="col-lg-6 h-100 text-dark p-2">
				<p class="m-1 p-0">
					<span class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Examples
						</button>
						<span class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" onclick="example('ev')">Eigenvalues</a>
							<a class="dropdown-item" onclick="example('mat')">Matrix Operations</a>
							<a class="dropdown-item" onclick="example('roots')">Complex Roots</a>
							<!--<a class="dropdown-item" onclick="example('hessian')">Hessian Matrix</a>-->
							<a class="dropdown-item" onclick="example('inv')">Inverse Elements</a>
							<a class="dropdown-item" onclick="example('det')">Determinant</a>
						</span>
					</span>
					<button type="button" class="btn btn-success" onclick="generate();">Run!</button>
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
		<br/>
		
	</div>

	<div class="container">
		<div class="row">
			<div class="col pb-3">
				<h2><a href="examples.php">More examples</a></h2>
			</div>
		</div>
	</div>

	<!--< ?php separator(); ? > -->

	<!--<div class="container">
		<div class="row">
			<div class="col pb-3">
				<h2>Specification</h2>
				<p>
					The current language definition can be found <a href="spec.php">here</a>.
				</p>
			</div>
		</div>
	</div>-->

	<?php include 'footer.php'; ?>

	<script>

		var sellInst = null;

		var editor = CodeMirror.fromTextArea(document.getElementById("mycode"), {
			lineNumbers: true,
			mode: "sellmode"
		});
		editor.setOption("theme", "idea");
		editor.setSize(null, 400);

		let example_ev = `Eigenvalues

	a in { 1, 2, ..., 5 }
	b in { -8, -7, ..., -2 }
	A := [[a,0],[0,b]]
	ev := { a, b }

Let $ "A" = A $.
Determine all __eigenvalues__ of $ "A" $:
* $ lambda = #ev $
`;

		let example_mat = `Matrix Operations

Calculate the following term in the field $GF(2)$.

	a := { 0, 1 }
	A in MM( 1 x 2 | a )
	B in MM( 2 x 2 | a )
	C := (A * B)^T mod 2
	input rows := resizable
	input cols := resizable

* $ (A * B)^T = #C $
_First set the number of rows and columns._
`;

		let example_roots = `Complex Roots

	a in { 2^2, 3^2, 4^2 }
	roots := { -sqrt(a)*j, sqrt(a)*j }

$ f(z) = z^2 + a $

* Determine both __complex roots__ of $ f(z) $:
  $ z = #roots $

_Hint: Enter the result in the form $"a"+bi$_
`;

		let example_mult_inv = `Multiplicative inverse element

	n in { 3, 5, 7 }
	b in { 1, 2, ..., 7 }
	c := b + 1
	b := b mod (n-1) + 1
	c := c mod (n-1) + 1
	i1 := xgcd(b, n, 2) mod n
	i2 := xgcd(c, n, 2) mod n

Determine the __multiplicative inverse elements__ in finite field $GF(n)$:

* $b^(-1) equiv #i1 mod n$
* $c^(-1) equiv #i2 mod n$
`;

		let example_det = `Determinant

	a := { -5, -4, ..., 5 }
	A in MM( 3 x 3 | a )
	A[1,1] := 0
	A[1,2] := 0
	d := det(A)

Let $ "A" = A $ be a 3 x 3 matrix.
Calculate the __determinant__ of $ "A" $:

* $ det("A") = #d $
`;

		let example_default = example_ev;

		function example(ex) {
			switch(ex) {
				case "default":
				case "ev":
					editor.getDoc().setValue(example_ev);
					break;
				case "mat":
					editor.getDoc().setValue(example_mat);
					break;
				case "roots":
					editor.getDoc().setValue(example_roots);
					break;
				//case "hessian":
				//	editor.getDoc().setValue(example_hessian);
				//	break;
				case "inv":
					editor.getDoc().setValue(example_mult_inv);
					break;
				case "det":
					editor.getDoc().setValue(example_det);
					break;
			}
		}

		example("default");
		var sellQuestionsDiv = document.getElementById("sellQuestions");
		generate();

		function generate() {
			let code = editor.getDoc().getValue();
			sellInst = new sell.Sell("en", "sellInst");
			if(!sellInst.importQuestions(code)) {
				let err = sellInst.log.replaceAll("\n","<br/>");
				sellQuestionsDiv.innerHTML = '<p class="text-danger"><b>' + err + '</b></p>';
			} else {
				sellQuestionsDiv.innerHTML = sellInst.html;
				sellInst.updateMatrixInputs();
				setTimeout(function(){MathJax.typeset();},750);
			}
		}

		function reformat() {
			MathJax.typeset();
		}

	</script>

	<?php include 'body_scripts.php'; ?>
</body>
