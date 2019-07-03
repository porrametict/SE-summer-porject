<template>
    <div v-if="provinces">
        <h5>จังหวัด</h5>
        <select v-model="something" v-if="provinces" @change="sendData" class="form-control" id="pSelect">
            <option value="0" disabled>โปรดเลือกจังหวัด</option>
            <option :value="i.id" v-for="i in provinces">{{i.name_th}}</option>
        </select>
        <div class="invalid-feedback">
            จำเป็น
        </div>
    </div>
</template>

<script>
    export default {
        name: "Provinces",
        props: {

            ProvinceID: {
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
            if(this.ProvinceID){
                this.something = this.ProvinceID
            }
            this.f_name()
        },
        watch: {
            error: function(newVal, oldVal) { // watch it
                console.log('Prop changed: ', newVal, ' | was: ', oldVal)
                if (this.checkClassInvalid("pSelect")) {
                    this.clearInvalid("pSelect");
                }
                if (this.error == true) {
                    this.showInvalid("pSelect")
                }
            }
        },
        mounted() {
            if(this.provinces){
                if (this.checkClassInvalid("pSelect")) {
                    this.clearInvalid("pSelect");
                }
                if (this.error == true) {
                    this.showInvalid("pSelect")
                }
            }
        },
        data: () => ({
            something: 0,
            provinces: null,
        }),
        methods: {
            async f_name() {
                this.provinces = await axios.get('api/provinces/')
                    .then(function (response) {
                        //console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            },
            sendData() {
                this.$emit('change', this.something)
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

<style scoped>

</style>