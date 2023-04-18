<script setup>
import { Head, Link } from '@inertiajs/vue3';
// import { init } from 'vendor/tcg/voyager/publishable/assets/js/ace/libs/ext-keybinding_menu';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});


</script>

<template>
    <header class="p-3 bg-dark text-white sticky-top ">
        <div class="container ">
            <div class="d-flex flex-wrap align-items-center justify-content-center ">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

              
                <p class="text-center text-warning h3">LOTUS</p>

                   
                <div class="text-end ">
                
                    <div v-if="canLogin" class="sm:fixed sm:top-4 sm:right-6 ">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class=" font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Dashboard</Link>

                        <template v-else>

                            <div class="cart-btn d-flex justify-content-between ">
                                <i id="cart" class="fas fa-shopping-cart">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="30" fill="currentColor"
                                        class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </i>





                                <Link :href="route('login')"
                                    class=" text-white btn btn-outline-secondary  ml-4  font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Login</Link>


                                <Link v-if="canRegister" :href="route('register')"
                                    class=" text-white btn btn-outline-info   ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                SignUp</Link>

                            </div>

                        </template>



                    </div>
                </div>
            </div>
        </div>
    </header>

   

<header>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('storage/pizzas/h5.jpg')">
        <div class="carousel-caption">
          
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('storage/pizzas/h2.jpg')">
        <div class="carousel-caption">
         
        </div>
      </div>
      <div class="carousel-item" style="background-image: url('storage/pizzas/h3.jpg')">
        <div class="carousel-caption">
        
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>

<section class="py-5 " style="background-color:khaki;">
  <div class="container">
    <h1 class="fw-light h1">LOTUS </h1>
    <p class="lead" >Вкусная пицца с бесплатной доставкой!</p>
  </div>
</section>
   
    <Head title="Welcome" />
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen  selection:bg-red-500 selection:text-white classbg">



        <div>
            <div class="py-14">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="cart-modal-overlay">
                                    <div class="cart-modal">
                                        <i id="close-btn" class="fas fa-times"></i>
                                        <h1 class="cart-is-empty">Cart is empty</h1>

                                        <div class="product-rows">
                                        </div>
                                        <div class="total">
                                            <h1 class="cart-total">ВСЕГО</h1>
                                            <span class="total-price">{{ this.total }}</span>

                                            <div class="form-group">
                                                <label for="inputEmail4" class="text-white">Особые пожелания</label>
                                                <input id="inputEmail4" type="email" class="form-control total-queries"
                                                    placeholder="Особые пожелания" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4" class="text-white">Имя</label>
                                                <input id="inputEmail4" type="email" class="form-control total-name"
                                                    placeholder="Имя" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4" class="text-white">Почта</label>
                                                <input id="inputEmail4" type="email" class="form-control total-email"
                                                    placeholder="Email" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4" class="text-white">Номер телефона</label>
                                                <input id="inputEmail4" type="email" class="form-control total-phone"
                                                    placeholder="Номер телефона" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail4" class="text-white">Адрес</label>
                                                <input id="inputEmail4" type="email" class="form-control total-adres"
                                                    placeholder="Город, улица, номер дома, номер квартиры" />
                                            </div>

                                            <button @click="showModal()" class="purchase-btn" >СДЕЛАТЬ ЗАКАЗ</button>
                                    

                                        </div>
                                    </div>
                                </div>

                           



                                <div class="card-deck row ">

                                    
                                    <div class="col-12 col-sm-4 col-md-6 col-lg-4" v-for="pizza in pizzas">
                                        <div class="card-1 card " style="max-height: 28rem;">

                                            <img class="product-image" v-bind:src="'storage/' + pizza.photo_path"
                                                alt="Card image cap" style="min-height: 10rem">

                                            <h5 class="product-name "> <b>{{ pizza.name }}</b></h5>
                                            <p class="card-text " style="max-height: 4rem;">{{ pizza.description }}</p>
                                            <p class="product-price ">{{ pizza.price }}</p>

                                            <button class="btn btn-outline-danger add-to-cart" @click="addToCartFunc()">
                                                Добавить в корзину
                                            </button>

                                        </div>
                                    </div>





                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </div>

   
   <div class="bg-dark">
<div class="container ">

<footer class="text-white text-center text-lg-start bg-success">

<div class="container p-4">
  <div class="row mt-4">
    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
      <h5 class="text-uppercase mb-4">О нас</h5>

      <p>
        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
        voluptatum deleniti atque corrupti.
      </p>

      <p>
        Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
        molestias.
      </p>

      
    </div>
 
    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
      <h5 class="text-uppercase mb-4 pb-1">Контактная информация</h5>

      <ul class="fa-ul" style="margin-left: 1.65em;">
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Донецк, ДНР</span>
        </li>
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">pizza@mail.com</span>
        </li>
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 7(949) 234 567 88</span>
        </li>
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-print"></i></span><span class="ms-2">+ 7(949) 234 567 89</span>
        </li>
      </ul>
    </div>

    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
      <h5 class="text-uppercase mb-4">Мы открыты</h5>

      <table class="table text-center text-white">
        <tbody class="font-weight-normal">
          <tr>
            <td>Пн - Вт:</td>
            <td>8 - 21</td>
          </tr>
          <tr>
            <td>Пт - Сб:</td>
            <td>8 - 19</td>
          </tr>
          <tr>
            <td>Вс:</td>
            <td>9 - 16  </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>



<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2023 
</div>

</footer>
</div>
</div>

</template>


<script>
//import ModalComponent from '@/Components/ModalComponent.vue';
import { mapToStyles } from '@popperjs/core/lib/modifiers/computeStyles';
import axios from 'axios';
export default {

    data() {
        return {
            cart: '',
            cartModalOverlay: '',
            button: 0,
            productRow: '',
            productRows: '',
            cartRowItems: '',
            btnClicked: '',
            cartImage: '',
            imageSrc: '',
            pizzas: [],
            TOTAL: 0,
            obj: {},
            dict: {}

        }
    },
    components: {
      
    },
    mounted() {
        this.cartClick();
        this.closeClick();
        this.addToCartFunc();
        this.removeBtnClickM();
        this.purchaseMethod();
       
        this.loadMenu();

    },
    methods: {
        loadMenu() {
            axios.get('pizzas').then(response => this.pizzas = response.data.data);
        },
        showModal() {

        },
        temp() {


        },
        cartClick() {
            this.cart = document.querySelector('#cart');
            this.cartModalOverlay = document.querySelector('.cart-modal-overlay');

            this.cart.addEventListener('click', () => {
                if (this.cartModalOverlay.style.transform === 'translateX(-200%)') {
                    this.cartModalOverlay.style.transform = 'translateX(0)';
                } else {
                    this.cartModalOverlay.style.transform = 'translateX(-200%)';
                }
            })
        },
        closeClick() {
            const closeBtn = document.querySelector('#close-btn');

            closeBtn.addEventListener('click', () => {
                this.cartModalOverlay.style.transform = 'translateX(-200%)';
            });

            this.cartModalOverlay.addEventListener('click', (e) => {
                if (e.target.classList.contains('cart-modal-overlay')) {
                    this.cartModalOverlay.style.transform = 'translateX(-200%)'
                }
            })
        },
        addToCartFunc() {
            const addToCart = document.getElementsByClassName('add-to-cart');

            this.productRow = document.getElementsByClassName('product-row');
          
            for (var i = 0; i < addToCart.length; i++) {
                this.button = addToCart[i];
                this.button.addEventListener('click', this.addToCartClicked)
            }
        },

        addToCartClicked(event) {

            this.button = event.target;
            var cartItem = this.button.parentElement;
            var price = cartItem.getElementsByClassName('product-price')[0].innerText;
            var name = cartItem.getElementsByClassName('product-name')[0].innerText;
           
            this.imageSrc = cartItem.getElementsByClassName('product-image')[0].src;
            this.addItemToCart(price, this.imageSrc, name);
            this.updateCartPrice()
        },
        addItemToCart(price, imageSrc, name) {

            var productRow = document.createElement('div');
            productRow.classList.add('product-row');
            this.productRows = document.getElementsByClassName('product-rows')[0];
            this.cartImage = document.getElementsByClassName('cart-image');

            for (var i = 0; i < this.cartImage.length; i++) {
                if (this.cartImage[i].src == imageSrc) {
                    alert('This item has already been added to the cart')
                    return;
                }
            }


            this.cartRowItems = `
  <div class="product-row">
        <img class="cart-image" src="${imageSrc}" alt="">
        <span class ="cart-name text-white p-3">${name}</span>
        <span class ="cart-price">${price}</span>
        <input @click=sixth() class="product-quantity" type="number" value="1">
        <button class="remove-btn">Удалить</button>
        </div>
        
      `

            productRow.innerHTML = this.cartRowItems;
            this.productRows.append(productRow);
            productRow.getElementsByClassName('remove-btn')[0].addEventListener('click', this.removeItem)
            productRow.getElementsByClassName('product-quantity')[0].addEventListener('change', this.changeQuantity)
            this.updateCartPrice()
        },
        removeBtnClickM() {
            const removeBtn = document.getElementsByClassName('remove-btn');
            for (var i = 0; i < removeBtn.length; i++) {
                this.button = this.removeBtn[i]
                this.button.addEventListener('click', this.removeItem)
            }
        },
        removeItem(event) {
            this.btnClicked = event.target
            this.btnClicked.parentElement.parentElement.remove()
            this.updateCartPrice()
        },
        sixth() {
            var quantityInput = document.getElementsByClassName('product-quantity')[0];

            for (var i = 0; i < quantityInput; i++) {
                input = quantityInput[i]
                input.addEventListener('change', changeQuantity)
            }

        },
        changeQuantity(event) {
            var input = event.target
            if (isNaN(input.value) || input.value <= 0) {
                input.value = 1
            }
            this.updateCartPrice()
        },
        updateCartPrice() {
            this.total = 0
          

            for (var i = 0; i < this.productRow.length; i += 2) {
                this.cartRow = this.productRow[i]
                var priceElement = this.cartRow.getElementsByClassName('cart-price')[0]
                var quantityElement = this.cartRow.getElementsByClassName('product-quantity')[0]
                var price = parseFloat(priceElement.innerText.replace('$', ''))
                var quantity = quantityElement.value
                this.total = this.total + (price * quantity)

            }
            document.getElementsByClassName('total-price')[0].innerText = this.total

           // document.getElementsByClassName('cart-quantity')[0].textContent = i /= 2
        },
        purchaseMethod() {
            const purchaseBtn = document.querySelector('.purchase-btn');

            const closeCartModal = document.querySelector('.cart-modal');

            purchaseBtn.addEventListener('click', this.purchaseBtnClicked)
        },


        
        purchaseBtnClicked() {

            this.obj = new Map()
            if( document.getElementsByClassName('cart-price').length === 0){
                alert('Корзина пуста');
            }
            else if(document.getElementsByClassName('total-name')[0].value == "" ||
            document.getElementsByClassName('total-email')[0].value == "" ||
            document.getElementsByClassName('total-phone')[0].value == "" ||
            document.getElementsByClassName('total-adres')[0].value == "" ){
                alert('Не все поля заполнены!');
            }
            else{
            for (var i = 0; i < document.getElementsByClassName('cart-price').length; i++) {
                this.obj.i = new Array()
                this.obj.set(i, [document.getElementsByClassName('cart-name')[i].innerHTML,
                document.getElementsByClassName('cart-price')[i].innerHTML,
                document.getElementsByClassName('product-quantity')[i].value,

                document.getElementsByClassName('total-queries')[0].value,
                document.getElementsByClassName('total-name')[0].value,
                document.getElementsByClassName('total-email')[0].value,
                document.getElementsByClassName('total-phone')[0].value,
                document.getElementsByClassName('total-adres')[0].value,
                document.getElementsByClassName('total-price')[0].innerHTML,
                ])
            }

            var i = 0;
            this.obj.forEach(element => {
                this.dict[i] = element;
                i += 1;
            });
           

            axios.post('send-email-to-client', this.dict).then( (response)=>{
                axios.post('send-email-to-admin', this.dict);
                });; 
            

           
            this.cartModalOverlay.style.transform = 'translateX(-100%)'
            var cartItems = document.getElementsByClassName('product-rows')[0]
            while (cartItems.hasChildNodes()) {
                cartItems.removeChild(cartItems.firstChild)

            }
            this.updateCartPrice()
        }
        },

    }
}



</script>


<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}


* {
    margin: 0;
    padding: 0;
}

img {
    max-width: 100%;
    display: block;
}
.classbg{
    background-image: url("storage/pizzas/p.jpg"); 
 
}
.cart-btn {
    position: relative;
    display: flex;
    justify-content: flex-end;
}

#cart {
    width: 100%
}
.title-welcome{
    font-family: 'great vibes';
  font-size: 5em;
  padding: 0;
  color: #24662A;
  text-align: center;
}
.cart-quantity {
    color: white;
    background-color: red;
    padding: .2em .3em;
    position: absolute;
    margin: .8em 7.5em 0 0;
    right: 0;
    border: solid 2px red;
    border-radius: 15px;
    font-weight: bolder;
}

.items-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    margin-top: 1em
}

.card {
    /*   width: 15rem; */
    margin: 1em;
    position: relative;
    overflow: hidden;
    text-align: center;

  transition: all .4s cubic-bezier(0.175, 0.885, 0, 1);
  
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0px 13px 10px -7px rgba(0, 0, 0,0.1);

  background-image: url("storage/pizzas/i.webp"); 
 
  /* background: linear-gradient(rgb(253, 253, 255), rgb(248, 248, 248)); */

}
.card:hover {
  box-shadow: 0px 30px 18px -8px rgba(0, 0, 0,0.1);
    transform: scale(1.10, 1.10);
}
.card:hover .add-to-cart {
    transform: translateX(0);
       
}

.product-image {
    margin-bottom: 1em;
    width: 100%;
    height: 15vw;
    object-fit: cover;
}

.add-to-cart {
    right: 0;
    top: 90%;
    padding: .5em 1em;
    transform: translateY(100px);
    transition: .2s ease;

    cursor: pointer;
    font-weight: bolder;
    font-size: 1.2rem
}

.product-price {
    padding-top: 1em;
    font-weight: bold;
    font-size: 1.5rem;
}

.cart-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    z-index: 2;
    transform: translateX(-200%);
    transition: .5s ease-out;

}

.cart-modal {
    height: 100vh;
    width: 50%;
    background-color: rgb(50, 50, 50);
    float: right;
    overflow: scroll;
    overflow-x: hidden;
}

#close-btn {
    font-size: 1.5rem;
    float: right;
    margin: .5em 2em 0 0;
    color: white;
    cursor: pointer;
}

.cart-is-empty {
    color: white;
    text-align: center;
    font-size: 1.5rem;
    margin-bottom: 1em;
    display: none;

}

.total {
    text-align: center;
    margin: 2em 0 2em 0;
    /*   display: none; */
}

.cart-total {
    color: white;
}

.total-price {
    color: white;
    font-size: 2rem;
    display: block;
}

.purchase-btn {
    font-size: 1rem;
    font-weight: bolder;
    background-color: green;
    color: white;
    padding: 1em 2em;
    border-radius: 10px;
    outline: none;
    border: none;
    cursor: pointer;
    margin: 2em 0 1em 0;
}

.product-rows {
    margin-top: 3em;
    width: 95%;
    margin-left: auto;
    margin-right: auto;

}

.product-row {
    display: flex;
    align-items: center;
}

.cart-image {
    width: 10rem;
    margin: 1em;
}

.cart-price {
    color: white;
    font-size: 1.5rem;
    font-weight: bolder;
}

.product-quantity {
    width: 4rem;
    font-size: 2rem;
    margin-left: 3rem;
}

.remove-btn {
    padding: 1em 2em;
    background-color: red;
    color: white;
    outline: none;
    border: none;
    cursor: pointer;
    margin-left: 3rem;
    font-weight: bolder;
    font-size: 1rem;
}

.remove-btn:active {
    transform: translateY(5px);
}

@media (max-width: 1000px) {
    .cart-modal {
        width: 100vw;
    }

    .product-row {
        flex-direction: column;
        text-align: center;
        margin-bottom: 2em;
    }

    .remove-btn {
        margin: 0
    }

    .product-quantity {
        margin: .5em 0 .5em 0
    }
}
/* Footer */

/* silder */


.carousel-item {
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}



</style>
