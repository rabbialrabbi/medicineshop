<template>

</template>

<script>
    export default {
        name: "sendMessage",
        props:['csrf'],
        data(){
            return {
                name:'',
                email:'',
                message:'',
                returnMsg:false
            }
        },
        methods:{
            messageSubmit(){
                axios.post('/message',{
                    name:this.name,
                    email:this.email,
                    message:this.message,
                    _token:this.csrf
                }).then((response)=>{
                    this.returnMsg = response.data
                    this.name= '';
                    this.email= '';
                    this.message= '';
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "resources/sass/variables";
    .message {
        background-color: lightgrey;
        margin-top: 10px;
        padding: 5px 10px 5px 10px;
        border-radius: 5px;
    }

</style>
