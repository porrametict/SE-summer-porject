<template>
    <div>
        <h5>อาชีพ</h5>
        <select v-model="selector" class="form-control" @change="sendData()" id="careerSelect">

            <option value="0" disabled>โปรดเลือกอาชีพ</option>
            <option v-for="d in data" v-bind:value="d.value">{{d.text}}</option>
        </select>
        <div class="invalid-feedback">
            จำเป็น
        </div>
    </div>
</template>
<script>
    export default {
        props: {

            CareersID: {
                type: [String,Number],
                required: false
            },
            error: {
                type: Boolean,
                required: false,
                default : false
            },
        },
        created () {
            if(this.CareersID){
                this.selector = this.CareersID
            }
        },
        watch: {
            error: function(newVal, oldVal) { // watch it
                console.log('Prop changed: ', newVal, ' | was: ', oldVal)
                if (this.checkClassInvalid("careerSelect")) {
                    this.clearInvalid("careerSelect");
                }
                if (this.error == true) {
                    this.showInvalid("careerSelect")
                }
            }
        },
        mounted() {
            if (this.checkClassInvalid("careerSelect")) {
                this.clearInvalid("careerSelect");
            }
            if (this.error == true) {
                this.showInvalid("careerSelect")
            }
        },
        data: () => ({
            selector: 0,
            data: [
                {text: "กรรมกร", value: 1},
                {text: "เกษตรกร", value: 2},
                {text: "ข้าราชการ", value: 3},
                {text: "ครู/อาจารย์", value: 4},
                {text: "ค้าขาย", value: 5},
                {text: "จิตรกร", value: 6},
                {text: "ช่าง", value: 7},
                {text: "ตำรวจ", value: 8},
                {text: "ทนายความ", value: 9},
                {text: "ทหาร", value: 10},
                {text: "นักการตลาด", value: 11},
                {text: "นักกู้ภัย", value: 12},
                {text: "นักถ่ายภาพ", value: 13},
                {text: "นักบัญชี", value: 14},
                {text: "นักรีวิว", value: 15},
                {text: "นักเรียน/นักศึกษา", value: 16},
                {text: "นักวางแผนทางการเงิน", value: 17},
                {text: "นักวิทยาศาสตร์", value:18 },
                {text: "นักออกแบบ", value: 19},
                {text: "เน็ตไอดอล", value: 20},
                {text: "ผู้ประกอบการธุรกิจ", value: 21},
                {text: "ผู้พิพากษา", value: 22},
                {text: "พนักงานประจำ", value: 23},
                {text: "พยาบาล", value: 24},
                {text: "ฟรีแลนซ์", value: 25},
                {text: "เลขานุการ", value: 26},
                {text: "วิศวกร", value: 27},
                {text: "สถาปนิก", value: 28},
                {text: "หมอ", value: 29},
                {text: "อาชีพในวงการบันเทิง", value: 30},
            ]
        }),
        methods: {
            sendData() {
                this.$emit("change",this.selector)
            },
            showInvalid(id) {
                let element = document.getElementById(id);
                element.classList.add("is-invalid");
            },
            clearInvalid(id) {
                let element = document.getElementById(id);
                element.classList.remove("is-invalid");
            },
            checkClassInvalid(id) {
                let element = document.getElementById(id);
                return element.classList.contains("is-invalid");
            }
        }
    }
</script>