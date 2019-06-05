<template>
    <div>
        <div class="row">
            <div class="col-md-3">
                <h3>หัวข้อแบบสอบถาม &nbsp; &nbsp;:</h3>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control form-control-lg btn-outline-primary btn-lg" placeholder="กรุณากรอกหัวข้อแบบสอบถามของท่าน">
            </div>
        </div>
        <br/><br/><br/>
        <div>
            <h3>รายงานแบบสอบถาม</h3>
        </div>
    <hr>

            <div class="d-flex">
                <input type="text" class="form-control">
                <button class="btn btn-danger mx-2">x</button>
            </div>
        <br>
            <button class="btn btn-primary float-right">เพิ่มรายการ</button>
    </div>
</template>

<script>
    export default {
        methods : {
            addtext(){

            }
        }
    }
</script>
