<template>
    <div v-if="head">

        <div class="text-center">
            <h1>{{head.survey.name}}</h1>
        </div>
        <hr>

        <div class="row justify-content-center">


            <div id="SexComponent" class="col">
                <select-sex @change="sex_emit($event)"></select-sex>
            </div>

            <br/>

            <div id="testComponent2" class="col">
                <select-age @change="form.age = $event" v-bind:ageID="2"></select-age>
            </div>
        </div>

        <br/>


        <div class="row">

            <div id="ProvinceComponent" class="col-6">
                <selectProvinces @change="pronvince_emit($event)"></selectProvinces>
            </div>
            <br/>


            <div id="CareersComponent" class="col-6">
                <selectcareers @change="careers_emit($event)"></selectcareers>
            </div>
            <br/>

        </div>

        <div class="container mt-5">
            <h1>รายการแบบสำรวจความพึงพอใจ</h1>
            <answer :sid="s_id" @change="answer_emit($event)"></answer>

        </div>


        <h1>ข้อเสนอแนะอื่นๆ</h1>
        <div class="">
            <textarea class="form-control" v-model="form.comment"></textarea>
        </div>

        <div id="eiei">

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
    import selectcareers from '../components/careers'


    export default {
        components: {
            selectcareers,
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
        mounted() {
            Plotly.newPlot('eiei', this.chart);

        },
        data: () => ({
            chart: [
                {
                    x: ['giraffes', 'orangutans', 'monkeys'],
                    y: [20, 14, 23],
                    type: 'bar'
                }
            ],
            s_id: null,
            head: null,
            form: {
                s_id: null,
                age: null,
                sex: null,
                province: null,
                career: null,
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
            careers_emit(careersdata) {
                console.log('careers id', careersdata)
                this.form.career = careersdata
            },
            answer_emit(answerdata) {
                console.log('answer id', answerdata)
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
                        swal("Finished", "ขอบคุณสำหรับคำตอบ", "success");
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
