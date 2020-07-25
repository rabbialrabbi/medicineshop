<template>
    <div class="shopping-chart">
        <div class="shopping-chart_component" @click="showCart= !showCart">
            <i class="fa fa-shopping-cart">
                <span  class="badge badge-danger navbar-badge">{{product_list_count}}</span>
            </i>

        </div>
        <div class="shopping-list " v-show="showCart">
            <div class="shopping-chart_component-header">
                <h3>Welcome to MedicineShop</h3>
                <p>You currently have {{product_list_count}} item in you chart</p>
            </div>

            <form action='/order' method="POST">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" :value="csrf">

                <div class="shopping-chart_details">
                    <div class="row shopping-chart_user ">
                        <div class="col-8">
                            User : {{user}}
                        </div>
                        <div class="col-4 shopping-chart_order">
                            <input type="text" name="order_name" placeholder="Order Id" required>
                        </div>
                    </div>
                    <div class="row shopping-chart_header">
                        <div class="col-4 cart-row_name">Product</div>
                        <div class="col-2 cart-row_quantity">Quantity</div>
                        <div class="col-2 cart-row_price">Unit Price</div>
                        <div class="col-2 cart-row_total">Total</div>
                        <div class="col-2 cart-row_action"></div>
                    </div>
                    <div v-if="product_list" v-for="(order,index) in product_list">
                        <cart-row @update="subTotal[index]=$event; totalUpdate();" :product="order"></cart-row>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col">{{grandTotal}}</div>
                    </div>
                    <div class="row text-center pt-5">
                        <div class="col"><a class="btn btn-danger" href="/cart/clear/all">Clear</a></div>
                        <div class="col"><button  class="btn btn-success" type="submit">Order</button></div>
                    </div>
                </div>

            </form>

        </div>


    </div>
</template>

<script>
    import CartRow from "./CartRow";
    export default {
        name: "ShoppingChart",
        data(){
            return {
                showCart : false,
                subTotal:[],
                grandTotal:0,

            }
        },
        props:['csrf','product_list','user'],
        watch:{
          subTotal(value){
          }
        },
        computed:{
          product_list_count(){
              if(this.product_list){
                  return Object.keys(this.product_list).length
              }
              return 0
          }
        },
        methods:{
            totalUpdate(){
                let total= 0
                for (var i=0; i<this.subTotal.length; i++)
                {
                    if(typeof this.subTotal[i] !== "undefined"){
                        total += this.subTotal[i]
                    }
                }
                this.grandTotal = total
            },
        },
        components:{
            CartRow
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/variables";
    .shopping-chart {
        position: fixed;
        width: 30%;
        top: 20%;
        right:5px;
        z-index: 99;
        &_details{
            text-align: left;
        }

        &_order{
            input {
                text-align: center;
                width: 70%;
                border: none;
            }
        }

        &_header div{
            font-weight: bolder;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        &_component {
            text-align: right;
            margin-bottom: 5px;


        }
        i {
            padding:8px 2px 8px 8px;
            color: $darkBack;
            font-size: 1.5rem;
            background-color: lightgreen;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 3px 5px lightgreen;
        }
    }
    .navbar-badge{
        font-size: 10px;
        transform: translate(-10%,-100%);
    }
    .shopping-list {
        width: 100%;
        text-align: center;
        background-color: #fff;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 0 10px 5px lightgrey;
    ;

    }
    .cart-row_name,{
        padding-left:20px;
    }
    .cart-row_price{
        padding: 0;
    }
    .cart-row_quantity{
        padding: 0;
    }
    .cart-row_total{
        text-align: right;
    }
    .cart-row_action{
        text-align: center;
    }
</style>
