<template>
    <loading-card :loading="initialLoading" class="flex flex-wrap py-8 mb-8 text-center">
        <div style="height: 500px; width: 100%;">
            <canvas id="myChart"></canvas>
        </div>
    </loading-card>
</template>

<script>
export default {
    data() {
        return {
            initialLoading: true,
            operations: {},
            chartInstance: null,
        }
    },

    methods: {
        getDailyOperations() {
            Nova.request().get('/nova-vendor/nova-algolia/algolia/operations')
                .then((response) => {
                    this.operations = response.data.operations
                    this.initialLoading = false

                    this.setupChart();
                })
        },
        setupChart() {
            var ctx = document.getElementById("myChart");

            this.chartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: this.chartLabels,
                    datasets: [{
                        data: this.chartData,
                        fill: true,
                        borderColor: '#2196f3',
                        backgroundColor: '#2196f3',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    scales: {
                        xAxes: [{
                            afterTickToLabelConversion: function(data)
                            {
                                var xLabels = data.ticks;

                                xLabels.forEach(function (labels, i)
                                {
                                    if (i % 2 == 1)
                                    {
                                        xLabels[i] = '';
                                    }
                                });
                            },
                            gridLines: {
                                display:false
                            }
                        }],
                        yAxes: [{
                            afterTickToLabelConversion: function(data)
                            {
                                var xLabels = data.ticks;

                                xLabels.forEach(function (labels, i)
                                {
                                    if (i % 2 == 1)
                                    {
                                        xLabels[i] = '';
                                    }
                                });
                            },
                            gridLines: {
                                drawBorder: false,
                                borderDash: [8, 4],
                            },
                        }]
                    }
                }
            });
        }
    },

    computed: {
        chartLabels() {
            var returnData = [];

            for (var i = 0; i < this.operations.length; i++)
            {
                returnData.push(this.operations[i].date);
            }

            return returnData;
        },
        chartData() {
            var returnData = [];

            for (var i = 0; i < this.operations.length; i++)
            {
                returnData.push(this.operations[i].value);
            }

            return returnData;
        }
    },

    created() {
        this.getDailyOperations()
    },

    mounted() {
        let recaptchaScript = document.createElement('script')
        recaptchaScript.setAttribute('src', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js')
        document.head.appendChild(recaptchaScript)
    },
}
</script>
