var google;
var drunks = new Array();
var numberOfDrunks = 500;
var numberOfSteps = 1*Math.pow(10, 4);
var drunksCompletes = 0;
var maxDrunks = 2000;
var maxSteps = 1*Math.pow(10, 4);
var timeControll = null;
var secondsWaitNewDrunkResponse = 10;

function showResult(){
	
	clearTimeout(timeControll);

	var sum = 0;
	$.each(drunks, function(index, drunk){
		sum += drunk.position;
	});
	var average = sum/drunks.length;
	var sumOfSquareOfTheDeviation = 0;
	$.each(drunks, function(index, drunk){
		sumOfSquareOfTheDeviation += Math.pow(drunk.position-average, 2);
	});
	var variance = sumOfSquareOfTheDeviation/drunks.length;
	var standardDeviation = Math.sqrt(variance);

	$("#show-result")
		.html(numberOfDrunks+" bêbados deram "+numberOfSteps+" passos aleatoriamente")
		.append("<br />Média: <strong>"+average+"</strong")
		.append("<br />Desvio padrão: <strong>"+standardDeviation+"</strong>")
		.fadeIn("fast");

	showHistogram();

}

function stopDrunk(drunk){

	/*var response = $("<blockquote><p></p></blockquote>");
	response.find("p").html("Este bêbado parou na posição: "+drunk.position);
	$("div.result-drunk-"+drunk.id).html(response);*/
	$("#home").append("<div class='result-drunk'>"+drunk.position+"</div>");
	drunksCompletes++;
	if(drunksCompletes == drunks.length){
		drunksCompletes = 0;
		showResult();
	}
	var fim = $("footer").offset().top;
	$('body').animate({scrollTop : fim}, 0);
}

function startDrunk(key, drunk){
	var data = {
		'id' : drunk.id,
		'numberOfSteps' : numberOfSteps,
		'numberOfDrunks' : numberOfDrunks
	};
	$.ajax({
		type: 'get',
		url: "/calc-drunk.php",
		data: data,
		dataType: 'json', 
		cache: false,
		success: function(drunk){
			drunks[key] = drunk;
			stopDrunk(drunk);
		},
		error: function(jqXHR, textStatus, errorThrown){
			console.log("There's an error: ");
			console.log(jqXHR);
			drunksCompletes++;
			if(drunksCompletes == drunks.length){
				drunksCompletes = 0;
				showResult();
			}
		},
		complete: function(jqXHR, textStatus){
			clearTimeout(timeControll);
			timeControll = window.setTimeout(function(){
				showResult();
			}, 1000*secondsWaitNewDrunkResponse);
		}
	});
}

function startAllDrunks(){
	/*var progress = 'Andando de um lado para outro aleatoriamente...';
	$("div[class^='result-drunk-']").text(progress);*/
	$("#home").html("");
	for(var count = 0; count < numberOfDrunks; count++){
		drunks[count] = {
			'id' : count+1,
			'position' : 0
		}
		startDrunk(count, drunks[count]);
	}
}

function openDrunks(){
	/*for(var count = 0; count < numberOfDrunks; count++){
		var drunkCount = count+1;
		var group = $("");
		if(count < numberOfDrunks/2){
			group = $("#home .group-with-drunks:first");
		}else{
			group = $("#home .group-with-drunks:last");
		}
		group.append('<h4>Bêbado#'+drunkCount+'</h4><div class="result-drunk-'+drunkCount+'">Parado bebendo mais uma cerveja</div>');
	}*/
	$("#home").html("<center><h4>Clique em Iniciar para realizar a simulação</h4></center>");
	$("#show-result, #show-histogram").hide();
}

$(document).ready(function(){
	openDrunks();

	$("#show-result, #show-histogram").hide();
	$("#number-of-drunks").val(numberOfDrunks);
	$("#number-of-steps").val(numberOfSteps);

	$("#start-drunks").click(function(){
		startAllDrunks();
		$("#show-result, #show-histogram").hide();
	});
	
	$('#my-tab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	});

	$("#number-of-drunks").change(function(){
		$(".group-with-drunks").html("");
		if(!isNaN($(this).val())){
			if($(this).val() > maxDrunks){
				alert("Limite de "+maxDrunks+" bêbados para a simulação");
				numberOfDrunks = maxDrunks;
			}else{
				numberOfDrunks = $(this).val();
			}
		}else{
			numberOfDrunks = 1;
		}
		$(this).val(numberOfDrunks);
		openDrunks();
	});

	$("#number-of-steps").change(function(){
		if(!isNaN($(this).val())){
			if($(this).val() > maxSteps){
				alert("Limite de "+maxSteps+" passos para a simulação");
				numberOfSteps = maxSteps;
			}else{
				numberOfSteps = $(this).val();
			}
		}else{
			numberOfSteps = 1;
		}

		$(this).val(numberOfSteps);
		openDrunks();
	});
});

function showHistogram(){
	$("#show-histogram").show();
	var array = new Array(['Position', 'Número de bêbados']);
	$.each(drunks, function(index, drunk){
		array.push(["Bêbado#"+index, drunk.position]);
	});
    var data = google.visualization.arrayToDataTable(array);

    var options = {
      title: 'Posição final do bêbados',
      legend: { position: 'none' },
  	  histogram: { bucketSize: 50 }
    };

    var chart = new google.visualization.Histogram(document.getElementById('show-histogram'));
    chart.draw(data, options);
}

google.load("visualization", "1", {packages:["corechart"]});