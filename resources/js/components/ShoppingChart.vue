<template>
    <div class="shopping-chart">
        <div class="shopping-chart_component" @click="showCart= !showCart"><i class="fa fa-shopping-cart"></i></div>
        <div class="shopping-list " v-show="showCart">
            <div class="shopping-chart_component-header">
                <h3>Welcome to MedicineShop</h3>
                <p>You currently have 0 item in you chart</p>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <cart-row @update="subTotal[0]=$event; totalUpdate();"></cart-row>
                <cart-row @update="subTotal[1]=$event; totalUpdate();"></cart-row>
                </tbody>
            </table>
            <div>{{grandTotal}}</div>

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
                testData:'VungVang',
                orderList:[
                    {id:'',name:'',price:'',quantity:''}
                ]
            }
        },
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
