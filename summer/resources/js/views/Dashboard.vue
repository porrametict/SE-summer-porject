<template>
    <div>

        <div clss="col-md-12">

            <h4>สร้างแบบสำรวจง่ายๆด้วยตัวคุณเอง</h4>
            <div class="flex-center position-ref mt-5">
                <button type="button" class="btn btn-primary btn-lg" @click="gotoCreateSurvey">สร้างแบบสำรวจ</button>
            </div>

            <div class="top-right">
                <button type="button" class="btn btn-outline-primary" @click="gotoCreateSurvey">Create Your Survey
                </button>
            </div>
            <br/>


            <hr>
        </div>
        <div clss="col-md-12">

            <h4>แบบสำรวจล่าสุด</h4>
        </div>
        <div class="col-12 mt-5">
            <button type="button" class="btn btn-outline-secondary btn-block" @click="gotoReport">ReportPage
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            gotoCreateSurvey() {
                this.$router.push({name: "CreateSurvey"})
            },
            gotoReport() {
                this.$router.push({name: "Report"})
            },
        }
    }

</script>


<style scoped>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 400px;
        top: 70px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>