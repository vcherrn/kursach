



<template>




  <div class="container-fluid bg-light py-3">
      <form id="contact-form" method="post" role="form">
        <form id="" >
          <div class="controls">
              <div class="row">
   
                      <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_town">Город *</label>
                          <input v-bind="this.order.town = this.town" @change="checkEmpty()" id="form_town" type="text" name="email" class="form-control" placeholder="Город" v-model="this.town" >
                         
                      </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_street">Улица *</label>
                          <input v-bind="this.order.street = this.street" @change="checkEmpty()" id="form_street" type="text" name="email" class="form-control" placeholder="Улица" v-model="this.street">
                         
                      </div>
                  </div>

                  
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_house">Дом *</label>
                          <input v-bind="this.order.house = this.house" @change="checkEmpty()" id="form_house" type="number " name="phone" class="form-control" placeholder="Номер дома" v-model="this.house">
                          
                      </div>
                  </div>
                
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_apartment">Квартира *</label>
                          <input v-bind="this.order.apartment = this.apartment" @change="checkEmpty()" id="form_apartment" type="number " name="surname" class="form-control" placeholder="Номер квартиры" v-model="this.apartment">
                         
                      </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_phone">Номер телефона *</label>
                          <input v-bind="this.order.phone = this.phone" @change="checkEmpty()" id="form_phone" type="text" name="surname" class="form-control" placeholder="Номер телефона" v-model="this.phone">
                          
                      </div>
                  </div>
                
                  
              </div>
          </div> 
         
  
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="form_queries">Особые пожелания </label>
                      <textarea v-bind="this.order.queries = this.queries" v-model="this.queries" id="form_queries" name="message" class="form-control" placeholder="Особые пожелания" rows="4"></textarea>
                     
                  </div>
              </div>
              <div class="col-md-12">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <p class="text-muted"><strong></strong> </p>
              </div>
          </div>
      </form>
      
      </form>
      <button  @click="sendOrder()" class="btn btn-warning" >Сделать заказ</button>
      
  </div>
</template>

<script>
import { useRemember } from '@inertiajs/vue3';
import axios from 'axios';

export default{


data() {
        return {
            order:{},
            town:'',
            street:'',
            house:'',
            apartment:'',
            phone:'',
            queries:'',
            isEmpty: true,
        }
    },
    methods: {
        checkEmpty(){
            if( !this.town ||
                !this.street||
                !this.house||
                !this.apartment||
                !this.phone)
                {
                    this.isEmpty = true;
                }
               
                else{
                    this.isEmpty = false;
                }
        },
       
        sendOrder(){

                if( this.isEmpty){
                    alert("Поля заполнены некорректно. Пожалуста, повторите попытку");
                }
                else{
                    axios.post('orderform', this.order);
                    window.location.href = 'homepage'
             }

             
        }
    }
}
</script>
