<template>
    <div>
        <h5>เพศ</h5>
        <select v-model="selector" class="form-control" @change="sendData()">
            <option value="0" disabled>โปรดเลือกเพศ</option>
            <option v-for="d in data" v-bind:value="d.value">{{d.text}}</option>
        </select>
    </div>
</template>
<script>
    export default {
        props:
            {sexID: Number}
        ,
        created() {
            // this.selector = this.$props.sexID
        },
        data: () => ({
            selector: 0,
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