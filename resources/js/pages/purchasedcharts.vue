<template>
    <div>
        <h3 class="text-center">Purchased Charts</h3><br/>
 
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
                .get('/api/purchasedcharts')
                .then(response => {
                    this.charts = response.data;
                });
            }
        }
    }
</script>