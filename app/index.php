<div class="row">
	<div class="col-lg-4">
		<img class="img-icon" src="/app/assets/images/grafico-caminho-aleatorio.png" alt="Gráfico caminho aleatório">
		<h2>O caminho aleatório</h2>
		<p>
			O problema do caminho aleatório é utilizado em diversas áreas da física, se mostrando fundamental no estudo da física estatística. 
			O problema modela a probabilidade de se encontrar uma partícula em um determinado local do espaço.
			<br>É possível fazer a simulação em duas dimensões neste site.
		</p>
		<p><a class="btn btn-default" href="/simulacao" role="button">Simulação &raquo;</a></p>
	</div>
	<div class="col-lg-4">
		<div style="height: 100px;">&nbsp;</div>
		<!-- <img class="img-icon" src="/app/assets/images/a-pesquisa.png" alt="A pesquisa"> -->
		<h2>A pesquisa</h2>
		<p>
			Utilizando o livro de A.-L Barabási intitulado <b>Fractal concepts in surface growth</b> (ou Concepções de fractais em crescimento de superfícies), o projeto
			consiste no estudo, compreendimento teórico, análise e levantamento de dados no que diz respeito ao crescimento de superfícies.<br />
			Com uma análise de situações aparentemente randômicas como os crescimentos de superfícies, espera-se analizar as influências do estudo da aleatoriedade
			no contexto do micro e do macro, levantando as relações entre ambas e nas condições de cada.
		</p>
	</div>
	<div class="col-lg-4">
		<img class="img-icon" src="/app/assets/images/o-projeto.png" alt="O projeto">
		<h2>O projeto</h2>
		<p>
			O projeto de iniciação científica é realizado por mim, Douglas Cardinot, juntamente ao professor Leonardo Grigório pelo CEFET-NF
			e consiste no estudo e análise do problema de crescimento de superfícies. 
			Este site faz parte do projeto e funciona como um divulgador dos resultados obtidos, 
			além de permitir acesso e simulação aos objetos de pesquisa para outros pesquisadores. 
			<br>O projeto e open source e você pode contribuir para ele acessando o <a href="https://github.com/douglasCardinot/caminho-aleatorio" target="_blank">GitHub</a>
		</p>
		<!-- <p><a class="btn btn-default" href="/sobre" role="button">Sobre &raquo;</a></p> -->
	</div>
</div>



<hr class="featurette-divider">

<div class="row featurette">
	<div class="col-md-7">
		<h2 class="featurette-heading">Um bêbado <span class="text-muted">parte de um bar onde estava bebendo.</span></h2>
		<p class="lead">Imagine um partícula qualquer solta em um ponto escolhido como a origem</p>
	</div>
	<div class="col-md-5">
		<img class="featurette-image img-responsive" src="<?php _r('appPath'); ?>/assets/images/drunk-to-right.gif" alt="Bêbado">
	</div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
	<div class="col-md-5">
		<img class="featurette-image img-responsive" src="<?php _r('appPath'); ?>/assets/images/drunk-walking.gif" alt="Bêbado andando aleatoriamente">
	</div>
	<div class="col-md-7">
		<h2 class="featurette-heading">Aleatoriamente, <span class="text-muted">este bêbado começa a andar para a direita ou para a esquerda, sempre com passos do mesmo tamanho, sem se lembrar onde estava antes do último passo dado</span></h2>
		<p class="lead">
			A partícula se movimenta de forma aleatória, dando N passos sucessivos sem que o movimento anterior influencie no próximo movimento. 
			<br>Cada movimento tem o mesmo comprimento l, e probabilidade p de que seja para a direita e q para que seja para a esquerda (p + q = 1).
			<br>Esta partícula se movimenta N<sub>1</sub> passos para a direita e N<sub>2</sub> passos para a esquerda (N = N<sub>1</sub> + N<sub>2</sub>)
		</p>
	</div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
	<div class="col-md-7">
		<h2 class="featurette-heading">Depois de muitos passos <span class="text-muted">o bêbado finalmente para em algum lugar</span></h2>
		<p class="lead">
			Determinada sequência de N passos equivale a (p*p*...*p)(q*q*...*q) = p<sup>N<sub>1</sub></sup>q<sup>N<sub>2</sub></sup>.
			<br>A quantidade de sequências desse tipo vale: N!/N<sub>1</sub>!N<sub>2</sub>!
			<br>Então, a probabilidade é dada pela distribuição binomial: W<sub>N</sub>(N<sub>1</sub>) = (N!/N<sub>1</sub>!N<sub>2</sub>!)*p<sup>N<sub>1</sub></sup>q<sup>N<sub>2</sub></sup>
		</p>
	</div>
	<div class="col-md-5">
		<img class="featurette-image img-responsive" src="<?php _r('appPath'); ?>/assets/images/drunk-stopped.gif" alt="Bêbado parado">
	</div>
</div>

<hr class="featurette-divider">