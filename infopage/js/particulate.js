$(document).ready(function(){
	$.ajax({
		url : "https://ustpapm.000webhostapp.com/infopage/data.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var id = [];
			var pm1_hr = [];
			var pm25_hr = [];
			var pm10_hr = [];

			for(var i in data) {
				id.push("UserID " + data[i].id);
				pm1_hr.push(data[i].pm1_hr);
				pm25_hr.push(data[i].pm25_hr);
				pm10_hr.push(data[i].pm10_hr);
		}

			var chartdata = {
				labels: id,
				datasets: [
					{
						label: "PM1",
						fill: false,
						lineTension: 0.01,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: pm1_hr
					},
					{
						label: "PM2_5",
						fill: false,
						lineTension: 0.01,
						backgroundColor: "rgba(29, 202, 255, 0.75)",
						borderColor: "rgba(29, 202, 255, 1)",
						pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
						pointHoverBorderColor: "rgba(29, 202, 255, 1)",
						data: pm25_hr
					},
					{
						label: "PM10",
						fill: false,
						lineTension: 0.01,
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: pm10_hr
					}
				]
			};

			var ctx = document.getElementById("#mycanvas");
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