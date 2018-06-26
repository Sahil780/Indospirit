$(document).ready(function(){
	$.ajax({
		url: "http://localhost/chartjs/first_graph_data.php",
		method: "GET",
		dataType: "json",
		success: function(data) {
			alert("Hello  World");
			console.log(data);
			var player = [];
			var score = [];
			var year=[];

			for(var i in data) {
				player.push(data[i].QuantityOrdered);
				score.push(data[i].Month);

			}

			var chartdata = {
				labels: score,
				datasets : [
					{
						label: 'QuantityOrdered',
						backgroundColor: 'rgba(54, 162, 235, 1)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(255, 99, 132, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: player
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});