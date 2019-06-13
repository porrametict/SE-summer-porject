<template>
    <div v-if="head">

        <h1>{{head.survey.name}}</h1>

        <select class="form-control col-2">
            <option value="">fdfdfd</option>
        </select>

        <div class="container mt-5">
            รายการแบบสำรวจความพึงพอใจ
        </div>

        <h1>ข้อเสนอแนะอื่นๆ</h1>
        <div class="">
        <textarea class="form-control"></textarea>
        </div>


        <button class="btn btn-primary mt-5">
            Submit
        </button>

        {{head.questions}}
    </div>

</template>




<script>
    export default {
        created(){
            this.h_name()
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
                    {q_id : 0,rate : 5}
                ]
            }
        }),
        methods: {
            async h_name() {
                this.head = await axios.get('api/survey/'+9)
                    .then(function (response) {
                        console.log("success", response.data);
                        return response.data
                    })
                    .catch(function (error) {
                        console.log("error", error);
                        return null
                    });
            },
            export_select() {
                this.$emit('change', this.something)
            },
            async h_name() {
                this.head = await axios.get('api/survey/'+8)
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
