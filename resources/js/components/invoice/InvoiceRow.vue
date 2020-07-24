<template>
    <tr>
        <td>{{order.item.name}}</td>
        <td>{{order.item.code}}</td>
        <td>{{order.quantity}}</td>
        <td>{{order.price}}</td>
        <td></td>
    </tr>
</template>

<script>
    export default {
        name: "InvoiceRow",
        props:['order']
    }
</script>

<style scoped>

</style>
