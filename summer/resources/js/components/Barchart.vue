<template>
    <div :id="id">

    </div>
</template>

<script>
    export default {
        name: "Barchart",
        props : {
                id : String,
                data : Array,
        },
        data: () => ({
            content_id  : null,
            chart_data: [
                {
                    x: [],
                    y: [],
                    type: 'bar'
                }
            ],
            chart_layout : {
                title: {
                    text:'',
                    font: {
                        family: 'Courier New, monospace',
                        size: 24
                    },
                    xref: 'paper',
                    x: 0.05,
                },
                xaxis: {
                    title: {
                        text: "ระดับความพึงพอใจ",
                        font: {
                            family: 'Courier New, monospace',
                            size: 18,
                            color: '#7f7f7f'
                        }
                    },
                },
                yaxis: {
                    title: {
                        text: 'จำนวน(คน)',
                        font: {
                            family: 'Courier New, monospace',
                            size: 18,
                            color: '#7f7f7f'
                        }
                    }
                }
            }
        }),
        async mounted () {
            //console.log("barChart mounted",this.data)
            this.generateChartData();
            Plotly.newPlot(this.id, this.chart_data,this.chart_layout);
        },
        methods : {
            generateChartData () {
                for(let i=0;i<this.data.length;i++) {


                    if(this.data[i].rate == 1 )
                    {
                        this.data[i].rate = "ปรับปรุง"
                    }else if (this.data[i].rate == 2 ){
                        this.data[i].rate = "พอใช้"

                    }else if (this.data[i].rate == 3 ){
                        this.data[i].rate = "ปานกลาง"

                    }else if (this.data[i].rate == 4 ){
                        this.data[i].rate = "ดี"

                    }else if (this.data[i].rate == 5 ){
                        this.data[i].rate = "ดีมาก"

                    }
                    this.chart_data[0].x.push(this.data[i].rate)
                    this.chart_data[0].y.push(this.data[i].count_n)
                }
            },


        }
    }

</script>

<style scoped>

</style>