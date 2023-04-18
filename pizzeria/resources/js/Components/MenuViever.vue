

<template>

  <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen  selection:text-white">
    <div>
      <div class="py-14 ">
          <div class="">
          <div class="">
            <div class="row " >
              <div class="col-12 ">
                <div class="card-deck row ">
                  <div class=" col-12 col-sm-4 col-md-6 col-lg-4" v-for="pizza in this.pizzas" :key="this.pizzas">
                    <div class="card-1 card  " style="max-height: 28rem;  ">
                    

                      <img class="product-image" v-bind:src="'storage/' + pizza.photo_path" alt="Card image cap" style="min-height: 10rem">

                      <h5 class="card-title">{{ pizza.name }}</h5>  
                      <p class="card-text " style="max-height: 4rem; ">{{ pizza.description }}</p>
                      <p class="product-price ">{{ pizza.price }}</p>
                      
                      <button @click="AddToCart(pizza.id, 1)" onclick="false"
                        class="btn btn-outline-danger add-to-cart">
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
</template>




<script>
import { useRemember } from '@inertiajs/vue3';

export default {

  data() {
    return {
      pizzas: [],
      pizza_count: {},
    }
  },
  mounted() {
    this.loadMenu();
  },
  methods: {
    loadMenu() {
      axios.get('pizzas').then(response => this.pizzas = response.data.data);
    },

    AddToCart(key, value) {
      this.pizza_count[key] = value;
      axios.post('carts', this.pizza_count);
      this.pizza_count = {};
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

.cart-btn {
  position: relative;
  display: flex;
  justify-content: flex-end;
}

#cart {
  width: 100%
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
  box-shadow: 0px 13px 10px -7px rgba(0, 0, 0, 0.1);

  background-image: url("storage/pizzas/i.webp"); 
  /* background: linear-gradient(rgb(253, 253, 255), rgb(119, 119, 119)); */
}

.card:hover {
  box-shadow: 0px 30px 18px -8px rgba(0, 0, 0, 0.1);
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


  

</style>
