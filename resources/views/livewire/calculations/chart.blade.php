<div class="w-full relative">
    <canvas id="myChart"></canvas>

    <div class="flex items-center justify-between">
        <div class="flex items-center justify-center w-1/2">
            <span class="w-6 h-6 mr-2 block bg-red-600"></span>
            <p class="text-red-600">Zużycie {{ $consumption }} kWh</p>
        </div>
        <div class="flex items-center justify-center w-1/2">
            <span class="w-6 h-6 mr-2 block bg-green-500"></span>
            <p class="text-green-500">Produkcja {{ $production }} kWh</p>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var consumption = [];
        var production = [];

		var config = {
			type: 'line',
			data: {
				labels: ['Styczeń', 'Luty', 'Marzec', 'Kwiecieć', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
				datasets: [{
					label: 'Zużycie',
					borderColor: '#C53030',
					data: consumption,
					fill: false,
				}, {
					label: 'Produkcja',
					fill: false,
					borderColor: '#38A169',
					data: production,
				}]
			},
			options: {
                responsive: true,
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
				tooltips: {
					mode: 'index',
					intersect: false,
                },
                scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Miesiąc'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'kWh'
						}
					}]
				}
			}
		};

		window.onload = function() {
            drawChart();
        };

        Livewire.on('updateChart', function(){
            drawChart();
        })
        
        function drawChart() {
            if(window.myLine){
                window.myLine.destroy();
            }

            var ctx = document.getElementById('myChart');
            window.myLine = new Chart(ctx, config);

            config.data.datasets[0].data = @this.chart_consumption;
            config.data.datasets[1].data = @this.chart_production;

            window.myLine.update();
        }
    </script>
@endpush