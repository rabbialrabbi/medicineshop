<template>
    <div class="container mr-element">
        <div class="row">
            <div class="col-sm-12 col-md-3 pt-5">
                <img class="mr-element_img" :src="'/storage/mrlist/' + mr.image" :alt="mr.name" height="300px" width="300px">
            </div>
            <div class="col-sm-12 col-md-9 pl-5">
                <form role="form" action="/" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="csrf">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-8">
                                <div class="form-group">
                                    <span class="title">Name:</span> {{mr.name}}
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <span class="title">Code:</span> {{mr.code}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group" v-for="address in addresses">
                                    <span class="title">Address:</span> {{address}}
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <span class="title">Contact:</span> {{mr.contact1}}
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <span class="title">Email:</span> {{mr.email1}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <span class="title">Fax:</span> {{mr.fax}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col card-footer">
                <!--                <button type="submit" class="btn btn-warning">ADD</button>-->
            </div>
            <div class="col card-footer">
                <a :href="'/mr/'+mr.id+'/edit'" class="btn btn-success px-4">Edit</a>
            </div>
            <div class="col card-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MRelement",
        props:['csrf',"mr"],
        computed:{
          addresses(){
              var address = []
              if(this.mr.address1){
                  address.push(this.mr.address1)
              }
              if(this.mr.address2){
                  address.push(this.mr.address2)
              }
              if(this.mr.address3){
                  address.push(this.mr.address3)
              }
              return address
          },
            contacts(){
                var contact = []
                if(this.mr.contact1){
                    contact.push(this.mr.contact1)
                }
                if(this.mr.contact2){
                    contact.push(this.mr.contact2)
                }
                if(this.mr.contact3){
                    contact.push(this.mr.contact3)
                }
                return contact
            },
            emails(){
                var email = []
                if(this.mr.email1){
                    email.push(this.mr.email1)
                }
                if(this.mr.email2){
                    email.push(this.mr.email2)
                }
                if(this.mr.email3){
                    email.push(this.mr.email3)
                }
                return email
            }
        },
    }
</script>

<style scoped>
    .title {
        font-weight: bolder;
        font-size: 18px;
        padding-right: 5px;
    }
</style>
