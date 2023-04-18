



<template>




  <div class="container-fluid bg-light py-3">
      <form id="contact-form" method="post" role="form">
        <form id="" >
          <div class="controls">
              <div class="row">
   
                      <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_town">Город *</label>
                          <input id="form_town" type="text" name="email" class="form-control" placeholder="Город" >
                         
                      </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_street">Улица *</label>
                          <input id="form_street" type="text" name="email" class="form-control" placeholder="Улица" >
                         
                      </div>
                  </div>

                  
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_house">Дом *</label>
                          <input id="form_house" type="number " name="phone" class="form-control" placeholder="Номер дома" >
                          
                      </div>
                  </div>
                
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_apartment">Квартира *</label>
                          <input id="form_apartment" type="number " name="surname" class="form-control" placeholder="Номер квартиры" >
                         
                      </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="form_phone">Номер телефона *</label>
                          <input id="form_phone" type="text" name="surname" class="form-control" placeholder="Номер телефона" >
                          
                      </div>
                  </div>
                
                  
              </div>
          </div> 
         
  
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="form_queries">Особые пожелания </label>
                      <textarea id="form_queries" name="message" class="form-control" placeholder="Особые пожелания" rows="4"></textarea>
                     
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
            order:[],
            town:'',
            street:'',
            house:'',
            apartment:'',
            phone:'',
            queries:'',

        }
    },
    methods: {
        sendOrder(){

            if ( document.getElementById('form_town').value ==="" ||
            document.getElementById('form_street').value === "" ||
            document.getElementById('form_house').value === "" ||
            document.getElementById('form_apartment').value === "" ||
            document.getElementById('form_phone').value === "" )
            {   
                alert("Поля заполнены некорректно. Пожалуста, повторите попытку");
            }
            else if (
                isNaN(document.getElementById('form_house').value) ||
                isNaN(document.getElementById('form_apartment').value))
                {
                    alert("Неправильно набран номер Дома или Квартиры");
                }
            else{
           
              
                this.order.push(document.getElementById('form_town').value);  
                this.order.push(document.getElementById('form_street').value);
                this.order.push(document.getElementById('form_house').value);
                this.order.push(document.getElementById('form_apartment').value);
                this.order.push(document.getElementById('form_phone').value);
                this.order.push(document.getElementById('form_queries').value);
             
                
                axios.post('orderform',{
                    town: this.order[0],
                    street: this.order[1],
                    house: this.order[2],
                    apartment: this.order[3],
                    phone: this.order[4],
                    queries: this.order[5],
                });

                this.order=[];

                window.location.href = 'homepage'
              
               
            }

             
        }
    }
}
</script>
