<template>
    <div>
        <h5>เพศ</h5>
        <select v-model="selector" class="form-control" @change="sendData()">
            <option value="">โปรดเลือกเพศ</option>
            <option v-for="d in data" v-bind:value="d.value">{{d.text}}</option>
        </select>
    </div>
</template>
<script>
    export default {
        name: "NonDisSex",
        props:
            {sexID: Number}
        ,
        created() {
            if(this.sexID){
                this.selector = this.sexID
            }
        },
        data: () => ({
            selector: '',
            data: [
                {text: "ชาย", value: 1},
                {text: "หญิง", value: 2},
            ]
        }),
        methods: {
            sendData() {
                this.$emit("change", this.selector)
            }
        }
    }
</script>