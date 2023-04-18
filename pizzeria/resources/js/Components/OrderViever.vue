

<template>
    <div class="container t-4 p-0">
        
        <div class="row px-md-4 px-2 pt-4 form-bg">
            <div class="col-lg-8">
                <p class="pb-2 fw-bold">Заказ</p>
                <div class="card border border-secondary">
                    <div class="row ">
                        <div class="col-12 items-bg ">
                            <table class="table table-image ">
                                <thead class="align-middle text-center ">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th class="d-none" scope="col">Article Name</th>
                                        <th scope="col">Название</th>

                                        <th scope="col">Цена</th>
                                        <th scope="col">Кол-во</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle text-center">
                                    <tr v-for=" (pizza, index) in this.pizzas" :key="this.pizzas">

                                        <th scope="row">
                                            <button class="btn btn-danger"
                                                @click="$event => removeRecord($event)">X</button>
                                        </th>

                                        <td class="w-25">
                                            <img v-bind:src="'storage/' + pizza.photo_path" class="img-fluid img-thumbnail">
                                        </td>
                                        <td class="d-none">{{ pizza.pizza_id }}</td>
                                        <td>{{ pizza.name }}</td>

                                        <td>{{ pizza.price + " руб" }}</td>
                                        <td class="tdtable">
                                            <button @click="$event => countPlus($event)"
                                                class="btn btn-success  btn-circle btn-sm">+</button>
                                            <div v-bind="this.count[index].count" id="counter">{{ this.count[index].count }}
                                            </div>
                                            <button @click="$event => countMinus($event)"
                                                :disabled="this.count[index].count === 1"
                                                class="btn btn-danger  btn-circle btn-sm">-</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 payment-summary">
                <p class="fw-bold pt-lg-0 pt-4 pb-2">Сумма заказа</p>
                <div class="card px-md-3 px-2 pt-4">

                    <div class="d-flex flex-column b-bottom">


                        <div class="d-flex justify-content-between">
                             <b>Счет</b>
                            <p>{{ this.sum }}</p>
                        </div>
                    </div>
                                              
                  <!--  -->
                  <div class="decor_container ">
                        <button class="left left-btn ">
                       
                        <a @click="setCurrentCountToOrder()"
                            class="hbtn hb-fill-right ">
                                                       Далее
                        </a>
                        </button>
                    </div>

                  <!--  -->
                </div>
            </div>


        </div>
    </div>
</template>


<script>
import { useRemember } from '@inertiajs/vue3';

export default {

    data() {
        return {
            pizzas: [],
            count: [],
            diction: {},
            sum: 0,
        }
    },
    mounted() {
        this.loadPizzas();
        this.getCount();
    },
    methods: {
        loadPizzas() {

            axios.get('carts').then((response) => {
                this.pizzas = response.data;
                this.summaryPrice();
            });

        },
        summaryPrice() {
            this.sum = 0;
            this.pizzas.forEach(element => {
                this.sum += element.price * element.count;

            });
        },

        getCount() {
            axios.get('carts/count').then(response => this.count = response.data);
           
        },



        removeRecord(event) {
            let rowElem = event.target.parentNode.parentNode.cells
            axios.delete('carts/' + rowElem[2].innerText);
            this.loadPizzas();
        },
        countPlus(event) {

            this.count[event.target.parentNode.parentNode.rowIndex - 1].count += 1;


            this.pizzas[event.target.parentNode.parentNode.rowIndex - 1].count = this.count[event.target.parentNode.parentNode.rowIndex - 1].count;

            this.diction[this.pizzas[event.target.parentNode.parentNode.rowIndex - 1].pizza_id] = this.count[event.target.parentNode.parentNode.rowIndex - 1].count;


            this.sum = 0;
            this.pizzas.forEach(element => {
                this.sum += element.price * element.count;
            });

        },
        countMinus(event) {
            
            this.count[event.target.parentNode.parentNode.rowIndex - 1].count -= 1;
            this.pizzas[event.target.parentNode.parentNode.rowIndex - 1].count = this.count[event.target.parentNode.parentNode.rowIndex - 1].count;
            this.diction[this.pizzas[event.target.parentNode.parentNode.rowIndex - 1].pizza_id] = this.count[event.target.parentNode.parentNode.rowIndex - 1].count;

            this.sum = 0;
            this.pizzas.forEach(element => {
                this.sum += element.price * element.count;
            });

        },
        setCurrentCountToOrder() {

            if(this.sum==0){
                alert('Заказ не может быть пустым')
            }
            else{
                axios.put('carts/count/update', this.diction);
                this.diction = {};
                window.location.replace("orderform");
            }
        },
        
    }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    font-family: 'Montserrat', sans-serif
}

.items-bg{
    background-image: url("storage/pizzas/i.webp"); 
}

.tdtable {
    text-align: center;
    vertical-align: middle;
}

.btn-circle.btn-sm {
    width: 30px;
    height: 30px;
    padding: 1px 0px;
    border-radius: 15px;
    font-size: 18px;
    text-align: center;
}



.container {
    height: 100%;
}

.navbar-brand {
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 800
}



.order .card {
    position: relative;

    box-shadow: 0 0 15px rgba(0, 0, 0, .1)
}

.ribbon {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute
}

.ribbon::before,
.ribbon::after {
    position: absolute;
    content: '';
    display: block;
    border: 5px solid red
}

.ribbon span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 15px 0;
    background-color: red;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);

    font: 700 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
    text-transform: uppercase;
    text-align: center
}

.ribbon-top-right {
    top: -12px;
    right: -12px
}

.ribbon-top-right::before,
.ribbon-top-right::after {
    border-top-color: transparent;
    border-right-color: transparent
}

.ribbon-top-right::before {
    top: 0;
    left: 0
}

.ribbon-top-right::after {
    bottom: 0;
    right: 0
}

.ribbon-top-right span {
    left: -25px;
    top: 30px;
    transform: rotate(45deg)
}

small {
    font-size: 12px
}

.cart {
    line-height: 1
}

.icon {

    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%
}

.pic {
    width: 70px;
    height: 90px;
    border-radius: 5px
}

td {
    vertical-align: middle
}

.red {
    color: #fd1c1c;
    font-weight: 600
}

.b-bottom {
    border-bottom: 2px dotted black;
    padding-bottom: 20px
}

p {
    margin: 0px
}

table input {
    width: 40px;
    border: 1px solid #eee
}

input:focus {
    border: 1px solid #eee;
    outline: none
}

.round {
    background-color: #eee;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center
}

.payment-summary .unregistered {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #eee;
    text-transform: uppercase;
    font-size: 14px
}

.payment-summary input {
    width: 100%;
    margin-right: 20px
}

.payment-summary .sale {
    width: 100%;
    background-color: #e9b3b3;
    text-transform: uppercase;
    font-size: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 5PX 0
}

.red {
    color: #fd1c1c
}

.del {
    width: 35px;
    height: 35px;
    object-fit: cover
}

.delivery .card {
    padding: 10px 5px
}

.option {
    position: relative;
    top: 50%;
    display: block;
    cursor: pointer;
    color: #888
}

.option input {
    display: none
}

.checkmark {
    position: absolute;
    top: 40%;
    left: -25px;
    height: 20px;
    width: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 50%
}

.option input:checked~.checkmark:after {
    display: block
}

.option .checkmark:after {
    content: "\2713";
    width: 10px;
    height: 10px;
    display: block;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 200ms ease-in-out 0s
}

.option:hover input[type="radio"]~.checkmark {
    background-color: #f4f4f4
}

.option input[type="radio"]:checked~.checkmark {
    background: #ac1f32;
    color: #fff;
    transition: 300ms ease-in-out 0s
}

.option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1);
    color: #fff
}

.form-bg{
    /* background-image: url("storage/pizzas/bg2.jpg"); */
    background-color: #cccccc;
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
  width:100%;
  line-height: 60px;
  padding: 0 30px 0 25px;
  position: relative;
  transition: all .3s;
  border: 2px solid #fff;
  font-size: 1.3em;
  letter-spacing: 15px;
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