<template>
    <div class="shopping-chart">
        <div class="shopping-chart_component" @click="showCart= !showCart"><i class="fa fa-shopping-cart"></i></div>
        <div class="shopping-list " v-show="showCart">
            <div class="shopping-chart_component-header">
                <h3>Welcome to MedicineShop</h3>
                <p>You currently have 0 item in you chart</p>
            </div>

            <form action='/order' method="POST">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" :value="csrf">

                <div class="shopping-chart_details">
                    <div class="row shopping-chart_user ">
                        <div class="col-8">
                            Customer Name :
                        </div>
                        <div class="col-4 shopping-chart_order">
                            <input type="text" name="order_name" value="MS-5890">
                        </div>
                    </div>
                    <div class="row shopping-chart_header">
                        <div class="col">Product</div>
                        <div class="col">Quantity</div>
                        <div class="col">Unit Price</div>
                        <div class="col">Total</div>
                    </div>
                    <div v-for="(order,index) in orderList">
                        <cart-row @update="subTotal[index]=$event; totalUpdate();" :product="order"></cart-row>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col">{{grandTotal}}</div>
                    </div>
                    <div class="row">
                        <div class="col"><button>Clear</button></div>
                        <div class="col"></div>
                        <div class="col"><button type="submit">Order</button></div>
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
                showCart : true,
                subTotal:[],
                grandTotal:0,
                testData:'VungVang',
                orderList:[
                    {item_id:'2',name:'Rooh Afza',unit_price:150},
                    {item_id:'3',name:'Honey',unit_price:250},
                    {item_id:'4',name:'Vungvang',unit_price:100},
                ]
            }
        },
        props:['csrf'],
        watch:{
          subTotal(value){
          }
        },
        methods:{
            cartToggle(){
                this.showCart = !this.showCart
            },
            totalUpdate(){
                let total= 0
                for (var i=0; i<this.subTotal.length; i++)
                {
                    total += this.subTotal[i]
                }
                this.grandTotal = total
            },
            test(){
                if(document.cookie){
                    document.cookie = 'name='+this.testData
                    console.log(document.cookie
                        // .split('; ')
                        // .find(row => row.startsWith('name'))
                        // .split('=')[1]
                        // (function(){
                        //     var myObject = JSON.parse('{"id":1,"gender":"male"}');
                        //     var e = 'Thu Nov 26 2017 15:44:38'; document.cookie = 'myObj='+ JSON.stringify(myObject) +';expires=' + e;
                        // })()
                    )
                }else {

                }

            }

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
        }
        i {
            padding:8px;
            color: $darkBack;
            font-size: 1.5rem;
            background-color: lightgreen;
            border-radius: 5px;
            cursor: pointer;
        }
    }
    .shopping-list {
        width: 100%;
        text-align: center;
        background-color: #fff;
        border-radius: 5px;
        padding: 10px;
    }

</style>
