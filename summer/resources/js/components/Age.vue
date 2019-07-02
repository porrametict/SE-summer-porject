<template>
    <div>
            <h5>อายุ</h5>
            <select v-model="selector" class="form-control" @change="sendData()" id="selectAge">
                <option value="0" disabled>โปรดเลือกอายุ</option>
                <option v-for="d in data" v-bind:value="d">{{d}}</option>
            </select>
            <div class="invalid-feedback">
                จำเป็น
            </div>
    </div>
</template>
<script>
    export default {
        props: {
            ageID: {
                type: [String,Number],
                required: false
            },
            error: {
                type: Boolean,
                required: false,
                default : false
            },
        },
        created () {
            if(this.ageID){
                this.selector = this.ageID
            }
            this.createage()
        },
        watch: {
            error: function(newVal, oldVal) { // watch it
                console.log(' age Prop changed: ', newVal, ' | was: ', oldVal)
                if (this.checkClassInvalid("selectAge")) {
                    this.clearInvalid("selectAge");
                }
                if (this.error == true) {
                    this.showInvalid("selectAge")
                }
            }
        },
        mounted() {
            if (this.checkClassInvalid("selectAge")) {
                this.clearInvalid("selectAge");
            }
            if (this.error == true) {
                this.showInvalid("selectAge")
            }
        },
        data: () => ({
            selector: 0,
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
            },
            showInvalid(id) {
                let element = document.getElementById(id);
                element.classList.add("is-invalid");
            },
            clearInvalid(id) {
                let element = document.getElementById(id);
                element.classList.remove("is-invalid");
            },
            checkClassInvalid(id) {
                let element = document.getElementById(id);
                return element.classList.contains("is-invalid");
            }
        }
    }
</script>