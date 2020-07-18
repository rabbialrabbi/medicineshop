<template>
    <div class="shopping-chart">
        <div class="shopping-chart_component" @click="showCart= !showCart"><i class="fa fa-shopping-cart"></i></div>
        <div class="shopping-chart_component shopping-list " v-if="showCart">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        name: "ShoppingChart",
        data(){
            return {
                showCart : false,
            }
        },
        methods:{
            cartToggle(){
                this.showCart = !this.showCart
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/variables";
    .shopping-chart {
        position: fixed;
        width: 30%;
        top: 40%;
        right:0;
        &_component {
            display: inline-block;
            text-align: right;
        }
        i {
            padding:8px;
            color: $themeOrange;
            font-size: 1.5rem;
            background-color: lightgreen;
            border-radius: 5px;
        }
    }
    .shopping-list {
        width: 100%;
    }
</style>
