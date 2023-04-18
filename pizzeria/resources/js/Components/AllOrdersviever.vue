


<template>
    <section id="content-tab1 ">
        <div class="bgclass">
        <div class="flex-table flex flex-column">
            <div class="flex-table-header flex ">
                </div>
               
                <div class="flex-table-content flex flex-column border  border-secondary"
              
                    v-for=" (pizza, i) in this.completeorders">
                   
                    <div class="order-content flex " v-if="this.completeorders[i].id!=temp || i===0">
                        <div class="border-right border-secondary">
                            <div class="cart-header relative short" style="margin-left: 20px; max-width: 70%">
                                <h2># {{ this.completeorders[i].id }} </h2>
                            </div>

                           
                                <div >
                                  
                                        <table  class="table  table-success table-striped  " style="width: 60vh;"  >
                                            <thead>
                                                <tr>
                                                    <th scope="col">Имя</th>
                                                    <th scope="col">Город</th>
                                                    <th scope="col" style="min-width: 10vh;">Улица</th>
                                                    <th scope="col" >Квартира</th>
                                                    <th scope="col">Дом</th>
                                                    <th scope="col" style="min-width: 10vh;" >Телефон</th>
                                                    <th scope="col">Пожелания</th>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                <tr>
                                                    <th scope="row">{{ users[this.completeorders[i].user_id-1].name }}</th>
                                                    <td>{{ this.completeorders[i].town }}</td>
                                                    <td>{{ this.completeorders[i].street }}</td>
                                                    <td>{{ this.completeorders[i].apartment }}</td>
                                                    <td>{{ this.completeorders[i].house }}</td>
                                                    <td>{{ this.completeorders[i].phone_number }}</td>
                                                    <td>{{ this.completeorders[i].special_requests }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                      
                                   
                                  
                                </div>
                        
                        </div>
                    
                        <div class="border-right border-secondary  ">


                            <P class="d-none">{{ this.sum[i]=0 }}</P>
                            <div class="flex order-cost-item  align-middle" v-for=" (p, j) in this.completeorders "
                                style="width: 30vh;">
                                <p v-if="this.completeorders[i].id === p.order_id">

                                    
                                <div class="align-middle text-center ">
                                    {{ this.completeorders[j].name }} -
                                    {{ this.completeorders[j].price }}
                                    ×
                                    {{ this.completeorders[j].count }} =
                                    {{ this.completeorders[j].price * this.completeorders[j].count }}
                                </div>
                                <p class="d-none"> {{ this.sum[i] += this.completeorders[j].price *
                                    this.completeorders[j].count }}</p>
                                </p>
                               
                              

                            </div>
                           
                            <div class="main-order-info">
                                <b>Итого:
                                    {{ this.sum[i] }}
                                </b>
                            </div>


                        </div>

                        <div class="border-right border-secondary">

                            <div class="main-order-info ">Ожидает проверки с <br> {{ this.completeorders[i].created_at }}
                            </div>
                        </div>

                        <div class="border-right border-secondary text-center" >

                         
                                <button class="btn btn-warning " v-bind:id="completeorders[i].id"
                                    @click="$event => deleteOrder($event)">Выполнить</button>
                                

                        </div>
                    </div>
                 <p class="d-none">  {{ temp =completeorders[i].id}}</p> 
                    <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                </div>
            </div>

        </div>
    </section>
</template>

<script>
import { useRemember } from '@inertiajs/vue3';
import axios from 'axios';
// import { RHighlightRules } from 'vendor/tcg/voyager/publishable/assets/js/ace/libs/mode-r';

export default {

    data() {
        return {
            completeorders: [],
            order: [],
            orig_order: [],
            pizza_count: {},
            order_id: '',
            sum: [],
            temp:1,
            users:[],
        }
    },
    mounted() {
        this.loadPizzas();
    },
    methods: {
        loadPizzas() {
            axios.get('orders').then((response) => {
                this.completeorders = response.data
                this.loadOrders();
                this.sum.length = this.orig_order.length;
                this.getUserts();
            });
          
        },

        getUserts(){
            axios.get('users').then(response=>this.users=response.data);
        },
        getCount() {

           
            let el = document.getElementById('order-id').innerHTML;
            let auction = Number.parseInt(el);
          

        },


        FillDictionary(key, value) {
            this.pizza_count[key] = value;

            axios.post('carts', this.pizza_count);
            this.pizza_count = {};
        },

        loadOrders() {
            this.completeorders.forEach(element => {
                this.order.push(element.order_id);
            });
            this.orig_order = Array.from(new Set(this.order));
        },
        deleteOrder(event) {
            let elem = 0;
            this.completeorders.forEach(element => {
                if (element.id == event.target.id) {
                    elem = event.target.id;
                }
            });
            axios.delete('delete-order/' + elem);
            window.location.replace("admin-place");
        }




    }
}
</script>

<style>
.flex-table-content .order-content>div,
.flex-table-header div {
    width: 100%;
    flex-shrink: 3;
    line-height: 40px;
    border-right: 1px solid #eee;
    
}

body * {
    font-family: var(--main-font);
}

/* a,
abbr,
acronym,
address,
applet,
article,
aside,
audio,
b,
big,
blockquote,
body,
canvas,
caption,
center,
cite,
code,
dd,
del,
details,
dfn,
div,
dl,
dt,
em,
embed,
fieldset,
figcaption,
figure,
footer,
form,
h1,
h2,
h3,
h4,
h5,
h6,
header,
hgroup,
html,
i,
iframe,
img,
ins,
kbd,
label,
legend,
li,
mark,
menu,
nav,
object,
ol,
output,
p,
pre,
q,
ruby,
s,
samp,
section,
small,
span,
strike,
strong,
sub,
summary,
sup,

tbody,
td,
tfoot,
th,
thead,
time,
tr,
tt,
u,
ul,
var, */
h1,
h2,
h3,
h4,
h5,
h6,
video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-tap-highlight-color: transparent;
    -webkit-tap-highlight-color: transparent;
}

* {
    outline: 0;
}

user agent stylesheet div {
    display: block;
}

.flex-table-content {
    font-size: 14px;
    color: #000 !important;
    border-left: 1px solid #eee;
    border-right: 1px solid #eee;
}

.bgclass {
    background-image: url("storage/pizzas/i.webp");
}

.wrap {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
}

body {
    font-family: var(--main-font);
    font-style: normal;
    background: #eee;
}

body {
    line-height: 1;
}

:root {
    --max-width: 1540px;
    --main-font: -apple-system, system-ui, BlinkMacSystemFont, "SFPro", "Segoe UI", Roboto, Ubuntu, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    --white: #ffffff;
    --orange: #ff7e00;
    --green: #1ae961;
    --red: #e91a1a;
    --normal-font-weight: 400;
    --semibold-font-weight: 600;
    --box-shadow: 0 1px 24px 0 #00000024;
    --border-radius: 4px;
    --radius-small: 4px;
    --radius-medium: 8px;
    --radius-high: 12px;
    --radius-half: 50%;
}

::selection {
    background: #303030;
    color: #fff;
    border-radius: 4px;
}</style>

