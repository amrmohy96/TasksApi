<template>
    <div class="container">
        <div v-show="!user">
            <br /><br />
            <form  @submit.prevent="login">
                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email"
                               required autocomplete="email" autofocus v-model="loginData.email">
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control"
                               name="password" required autocomplete="current-password" v-model="loginData.password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div  v-show="user" class="row mt-5">
            <div class="col-lg-3">
                <h1 class="my-2">shop</h1>
                <div class="list-group">
                    <a class="list-group-item" href="" v-for="category in categories">{{category.name}}</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mt-5">
                    <div class="col-lg-4 col-md-6 mb-4" v-for="product in products.data">
                        <div class="card h-100">
                            <a href="">
                                <img class="card-img-top" src="https://via.placeholder.com/150">
                            </a>
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="">{{product.name}}</a>
                                    <span class="badge badge-info text-white">{{product.category.name}}</span>
                                </div>
                                <h5>${{product.price}}</h5>
                                <p>{{product.description}}</p>
                            </div>
                        </div>
                    </div>
                    <pagination :data="products" @pagination-change-page="getProducts"></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                products: [],
                loading: true,
                user:false,
                loginData:{
                    email:'',
                    password:''
                }
            }
        },
        created() {
            this.getCategories();
            this.getProducts();
        },
        methods: {
            getCategories() {
                axios.get('/api/categories')
                    .then(res => {
                        this.categories = res.data.data;
                        this.user = true;
                    });
            },
            getProducts(page = 1) {
                axios.get('/api/products?page=' + page)
                    .then(res => {
                        this.products = res.data;
                        this.loading = false;
                    });
            },
            login(){
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', this.loginData).then(response => {
                        this.user = true;
                        this.getCategories();
                        this.getProducts();
                    }).catch(error => console.log(error)); // credentials didn't match
                });
            }
        }
    }
</script>

<style scoped>

</style>
