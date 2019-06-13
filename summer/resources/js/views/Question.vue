<template>
    <div v-if="head">

        <div class="text-center">
            <h1>{{head.survey.name}}</h1>
        </div>
        <hr>

        <div class="row">

            <div class="col-1"><h5>เพศ</h5></div>
            <div id="SexComponent" class="col-3">
                <select-sex @change="sex_emit($event)"></select-sex>
            </div>
            <br/>

            <div id="testComponent2" class="col-4">
                <select-age @change="ageID = $event" v-bind:ageID="2"></select-age>
                {{ageID}}
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

        </div>

        <h1>ข้อเสนอแนะอื่นๆ</h1>
        <div class="">
            <textarea class="form-control"></textarea>
        </div>


        <button class="btn btn-primary mt-5">
            Submit
        </button>


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
        created() {
            this.h_name()
        },
        data: () => ({
            provinceid: null,
            sexID: null,
            head: null,
            form: {
                age: null,
                sex: null,
                province: null,
                career: null,
                comment: null,
                repeats: [
                    {q_id: 0, rate: 5}
                ]
            }
        }),
        methods: {
            pronvince_emit(pronvincedata) {
                console.log('provinces id', pronvincedata)
                this.provinceid = pronvincedata
            },
            sex_emit(sexdata) {
                console.log('sex value', sexdata)
                this.sexID = sexdata
            },
            async h_name() {
                this.head = await axios.get('api/survey/' + 6)
                    .then(function (response) {
                        console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            },
            // export_select() {
            //     this.$emit('change', this.something)
            // },
        },

    }

</script>
