<template>
    <div class="row cart-row">
        <div class="col">{{product.name}}</div>
        <div class="col">
            <input id="input" type="number" min="1" :name="product.item_id" v-model="quantity" >
        </div>
        <div class="col">{{product.unit_price}}</div>
        <div class="col">{{total}}</div>
        <div class="col"><a :href="'/cart/delete/'+product.item_id"><i class="fas fa-trash-alt"></i></a></div>
    </div>

</template>

<script>
    export default {
        name: "CartRow",
        props:['product'],
        data(){
            return{
                quantity:0,
            }
        },
        computed:{
            total(){
              return this.quantity* this.product.unit_price
            }
        },
        methods:{
            updateTotal(){
                // this.$emit('update',this.total)
            }
        },
        watch:{
            total(value){

                this.$emit('update', value)
                // document.cookie = 'product1='+value

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
    /*.cart-row{*/
    /*    width: 100%;*/
    /*    padding-left: 5%;*/
    /*}*/
</style>
