<template>
    <div>
        <h1>ReportPage</h1>
        <hr>


        <div id="testComponent" class="col-2">
            <select-sex @change="sex_emit($event)"></select-sex>
            {{sexID}}
        </div>

<!--        <div id="testComponent2" class="col-2">-->
<!--            <select-age @change="ageID = $event" v-bind:ageID="2"></select-age>-->
<!--            {{ageID}}-->
<!--        </div>-->

        <selectProvinces @change="pronvince_emit($event)"></selectProvinces>


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
            provinceid : null,
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
            pronvince_emit(data) {
                console.log('provinces id',data)
                this.provinceid = data
            },
            sex_emit(data) {
                console.log('sex id',data)
                this.sexID = data
            },

        }
    }
</script>
