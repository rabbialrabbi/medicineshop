<template>
    <div class="row justify-content-center">

        <div class="col-6 col-lg-4 col-xl-3" v-for="product in product_list">
            <div class="prod-item">
                <img :src="'storage/item/'+product.image"  alt="Syrup">
                <hr>
                <div class="prod-item_info">
                    <h5 class="prod-item_info-header">{{product.name}}</h5>
                    <p class="prod-item_info-body">{{product.generic.name}}</p>
                    <p class="prod-item_info-body">Code : {{product.code}}</p>
                    <p class="prod-item_info-body">Brand : {{product.brand.name}}</p>
                    <p class="prod-item_info-body">Size : {{product.size}}</p>
                    <hr>
                    <div class="row prod-item_info-price">
                        <div class="col-6">TK {{product.price}}</div>
                        <div class="col-6"><button><a :href="'/cart/'+product.id"><i class="fa fa-shopping-cart" ></i></a></button></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<!---->
<script>
    export default {
        name: "ProductList",
        props:['product_list'],
        methods:{
            product_add(product){
                let prod = document.cookie.split('; ').find(row => row.startsWith('product_list')).split('=')[1];
                let prodJson = JSON.parse(prod)

                if(prodJson){
                    let new_product = this.createProductArray(product)

                    let cookiesItemCheck = prodJson.find((item)=>{
                       return item.item_id == new_product.item_id
                    })
                    if(!cookiesItemCheck){
                       prodJson.push(new_product)
                    }
                    let item = JSON.stringify(prodJson)
                    document.cookie = 'product_list='+ item;
                }else {
                    let arrayItem = [];
                    arrayItem.push(this.createProductArray(product));
                    let item = JSON.stringify(arrayItem)
                    document.cookie = 'product_list='+ item;
                }
                let cookiesProd = document.cookie.split('; ').find(row => row.startsWith('product_list')).split('=')[1];
                let cookiesProdJson = JSON.parse(prod)
                console.log(cookiesProdJson)

            },
            createProductArray(product){
                let item = {}
                item.item_id = product.id;
                item.name = product.name;
                item.unit_price = product.price;
                return item
            }
        }
    }
</script>

<style scoped>

</style>
