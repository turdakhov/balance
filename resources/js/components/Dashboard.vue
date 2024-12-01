<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue'

const transactions = ref([])
const balance = ref()

const interval = 5000

function updateData() {
    axios.get('/api/last-transactions').then((response) => {
        transactions.value = response.data.data
    })
    axios.get('/api/balance').then((response) => {
        balance.value = response.data
    })
}

onMounted(() => {
    updateData()

    setInterval(() => {
        updateData()
    }, interval)
})
</script>

<template>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 rounded-3 shadow-sm h-100">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Your Balance</h4>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h1 class="card-title pricing-card-title">Your Balance: <small class="text-muted fw-light">
                                    {{ balance }}
                                </small></h1>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h1>Transaction list</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="transaction in transactions">
                                <td>{{ transaction.id }}</td>
                                <td>{{ transaction.amount }}</td>
                                <td>{{ transaction.description }}</td>
                                <td v-if="transaction.is_success" class="text-success sw-bolder">
                                    Successful
                                </td>
                                <td v-else class="text-danger">
                                    Failed
                                </td>
                                <td>{{ transaction.created_at }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
