<template>
    <div>
        <button class="btn btn-primary btn-small" @click="addNewDelievery()"> Add Delivery </button>
        <div class="row">

            <div class="col-lg-12" v-for="delievery in deliveries" :key="delievery.id">
                <div class="card" style="min-height: 500px;">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">

                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label for="service_id"> Service </label>
                                            <select autocomplete="off" type="text" id="service_id" v-model="delievery.service_id" parsley-trigger="change"  class="form-control">

                                                <option v-for="service in services" :key="service.id" 
                                                    :value="service.id"
                                                >
                                                    {{ service.name }}
                                                </option>

                                            </select>

                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                        </div>

                                    </div>

                                        <div class="form-group col-md-3">
                                            <label for="booking_date">Booking Date</label>
                                            <input autocomplete="off" type="date" id="booking_date" v-model="delievery.booking_date" parsley-trigger="change"  placeholder="Enter Booking Date"  class="form-control">

                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                        </div>

                                    </div>

                            </div>
                        </div>


                    </div>

                </div>
                <!-- end card -->
            </div>

        </div>

        <div class="row mt-5">
            <div class="form-group btns-div col-12">
                    <a href="/admin/deliveries" class="btn btn-md btn-light mr-5"> Cancel </a>
                <button 
                    type="button" 
                    class="btn btn-md btn-primary" 
                    @click="submitDeliveries()"
                >
                     Save 
                </button>
            </div>
        </div>

    </div>

</template>

<script>
import { uuid } from 'vue-uuid' // Import uuid  


export default {
    props: ['services'],
    data: () => ({
        deliveries: [],
        delivery_obj: {
            branch_id: "",
            service_id: "",
            cities: [],
            reciever_city: "",
            reciever: "",
            weight: "",
            reciever_phone: "",
            booking_date: new Date().toISOString().slice(0, 10),
            destination: "",
        },
        delivery_service_map:[],
    }),
    created(){
        this.addNewDelievery()
    },
    methods:{
        submitDeliveries()
        {
            axios.post(`${process.env.MIX_BASE_URL}/admin/deliveries`, this.deliveries)
            .then( ({ data }) => {
                console.log( data.message )
            })
            .catch( error => {
                console.log(error)
            } )

        },
        addNewDelievery()
        {
            const vm = this;
            let delievery = {
                ...this.delivery_obj,
                'id': uuid.v1(),
                'service_id' : vm.services[0].id,
            };
            delievery.reciever_city = delievery.cities[0].city_slug;
            
            this.deliveries.push( delievery );
            const delivery_service_map = {
                id: delievery.id,
                service_id: delievery.service_id
            };
            this.delivery_service_map.push( delivery_service_map )
        }
    },
    watch: {
        deliveries:
        {
            handler: function( newVal )
            { 
                const vm = this;
                
            },
            deep: true,
            
        }
    },
    
}
</script>