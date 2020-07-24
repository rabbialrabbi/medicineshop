<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
<!--                    <div class="callout callout-info">-->
<!--                    <h5><i class="fas fa-info"></i> Note:</h5>-->
<!--                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test-->
<!--                </div>-->


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> MedicineShope
                                    <small class="float-right">Date: {{today}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Owner Name</strong><br>
                                    address<br>
                                    Phone: Number<br>
                                    Email: email
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{order.user.name}}</strong><br>
                                    {{order.user.mr.address1}}<br>
                                    Phone: {{order.user.mr.contact1}}<br>
                                    Email: {{order.user.mr.email1}}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #007612</b><br>
                                <br>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Code</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(i,index) in order.order_details">
                                        <td>{{i.item.name}}</td>
                                        <td>{{i.item.code}}</td>
                                        <td>{{i.quantity}}</td>
                                        <td>{{i.price}}</td>
                                        <td>{{i.quantity*i.price}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>{{subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{subtotal}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a :href="'/order/print/'+order.id" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "InvoiceComponent",
        props:['order'],
        data(){
            return {
                total: []
            }
        },
        computed:{
            subtotal(){
                let sum = 0
                this.order.order_details.forEach(i=>{
                   sum+= i.quantity*i.price
               })
                return sum
            },
            today(){
                let day = new Date();
                return `${day.getDate()}/${day.getMonth()}/${day.getFullYear()}`
            }
        }
    }
</script>

<style scoped>

</style>
