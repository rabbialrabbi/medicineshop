<template>
    <div class="row cart-row">
        <div class="col-4 cart-row_name">{{product.name}}</div>
        <div class="col-2 cart-row_quantity">
            <input id="input" type="number" min="1" :name="product.item_id" v-model="quantity" >
        </div>
        <div class="col-2 cart-row_price">{{product.unit_price}}</div>
        <div class="col-2 cart-row_total">{{total}}</div>
        <div class="col-2 cart-row_action"><a :href="'/cart/delete/'+product.item_id"><i class="fas fa-trash-alt"></i></a></div>
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

<style lang="scss" scoped>
    #input {
        width: 50px;
        border: 1px solid lightgrey;
    }
    #input:focus {
        outline:none;
        border: 1px solid lightgrey;
    }
    /*.cart-row{*/
    /*    width: 100%;*/
    /*    padding-left: 5%;*/
    /*}*/
    .cart-row_name,.cart-row_price,.cart-row_total,.cart-row_action{
        padding-left:20px;
    }
    .cart-row_quantity{
        padding: 0;
        input {
            padding-left: 5px;
        }
    }
    .cart-row_total{
        text-align: right;
    }
    .cart-row_action{
        text-align: center;
    }
</style>
