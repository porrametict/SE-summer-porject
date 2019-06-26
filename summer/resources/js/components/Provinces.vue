<template>
    <div>
        <h5>จังหวัด</h5>
        <select v-model="something" v-if="provinces" @change="sendData" class="form-control">
            <option value="0" disabled>โปรดเลือกจังหวัด</option>
            <option :value="i.id" v-for="i in provinces">{{i.name_th}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "Provinces",
        props :
            {ProvinceID : Number}
        ,
        created() {
            if(this.ProvinceID){
                this.something = this.ProvinceID
            }
            this.f_name()
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
        }
    }
</script>

<style scoped>

</style>