<template>
    <div id="myDiv">

    </div>
</template>

<script>
    export default {
        name: "Barchart",
        data: () => ({
            ca: [
                {
                    x: ['giraffes', 'orangutans', 'monkeys'],
                    y: [20, 14, 23],
                    type: 'bar'
                }
            ],}),
        mounted () {
            Plotly.newPlot('myDiv', this.ca);
        },
    }

</script>

<style scoped>

</style>