<template>
    <div>
        <h1>ReportPage</h1>
        <hr>


        <div id="SexComponent" class="col-2">
            <select-sex @change="sex_emit($event)"></select-sex>
        </div>

        <!--        <div id="testComponent2" class="col-2">-->
        <!--            <select-age @change="ageID = $event" v-bind:ageID="2"></select-age>-->
        <!--            {{ageID}}-->
        <!--        </div>-->
        <div id="ProvinceComponent">
            <selectProvinces @change="pronvince_emit($event)"></selectProvinces>
        </div>

    </div>
</template>


<script>
    import selectSex from '../components/SC'
    import selectAge from '../components/Age'
    import selectProvinces from '../components/Provinces'

    export default {
        components: {
            selectSex,
            selectAge,
            selectProvinces

        },
        name: "CreateSurvey",
        data: () => ({
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

        }
    }
</script>
