<template>
    <div>
        <select v-model="something" v-if="provinces" @change="sendData" class="form-control">
            <option :value="i.id" v-for="i in provinces">{{i.name_th}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "Provinces",
        created() {
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
                        console.log("success", response.data);
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