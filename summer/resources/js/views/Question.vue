<template>
    <div v-if="head">

        <div class="text-center">
            <h1>{{head.survey.name}}</h1>
        </div>
        <hr>

        <div class="row">


                <div id="SexComponent" class="col-4">
                    <select-sex @change="sex_emit($event)"></select-sex>
                </div>

            <br/>

            <div id="testComponent2" class="col-4">
                <select-age @change="form.age = $event" v-bind:ageID="2"></select-age>
            </div>
        </div>

        <br/>


        <div class="row">

            <div id="ProvinceComponent" class="col-4"><h5>จังหวัด</h5>
                <selectProvinces @change="pronvince_emit($event)"></selectProvinces>
            </div>
            <br/>


            <select class="form-control col-4">
                <option value="">career</option>
            </select><br/>

        </div>

        <div class="container mt-5">
            <h1>รายการแบบสำรวจความพึงพอใจ</h1>
            <answer :sid="s_id" @change="answer_emit($event)"></answer>

        </div>


        <h1>ข้อเสนอแนะอื่นๆ</h1>
        <div class="">
            <textarea class="form-control" v-model="form.comment"></textarea>
        </div>


        <button class="btn btn-primary mt-5" @click="submit">
            Submit
        </button>
    </div>
</template>


<script>
    import answer from '../components/Answer'
    import selectSex from '../components/SC'
    import selectAge from '../components/Age'
    import selectProvinces from '../components/Provinces'

    export default {
        components: {
            answer,
            selectSex,
            selectAge,
            selectProvinces

        },
        created() {
            this.s_id = parseInt(this.$route.params.s_id);
            console.log(this.s_id, "s_Id");
            this.h_name()
            this.form.s_id = this.s_id
        },
        data: () => ({
            s_id: null,
            head: null,
            form: {
                s_id : null,
                age: null,
                sex: null,
                province: null,
                career: 1,
                comment: null,
                ans: [
                    {q_id: 0, rate: 5}
                ]
            }
        }),
        methods: {
            pronvince_emit(pronvincedata) {
                console.log('provinces id', pronvincedata)
                this.form.province = pronvincedata
            },
            answer_emit(answerdata) {
                console.log('answer id',answerdata)
                this.form.ans = answerdata
            },
            sex_emit(sexdata) {
                console.log('sex value', sexdata)
                this.form.sex = sexdata
            },
            submit() {
                console.log(this.form)
                axios.post('/api/repeats', this.form)
                    .then(function (response) {
                        console.log(response.data.id);
                        swal("Finished","ขอบคุณสำหรับคำตอบ", "success");
                        // vm.ShowSuccess("127.0.0.1/ans/" + response.data.id);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            async h_name() {
                this.head = await axios.get('api/survey/' + 7)
                    .then(function (response) {
                        console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            },

        },

    }

</script>
