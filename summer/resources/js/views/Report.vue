<template>
    <div v-if="head">
        <h1>ReportPage</h1>
        <hr>
        <div class="text-center">
        <h3>{{head.survey.name}}</h3>
        </div>
        <div class="row justify-content-center">
            <div id="SexComponent" class="col-3 mt-5 " >
            <select-sex @change="sex_emit($event)"></select-sex>
             </div>

            <div id="testComponent2" class="col-3 mt-5 ">
            <select-age @change="form.age = $event" v-bind:ageID="2"></select-age>
            </div>

            <div id="ProvinceComponent" class="col-3 mt-5 " >
                <selectProvinces @change="pronvince_emit($event)"></selectProvinces>
            </div>

            <div id="CareersComponent" class="col-3 mt-5 ">
                <select-careers @change="careers_emit($event)"></select-careers>
            </div>


            <div>
<!--                <BarCharts></BarCharts>i in head.comments  i in head.question-->
            </div>
    </div>

        <div class="card mt-5">
            <div class="card-header">
                Questions
            </div>
            <ul class="list-group list-group-flush" v-for="i in head.question">
                <li class="list-group-item">{{i.text}}</li>
            </ul>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                Comments
            </div>
            <div class="card-body">
                <ul><li v-for="i in head.comments">{{i.text}}</li></ul>
            </div>
        </div>
</div>

</template>


<script>
    import selectSex from '../components/SC'
    import selectAge from '../components/Age'
    import selectProvinces from '../components/Provinces'
    import selectCareers from '../components/careers'
    import BarCharts from '../components/Barchart'

    export default {
        components: {
            selectSex,
            selectAge,
            selectProvinces,
            selectCareers,
            BarCharts

        },
        created() {
            this.get_data()
        },
        name: "CreateSurvey",
        data: () => ({
            head : null,
            careersIDS: null,
            provinceid: null,
            sexID: null,
            form: {
                hSurvey: "",
                questions: [],
            },
            questions: [
                {no: 0, text: ""}
            ],

        }),

        methods: {

            addtext() {
                this.questions.push({no: 0, text: ""})
            },
            save() {
                this.form.questions = this.questions
                console.log(this.form)
            },
            pronvince_emit(pronvincedata) {
                console.log('provinces id', pronvincedata)
                this.provinceid = pronvincedata
            },
            sex_emit(sexdata) {
                console.log('sex value', sexdata)
                this.sexID = sexdata
            },
            careers_emit(careerdata) {
                console.log('careers value', careerdata)
                this.careersIDS = careerdata
            },
            async get_data(){
                this.head = await axios.get('api/Report/'+this.$route.params.s_id)
                    .then(function (response) {
                        console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            }

        }
    }
</script>
