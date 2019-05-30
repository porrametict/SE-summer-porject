<template>
    <div>
        <h1>Dashboard</h1>
        <hr>
<!--        <button class="btn btn-primary btn-lg" v-on:click="btnAlert()">GOTO PAGE 2</button>-->
<!--        <button class="btn btn-primary btn-lg" v-on:click="loadsex()">new</button>-->
        <hr>
        กรอกชื่อ<input v-model="name">
        <hr>

        <select v-model="sex">
            <option :value="sex.id" v-for="sex in sexes">{{sex.text}}</option>
        </select><br/>

        <button class="btn btn-primary btn-lg" @click="cat()">Add</button><br/>
        <h5>Users</h5>
        <ul v-if="listuser.length > 0">
            <li v-for="user in listuser">{{user.name}} - {{user.sex}}
                <button class="btn btn-danger" v-on:click="getuser()">Add</button>
            </li>
        </ul>
        <h1 v-else>
            No Data
        </h1>
    </div>
</template>


<script>
    export default {
        data: () => ({
            sex: "",
            sexes: null,
            name: "",
            listuser: [
                {name: "dog", sex: "ชาย"},
                {name: "cat", sex: "หญิง"}
            ]
        }),
        created() {
            this.loadsex()
        },
        methods: {
            btnAlert() {
                this.$router.push({name: "page2"})
            },
            async loadsex() {
                let data = await axios.get('/api/sexes',)
                    .then(function (response) {
                        console.log(response.data);
                        return response.data;
                    })
                    .catch(function (error) {
                        console.log(error.data);
                        return null;
                    })
                this.sexes = data;
            },
            getuser() {
                let name = this.name;
                let sex = this.sexes[this.sex-1].text;
                console.log(name,sex)
                this.listuser.push({"name":name,"sex":sex})
            }
        }
    }

</script>