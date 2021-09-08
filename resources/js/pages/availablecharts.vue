<template>
    <div>
        <h3 class="text-center">Available Charts</h3><br/>
 
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="chart in charts" :key="chart.chart_product_id">
                <td>{{ chart.chart_product_id }}</td>
                <td>{{ chart.name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" @click="addToCart(chart.chart_product_id)">Add to Cart</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                charts: []
            }
        },
        created() {
            this.refresh();
        },
        methods: {
            refresh(){
                axios
                .get('/api/availablecharts')
                .then(response => {
                    this.charts = response.data;
                });
            },
            addToCart(id) {
                axios
                    .post(`/api/shoppingcartitem/add/${id}`)
                    .then(response => {
                        this.refresh();
                    });
            }
        }
    }
</script>