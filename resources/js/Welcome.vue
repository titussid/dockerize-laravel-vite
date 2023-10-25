<template>
<img alt="Vue logo" src="../images/logo.png">
<h1>Welcome page of Laravel and Vue made by Titus </h1>

<p>My name is {{ name }}</p>
<p>Name of my wife is {{ wife }}, her age is {{ wifeAge }} and she is an awesome {{ wifeProfesssion }}</p>
<div id="form">
    <label>Wife Name : </label>
    <input type="text" name="wife" placeholder="Wife Name" v-model="wife" /> <br />
    <label>Wife Age </label>
    <input type="text" name="wife" placeholder="Wife Age" v-model="wifeAge" /> <br />
    <label>Wife Profession : </label>
    <input type="text" name="wife" placeholder="Wife Profession" v-model="wifeProfesssion" /> <br />
    <button type="button" v-on:click="getData()"> Get Data </button>  <br />
    <label>Increamented Wife Age next year {{ increamentedAge }}</label> <br />
</div>



<Condtions on.bind:msg="This is Condition page: Titus" />
</template>

<script>
import Condtions from './Conditions.vue'

export default {
    data() {
        return {
            name: "Titus SID",
            wife: "",
            wifeAge: 0,
            increamentedAge: 0,
            wifeProfesssion: "",
        };
    },
    methods: {
        getData() {
            this.increamentedAge = this.wifeAge+1;
        },

    },
}
</script>

<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #19191a;
    margin: 60px auto;
    display: block;
    background-color: #e5e5f8;
    width: 1024px;
}
#form{
    text-align: center;
    width: 300px;
    margin: 0px auto;
}
</style>
