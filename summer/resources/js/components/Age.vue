<template>
    <div>
        <div>
        <select v-model="selector" class="form-control" @change="sendData()">
            <option v-for="d in data" v-bind:value="d">{{d}}</option>
        </select>
        </div>
    </div>
</template>
<script>
    export default {
        props :
            {ageID : Number}
        ,
        created () {
            this.createage()
        },
        data: () => ({
            selector: 0,
            data: [
                {text: "Please Select", value: 0},

            ]
        }),
        methods: {
            sendData() {
                this.$emit("change",this.selector)
            },
            createage() {
                var N = 101;
                this.data=Array.apply(null, {length: N}).map(Number.call, Number)
            }
        }
    }
</script>