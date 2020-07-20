<template>
    <tr>
        <td>Product</td>
        <td><input id="input" type="number" min="1" v-model="quantity" ></td>
        <td>10</td>
        <td>{{total}}</td>
    </tr>

</template>

<script>
    export default {
        name: "CartRow",
        data(){
            return{
                quantity:0,
            }
        },
        computed:{
            total(){
              return this.quantity*10
            }
        },
        methods:{
            updateTotal(){
                // this.$emit('update',this.total)
            }
        },
        watch:{
            quantity(value){

                this.$emit('update', value*10)
                document.cookie = 'product1='+value

            }
        }
    }
</script>

<style scoped>
    #input {
        width: 50px;
        border: 1px solid lightgrey;
    }
    #input:focus {
        outline:none;
        border: 1px solid gray;
    }
</style>
