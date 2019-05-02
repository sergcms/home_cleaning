<template>
  <div>
    <div class="alert alert-primary" role="alert" v-if="message">
      {{ message }}
    </div>
    <div v-if="orders.length">
      <div class="row justify-content-between align-items-center mb-3">
        <div class="col-sm-3">
          <select name="orders_per_page" id="orders_per_page" class="form-control" @change="update">
            <option value="10">10</option>
            <option value="20">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="all">all</option>
          </select>
        </div>
        <p class="mb-0">Total orders : <strong class="color-primary">{{ total_orders }}</strong></p>
        <div class="col-sm-3">
          <select name="status" id="status" class="form-control" @change="update">
            <option value="all">All</option>
            <option value="paid">Paid</option>
            <option value="no paid">No paid</option>
            <option value="pending">Pending</option>
            <option value="failed">Failed</option>
          </select>
        </div>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>City</th>
            <th>Square footage</th>
            <th>Total Sum</th>
            <th>Payment</th>
            <th>Date payment</th>
          </tr>
        </thead>
        <tbody>        
          <tr v-for="(order, index) in orders" :key="index">
            <td scope="row">{{ index + 1 }}</td>
            <td>{{ order.id }}</td>
            <td>{{ order.first_name }} {{ order.last_name }}</td>
            <td>{{ order.phone }}</td>
            <td>{{ order.city }}</td>
            <td>{{ order.square_footage }}</td>
            <td>{{ order.total_sum }}</td>
            <td>{{ order.payment }}</td>
            <td>{{ order.date_payment }}</td>
          </tr>
        </tbody>
      </table>
      <!-- pagination -->
      <nav aria-label="Page navigation d-flex" v-if="last_page > 1">
        <ul class="pagination">
          <li class="page-item" v-bind:class="{ 'disabled' : !prev_page_url }">
            <a class="page-link" aria-label="Previous" href="#"
              v-bind:data-page="current_page != 1 ? current_page - 1 : 1" @click="update"
            >
              &laquo;
            </a>
          </li>
          <li v-for="(page, index) in last_page" :key="index" class="page-item" 
            v-bind:class="{ 'active': page == current_page }">
              <a class="page-link" href="#" v-bind:data-page="page" @click="update">
                {{ page }}
              </a>
          </li>
          <li class="page-item" v-bind:class="{ 'disabled' : !next_page_url }">
            <a class="page-link" aria-label="Next" href="#"
              v-bind:data-page="current_page != last_page ? current_page + 1 : current_page" @click="update"
            >
              &raquo;
            </a>
          </li>
        </ul>
      </nav>
      <!-- end pagination -->
    </div>
    <h1 class="text-center" v-else>Sorry, orders not found!</h1>
  </div>
</template>

<script>
  export default {
    data: function() {
      return {
        total_orders: 0,
        time_show_message: 4000,
        message: '',
        current_page: 0,
        last_page: 0,
        prev_page_url: '',
        next_page_url: '',
        count_orders: 10,
        status: '',
        orders: [],
        order: {
          id: 0,
          first_name: '',
          last_name: '',
          phone: '',
          city: '',
          square_footage: 0,
          total_sum: 0,
          payment: '',
          date_payment: '',
        }
      }
    },

    mounted() {
      // get all orders
      axios.get('/dashboard/orders')
        .then(response => {
          this.orders        = response.data.data;
          this.current_page  = response.data.current_page;
          this.last_page     = response.data.last_page;
          this.prev_page_url = response.data.prev_page_url;
          this.next_page_url = response.data.next_page_url;
          this.total_orders  = response.data.total;
        }).catch(error => {
          console.log(error);
        });
      // listen CreateOrderEvent
      Echo.channel('housecleaning_database_create-order')
        .listen('CreateOrderEvent', (data_order) => {
          this.message = 'Added new order №' + data_order.order.id + '!';

          var data = this.getData();

          if (this.current_page != 1) {
            data.page = current_page;
          }

          this.sendData(data);

          var self = this;
          setTimeout(function(){
            self.message = '';
          }, this.time_show_message);
        });
      // listen UpdateOrderEvent
      Echo.channel('housecleaning_database_update-order')
        .listen('UpdateOrderEvent', (data_order) => {
          this.message = 'Change order № ' + data_order.order.id + '!';

          console.log(data_order);

          var data = this.getData();

          data.page = this.current_page;

          this.sendData(data);

          // var index = this.orders.findIndex(function (order) {
          //   return order.id == data_order.order.id; 
          // });
          // change 
          // this.orders[index] = data_order.order;

          var self = this;
          setTimeout(function(){
            self.message = '';
          }, this.time_show_message);
        });
    },

    methods: {
      // update data
      update(e) {
        e.preventDefault();

        var data = this.getData();
        
        if ($(e.target).attr('data-page')) {
          data.page = $(e.target).attr('data-page');
        }

        this.sendData(data);
      },
      // get data from page
      getData() {
        var data = {
          'orders_per_page': $('#orders_per_page').val(),
          'status': $('#status').val(),
        }

        return data;
      },
      // send data
      sendData(data) {
        axios.post('/dashboard/orders', data)
          .then((response) => {
            this.orders        = response.data.data;
            this.current_page  = response.data.current_page;
            this.last_page     = response.data.last_page;
            this.prev_page_url = response.data.prev_page_url;
            this.next_page_url = response.data.next_page_url;
            this.total_orders  = response.data.total;
          })
          .catch((error) => { 
            console.log(error); 
          });
      } 
    },
  };
</script>
