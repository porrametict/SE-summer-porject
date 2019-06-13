<template>
    <div>

        <h1>Header</h1>
        <select class="form-control col-2">
            <option value="">fdfdfd</option>
        </select>

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
    export default {
        data: () => ({
            form : {
                age : null,
                sex : null,
                province : null ,
                career : null ,
                comment : null,
                repeats : [
                    {q_id : 0,rate : 5}
                ]
            }
        }),
        methods: {
            async f_name() {
                this.provinces = await axios.get('api/provinces/')
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
        },

    }

</script>
