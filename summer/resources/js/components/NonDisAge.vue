<template>
    <div>
        <div class="justify-content-center">
            <h5>อายุ</h5>
            <select v-model="selector" class="form-control" @change="sendData()">
                <option value="">โปรดเลือกอายุ</option>
                <option v-for="d in data" v-bind:value="d">{{d}}</option>
            </select>
        </div>
    </div>
</template>
<script>
    export default {
        name: "NonDisAge",
        props :
            {ageID : Number}
        ,
        created () {
            if(this.ageID){
                this.selector = this.ageID
            }
            this.createage()
        },
        data: () => ({
            selector: '',
            data: [
                // {text: "Please Select", value: 0},

            ]
        }),
        methods: {
            sendData() {
                this.$emit("change",this.selector)
            },
            createage() {
                for (let i = 1;i < 101;i++)
                {

                    this.data.push(i)
                }
            }
        }
    }
</script>