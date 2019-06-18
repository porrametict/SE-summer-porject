<template>
    <div>
        <h1>ReportPage</h1>
        <hr>


        <div id="SexComponent" class="col-2" >
            <select-sex @change="sex_emit($event)"></select-sex>
        </div>

        <!--        <div id="testComponent2" class="col-2">-->
        <!--            <select-age @change="ageID = $event" v-bind:ageID="2"></select-age>-->
        <!--            {{ageID}}-->
        <!--        </div>-->
        <div id="ProvinceComponent" class="col-3" >
            <selectProvinces @change="pronvince_emit($event)"></selectProvinces>
        </div>
        <div id="CareersComponent" class="col-2">
            <select-careers @change="careers_emit($event)"></select-careers>
        </div>

    </div>
</template>


<script>
    import selectSex from '../components/SC'
    import selectAge from '../components/Age'
    import selectProvinces from '../components/Provinces'
    import selectCareers from '../components/careers'

    export default {
        components: {
            selectSex,
            selectAge,
            selectProvinces,
            selectCareers

        },
        name: "CreateSurvey",
        data: () => ({
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

        }
    }
</script>
