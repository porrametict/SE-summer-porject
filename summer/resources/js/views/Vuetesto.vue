<template>
    <div>
        <!--        <input v-model="c_num">-->
        <!--        <input v-model="a_num">-->
        <!--        {{ans_num+5}}-->
        <!--        {{c_num+5}}-->
        <!--        {{a_num+5}}-->
        <!--        <button @click="plus_number">add</button>-->
        <!--        {{form.key}}-->
        <!--            <button @click="f_name">Add</button>-->
        <!--        <button @click="f_name">change</button>-->
        <!--        {{arObj[0].key1}}-->
        <!--        <input type="text" v-model="form.key3">-->

        <!--        <div v-if="(form.key3)>10">-->
        <!--            ตัวเลขมากกว่า10-->
        <!--        </div>-->
        <!--        <div v-else-if="(form.key3)<10">-->
        <!--            ตัวเลขน้อยกว่า10-->
        <!--        </div>-->
        <!--        <div v-else>-->
        <!--            โปรดกรอกตัวเลข-->
        <!--        </div>-->
        <!--        {{form.key8.length}}-->
        <!--        <div v-for="i in form.key8">-->
        <!--            <div v-if="i=='cat'">-->
        <!--                i={{i}}{{"Hello"}}-->
        <!--            </div>-->
        <!--            <div v-else>-->
        <!--                i={{i}}-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div>-->
        <!--            {{sexes.name}}-->
        <!--        </div>-->
        <select v-model="something" v-if="provinces" @change="export_select">
            <option :value="i.id" v-for="i in provinces">{{i.name_th}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "Vuetesto",
        props: {
            title : String,
            num_n : Number
        },
        created() {
            this.name = this.title
            this.n_car = this.num_n
            this.f_name()
        },
        data: () => ({
            something : 0,
            provinces : null,
            form : {
                u_id : 1,
                hSurvey : "cat",
                questions : []
            },
            name : "",
            n_car : 0
            // catName : "",
            // a_num : 5,
            // B_num : 7,
            // d_num : 0,
            // ans_num : null,
            // form: {key: 1, key1: "", key3: null, key8: [1, "cat", 3, 4]}
            // arr : [true ,1 , "cat", null],
            // arObj : [
            //     {key1: "cat1",key2 : 'cat01'},
            //     {key1: "cat2",key2 : 'cat02'},
            //     {key1: "cat3",key2 : 'cat03'}
            // ]
        }),
        methods: {
            async f_name() {
                this.provinces = await axios.get('api/provinces/')
                    .then(function (response) {
                        console.log("success",response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error",error);
                        return null
                    });
            },
            export_select() {
                this.$emit('change',this.something)
            },
        }
    }
</script>
<style scoped>

</style>


async f_name() {
this.provinces = await axios.get('api/provinces/')
.then(function (response) {
console.log("success",response.data);
return response.data
})
.catch(function (error) {
console.log("error",error);
return null
});
},
export_select() {
this.$emit('change',this.something)
},



provinceid : null
<cat title="สมัย" :num_n="5" @change="pronvince_emit($event)"></cat>