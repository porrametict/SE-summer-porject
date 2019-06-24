<template>
    <div v-if="head">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th scope="col" class="text-center">คำถาม</th>
            <th scope="col" class="text-center">ดีมาก</th>
            <th scope="col" class="text-center">ดี</th>
            <th scope="col" class="text-center">ปานกลาง</th>
            <th scope="col" class="text-center">พอใช้</th>
            <th scope="col" class="text-center">ปรับปรุง</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(i,index) in head.questions">
            <th scope="row">{{head.questions[index].text}}</th>
            <td class="text-center"><input type="radio" value="5" v-model="form.repeats[index].rate" @change="export_select"></td>
            <td class="text-center"><input type="radio" value="4" v-model="form.repeats[index].rate" @change="export_select"></td>
            <td class="text-center"><input type="radio" value="3" v-model="form.repeats[index].rate" @change="export_select"></td>
            <td class="text-center"><input type="radio" value="2" v-model="form.repeats[index].rate" @change="export_select"></td>
            <td class="text-center"><input type="radio" value="1" v-model="form.repeats[index].rate" @change="export_select"></td>
        </tr>
        </tbody>
    </table>
    </div>
</template>

<script>
    export default {
        name : "gdgdgd",
        props : {
            sid : Number
        },
        created(){
            this.hh_name()
        },
        data: () => ({

            head : null,
            form : {
                head : null,
                age : null,
                sex : null,
                province : null,
                career : null,
                comment : null,
                repeats : [
                ]
            }
        }),
        methods: {
            create_repeated(num_q) {
                for (let i =0 ; i < num_q.length;i++) {
                    this.form.repeats.push({q_id : num_q[i].id,rate : 0})
                }
            },
            async hh_name() {
                let vm = this
                this.head = await axios.get('api/survey/'+this.sid)
                    .then(function (response) {
                        console.log("success", response.data);
                        vm.create_repeated(response.data.questions)
                        return response.data

                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            },
            export_select() {
                this.$emit('change', this.form.repeats)
            },
        },
    }
</script>

<style scoped>

</style>