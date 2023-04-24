


<template>
    <section id="content-tab1">
        <div>
            <div class="flex-table flex flex-column">
                <div class="flex-table-header flex " style="background-color: aliceblue;">
                    <div>Содержимое заказа</div>
                    <div>Сумма, руб</div>
                    <div>Дата</div>
                    <!-- <div>Способ оплаты</div> -->
                </div>

                <!-- <button @click="loadOrders()" class="btn btn-primary">Посмотреть заказы</button> -->

                <div class="flex-table-content flex flex-column bgclass border border-secondary" v-for=" (pizza, i) in this.orig_order">



                    <div class="order-content flex ">
                        <div class="border-right border-secondary">
                            <div class="cart-header relative short " style="margin-left: 20px; max-width: 70%">
                             
                            </div>

                            <div>

                            </div>

                            <div class="d-flex justify-content-center " v-for=" (p, j) in this.completeorders">
                                <div v-if="this.orig_order[i] === p.completeorder_id" class="row align-items-start">
                                <p class="col" > <img v-bind:src="'storage/' + p.photo_path" class="img-fluid img-thumbnail" style="max-width:50%;"> </p>
                                   <p class="col"> {{ this.completeorders[j].name }}</p>
                            </div>



                            </div>
                        </div>
                        <div class="border-right border-secondary">

                          
                          <P class="d-none">{{ this.sum[i]=0 }}</P> 
                            <div class="flex order-cost-item " v-for=" (p, j) in this.completeorders " >
                                <p v-if="this.orig_order[i] === p.completeorder_id" >
                                    
                                    {{ this.completeorders[j].price }}
                                    ×
                                    {{ this.completeorders[j].count }} =
                                    {{  this.completeorders[j].price * this.completeorders[j].count }}

                               <p class="d-none">   {{ this.sum[i] +=  this.completeorders[j].price * this.completeorders[j].count }}</p>  
                                </p>
                                <!-- <p v-else class="d-none" >{{ this.sum }}</p> -->
                               
                                
                            </div>
                            <div class="main-order-info">Итого:
                                {{ this.sum[i] }}
                            </div>
                            

                        </div>
                        <div>

                            <div class="main-order-info ">{{ this.completeorders[i].created_at }}</div>
                        </div>
                        
                    </div>
                  
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
                </div>
            </div>

        </div>
    </section>
</template>

<script>
import { useRemember } from '@inertiajs/vue3';
// import { displayAlert } from 'vendor/tcg/voyager/resources/assets/js/helpers';
// import { RHighlightRules } from 'vendor/tcg/voyager/publishable/assets/js/ace/libs/mode-r';

export default {

    data() {
        return {
            completeorders: [],
            order: [],
            orig_order: [],
            proba: {},
            count_order: [],
            pizza_count: {},
            count: [],
            order_id: '',
            diction: {},
            ids: [],
            number: 0,
            viewpizza: [],
            sum:[],
            flag:1,
        }
    },
    mounted() {
        this.loadPizzas();
        this.loadOrders();
    },
    methods: {
        loadPizzas() {
            axios.get('completeorders').then((response) =>{
                this.completeorders = response.data;
                this.loadOrders();
                this.sum.length=this.orig_order.length;
               
            }); 
        },
        loadOrders() {
            this.completeorders.forEach(element => {
                this.order.push(element.completeorder_id);
                
            });
            this.orig_order = Array.from(new Set(this.order));
            this.viewpizza = this.completeorders.slice(0, 10);
        },


        getCount() {
            let el = document.getElementById('order-id').innerHTML;
            let auction = Number.parseInt(el);
            console.log(auction);
        },


        FillDictionary(key, value) {
            this.pizza_count[key] = value;

            axios.post('carts', this.pizza_count);
            this.pizza_count = {};
        },


        ondel(event) {
            let elem = 0;
            this.completeorders.forEach(element => {
                if (element.order_id == event.target.id) {
                    elem = event.target.id;
                }
            });
            axios.delete('delete-order/' + elem);
          
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
.bgclass{
    background-image: url("storage/pizzas/i.webp"); 
}
a,
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
table,
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
var,
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
}
</style>

