<template>



<div class="container class_cont" style="height: 100%;">
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr class="align-middle text-center">
		      <th scope="col"></th>
		      <th scope="col"></th>
		      <th class="d-none" scope="col">Article Name</th>
		      <th scope="col">Название</th>
		      <th scope="col">Описание</th>
		      <th scope="col">Цена</th>
          <th scope="col">Кол-во</th>
		    </tr>
		  </thead>
		  <tbody class="align-middle text-center border border-secondary">
		    <tr v-for=" (pizza, index) in this.pizzas" :key="this.pizzas">
          
		      <th scope="row">
            <button class="btn btn-danger" @click="$event => removeRecord($event)">X</button>  
          </th>

		      <td class="w-25">
			      <img v-bind:src="'storage/'+pizza.photo_path" @click="$event=> showPhoto()" class="img-fluid img-thumbnail" alt="Sheep">
		      </td>
		      <td class="d-none">{{ pizza.pizza_id }}</td>
          <td>{{ pizza.name }}</td>
		      <td>{{pizza.description}}</td>
		      
          <td class="p-price">{{ pizza.price  + " руб"}}</td>
          
        
		      <td class="tdtable">  
            <button @click="$event => countPlus($event)" class="btn btn-success  btn-circle btn-sm" >+</button>
           <div min="1" v-bind="this.count[index].count" id="counter" >{{ this.count[index].count }} </div>
           <button @click="$event => countMinus($event)" :disabled="this.count[index].count === 1" class="btn btn-danger  btn-circle btn-sm">-</button>
           
          </td>
         
		    </tr>
		   
		  </tbody>
		</table>   
    </div>
  </div>
  
    <div class="d-flex justify-content-end p-3">
      <p @click="summaryPrice()" class="">Итого: {{ this.sum }} </p>
   </div>
  

   <div class="d-flex justify-content-end p-2">


    


  <div class="decor_container">
    <button class="left left-btn">
      
      <a @click="setCurrentCountToCart()" 
        class="hbtn hb-fill-right">
                                    Перейти к заказу
      </a>
    </button>
  </div>
</div>
</div>
  

</template>
    
    
    
    
<script>
    import { useRemember } from '@inertiajs/vue3';
    
    export default{
    
        data(){
            return {
              pizzas: [],
              count: [],
              diction: {},
              sum: 0,
            }
        },
       
        mounted(){
          this.loadPizzas();
          this.getCount();
            
        },
        methods: {
          
            loadPizzas(){      
                axios.get('carts').then( (response)=>{
                  this.pizzas=response.data;
                  this.summaryPrice();
                });
            },
            
          
            getCount(){
              axios.get('carts/count').then( response =>  this.count = response.data);
              
            },
          
            removeRecord(event){
              let rowElem = event.target.parentNode.parentNode.cells;
              axios.delete('carts/' + rowElem[2].innerText);
              window.location.reload();
            },


            countPlus(event){

              this.count[event.target.parentNode.parentNode.rowIndex-1].count+=1;
              this.pizzas[event.target.parentNode.parentNode.rowIndex-1].count = this.count[event.target.parentNode.parentNode.rowIndex-1].count;
              this.diction[this.pizzas[event.target.parentNode.parentNode.rowIndex-1].pizza_id] =  this.count[event.target.parentNode.parentNode.rowIndex-1].count;
          
              this.sum = 0;
              this.pizzas.forEach(element => {
                this.sum +=element.price * element.count;
              });
             
             
            },
            countMinus(event){
              this.count[event.target.parentNode.parentNode.rowIndex-1].count-=1;
              this.pizzas[event.target.parentNode.parentNode.rowIndex-1].count = this.count[event.target.parentNode.parentNode.rowIndex-1].count;
              this.diction[this.pizzas[event.target.parentNode.parentNode.rowIndex-1].pizza_id] =  this.count[event.target.parentNode.parentNode.rowIndex-1].count;

              this.sum = 0;
              this.pizzas.forEach(element => {
                this.sum +=element.price * element.count;
              });
            
            },
            setCurrentCountToCart(){
              if(this.sum ==0){
                alert('Корзина пуста!')
              }
              else{
               axios.put('carts/count/update', this.diction);
               this.diction={};
               window.location.replace("order");
              }
             
            },
            

           

        
            summaryPrice(){
              
              this.sum = 0;
              this.pizzas.forEach(element => {
              this.sum +=element.price * element.count;
              });
            },
            

      }
    }
</script>

<style>
.class_cont {
  padding: 2rem 0rem;
}

h4 {
  margin: 2rem 0rem 1rem;
}



.classbg{
  background-image: url("storage/pizzas/p.jpg"); 
 
}

.btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 1px 0px;
            border-radius: 15px;
            font-size: 18px;
            text-align: center;
}
.tdtable{
  text-align: center; 
  vertical-align: middle;
}

.btn.hover-slide-right::before {
  top: 0; bottom: 0; left: 0; 
  height: 100%; width: 0%;
}
.btn.hover-slide-right:hover::before {
  width: 100%;
}
/* 
 */

.decor_container{
  
   
    background:#61b2d8;
    background:-moz-linear-gradient(45deg, #3498db 0%, #9b59b6 100%) fixed;
    background:-webkit-linear-gradient(45deg, #3498db 0%, #9b59b6 100%) fixed;
    
}
.left-btn{
  background: 0 0;
    border-radius: 2px;
    cursor: pointer;
    display: block;
    height: 60px;
    line-height: 60px;
    padding: 0 30px 0 25px;
    position: relative;
    transition: all .3s;
    border: 2px solid #fff;
    font-size: 1.3em;
    letter-spacing: 2px;
    text-transform: uppercase;
    z-index: 0;
   
    color: #fff;
    overflow: hidden;
    font-family: 'Open Sans', sans-serif;
}
.left-btn:hover {
    color: #ffffff;
}
    /*Adding the hover effect base */
    .left-btn::before {
        content: '';
        height: 100%;
        width: 100%;
        background: #e7315e;
        position: absolute;
        top: 0;
        right: 0;
        transition: all .3s;
        z-index: -1;
    }
 
/*Slide in from left*/
.left-btn.left::before {
            transform: translate(-100%, 0);
        }
        .left-btn.left:hover::before {
                transform: translate(0, 0);
            }

</style>