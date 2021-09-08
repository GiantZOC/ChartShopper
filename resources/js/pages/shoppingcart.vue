<template>
    <div>
        <h3 class="text-center">Shopping Cart</h3><br/>
        
        <div v-if="shoppingCart[0]">
            <table  class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in shoppingCart[0].shopping_cart_item" :key="item.id">
                    <td>{{ item.chart_product.id }}</td>
                    <td>{{ item.chart_product.name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button class="btn btn-danger" @click="removeFromCart(item.id)">Remove</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-primary" @click="purchaseCart(shoppingCart[0].id)">Purchase</button>
        </div>
        <template v-else>
            <h2>Shopping Cart is Empty!</h2>
        </template>
    </div>
</template>
 
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                shoppingCart: null
            }
        },
        created() {
            this.refresh();
        },
        methods: {
            refresh(){
                axios
                .get('/api/shoppingcart')
                .then(response => {
                    this.shoppingCart = response.data;
                });
            },
            removeFromCart(id) {
                axios
                    .post(`/api/shoppingcartitem/delete/${id}`)
                    .then(response => {
                        this.refresh();
                    });
            },
            purchaseCart(id) {
                this.shoppingCart[0].is_purchased = true;
                axios
                    .post(`/api/shoppingcart/update/${id}`, this.shoppingCart[0])
                    .then(response => {
                        this.refresh();
                    });
            }
        }
    }
</script>