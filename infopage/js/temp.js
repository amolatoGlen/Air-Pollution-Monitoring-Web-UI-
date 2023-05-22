$(document).ready(function(){
	$.ajax({
		url : "https://ustpapm.000webhostapp.com/infopage/data.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var id = [];
			var temp_hr = [];
			var hum_hr = [];

			for(var i in data) {
				id.push("UserID " + data[i].id);
				temp_hr.push(data[i].temp_hr);
				hum_hr.push(data[i].hum_hr);
		}

			var chartdata = {
				labels: id,
				datasets: [
					{
						label: "temperature",
						fill: false,
						lineTension: 0.01,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: temp_hr
					},
					{
						label: "humidity",
						fill: false,
						lineTension: 0.01,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: hum_hr
					}
				]
			};

			var ctx = $("#mycanvas2");
			//const ctx = document.getElementById('myChartpm');

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			}); 
		},
		error : function(data) {

		}
	});
});