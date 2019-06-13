<template>
    <div>
        <select v-model="selector" class="form-control" @change="sendData()">
            <option v-for="d in data" v-bind:value="d.value">{{d.text}}</option>
        </select>
    </div>
</template>
<script>
    export default {
        props :
            {sexID : Number}
        ,
        created () {
            this.selector = this.$props.sexID
        },
        data: () => ({
            selector: 0,
            data: [
                {text: "Sex", value: 0},
                {text: "Male", value: 1},
                {text: "Female", value: 2},
            ]
        }),
        methods: {
            sendData() {
                console.log(this.$emit("change",this.selector))
            }
        }
    }
</script>