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
					<h1><b>Integration</b></h1>
					SELL qeuestions can be integrated into existing websites with only a few steps.
				</blockquote>
			</div>
		</div>
	</div>

	<br/>

	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>1. Download</h2>
				<ul>
					<li>Get the latest release from <code>https://gitlab.com/hm4mint/sell/</code>.</li>
					<li>Make sure to get the latest <b>release</b> version <code>https://gitlab.com/hm4mint/sell/-/releases</code> (direct <a href="https://gitlab.com/hm4mint/sell/-/releases">link</a>).<br/>
					<i>The latest source is not necessarily working correctly!</i></li>
				</ul>
				
			</div>
		</div>
	</div>

	<br/>

	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>2. Extract</h2>
				<ul>
					<li>Extract the downloaded zip-file.</li>
				</ul>
			</div>
		</div>
	</div>

	<br/>

	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>3. Run Offline</h2>
				<ul>
					<li>Open <code>src/index-offline.html</code> in four favorite browser.</li>
					<li>New questions can be put into string <code>q</code>. Use <code>%%%</code> as question separator. Example:<br/>

					<hr/>
					
<pre><code>let q = `Transpose Matrix

	A in MM(2 x 3 | { 1, 2, 3 } )
	B := A^T

Please solve $ A^T = #B $

%%%

Determinant

	a := { -5, -4, ..., 5 }
	A in MM( 3 x 3 | a )
	A[1,1] := 0
	A[1,2] := 0
	d := det(A)

Let $ "A" = A $ be a 3 x 3 matrix.
Calculate the __determinant__ of $ "A" $:

* $ det("A") = #d $
`;
</code></pre>

					<hr/>

					</li>



				</ul>
			</div>
		</div>
	</div>

	<br/>

	<div class="container">
		<div class="row">
			<div class="col-sm">
				<h2>4. Website Embedding</h2>
				<ul>
					<li>Just copy <code>src/index-offline.html</code>, as well as the directories <code>src/img/</code> and <code>src/libs/</code> to your webbrowser.</li>
					<li>File <code>src/index-offline.html</code> demonstrates how to load questions dynamically by HTTPRequests (requires a webserver!).</li>
				</ul>
			</div>
		</div>
	</div>

	<br/>

	<?php include 'footer.php'; ?>

	<script>
		//render_page("embed.txt", "Website Integration", "Rev: 0.1 &nbsp;&nbsp;&nbsp; Editor: Andreas Schwenk", 12);
	</script>
	<?php include 'body_scripts.php'; ?>
</body>
