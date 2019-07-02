<template>
    <div >
            <h5>เพศ</h5>
            <select v-model="selector" class="custom-select" @change="sendData()" id="sexSelect">
                <option value="0" disabled>โปรดเลือกเพศ</option>
                <option v-for="d in data" v-bind:value="d.value">{{d.text}}</option>
            </select>
            <div class="invalid-feedback">
                จำเป็น
            </div>
    </div>
</template>
<script>
    export default {
        props: {

            sexID: {
                type: [String,Number],
                required: false
            },
            error: {
                type: Boolean,
                required: false,
                default : false
            },
        },
        created() {
            if (this.sexID) {
                this.selector = this.sexID
            }
        },

        watch: {
            error: function(newVal, oldVal) { // watch it
                console.log('Prop changed: ', newVal, ' | was: ', oldVal)
                if (this.checkClassInvalid("sexSelect")) {
                    this.clearInvalid("sexSelect");
                }
                if (this.error == true) {
                    this.showInvalid("sexSelect")
                }
            }
        },
        mounted() {
            if (this.checkClassInvalid("sexSelect")) {
                this.clearInvalid("sexSelect");
            }
            if (this.error == true) {
                this.showInvalid("sexSelect")
            }
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