<template>
    <div>

        <vue-loader
        v-if="this.loading"
        />

        <div class="row">

            <div class="col-lg-12" v-for="delivery in $v.deliveries.$each.$iter" :key="delivery.id">
                <div class="card" style="min-height: 500px;">
                    <div class="card-body">

                    <div class="row" v-if="alert.active">
                        <div class="offset-3 col-6">
                            <div :class="`alert alert-${alert.type} alert-dismissible fade show`" role="alert">
                                    {{alert.message }}
                                <button type="button" class="close" @click="closeAlert()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-12">

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="branch_id"> Branch </label>
                                            <select 
                                                autocomplete="off" 
                                                type="text" 
                                                id="branch_id" 
                                                v-model="delivery.$model.branch_id" 
                                                parsley-trigger="change"
                                                :class="`form-control ${!delivery.branch_id.required ? 'is-invalid' : ''}`"
                                            >
                                                <option v-for="branch in branches" :key="branch.id"
                                                        :value="branch.id"
                                                >
                                                        {{ branch.name }}
                                                </option>
                                            </select>

                                            <span class="invalid-feedback" role="alert" v-if="!delivery.branch_id.required">
                                                <strong>Branch is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="service_id"> Service </label>
                                            <select autocomplete="off" 
                                                type="text" 
                                                id="service_id" 
                                                v-model="delivery.$model.service_id" 
                                                parsley-trigger="change"  
                                                :class="`form-control ${!delivery.service_id.required ? 'is-invalid' : ''}`"
                                                @change="updateService( delivery.$model )"
                                            >

                                                <option v-for="service in services" :key="service.id" 
                                                    :value="service.id"
                                                >
                                                    {{ service.name }}
                                                </option>

                                            </select>

                                            <span class="invalid-feedback" role="alert" v-if="!delivery.service_id.required">
                                                <strong>Service is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="payment_method">Payment Method</label>
                                            <select autocomplete="off" 
                                                type="text" 
                                                id="payment_method" 
                                                v-model="delivery.$model.payment_method" 
                                                parsley-trigger="change"  
                                                :class="`form-control ${!delivery.payment_method.required ? 'is-invalid' : ''}`"
                                                @change="updatePaymentMethod( delivery.$model )"
                                            >
                                                <option v-for="payment_method in payment_methods" :key="payment_method"
                                                    :value="payment_method"  
                                                >
                                                    {{ payment_method }}
                                                </option>
                                            </select>

                                            <span class="invalid-feedback" role="alert" v-if="!delivery.payment_method.required">
                                                <strong>Payment Method is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="reciever_city">Reciever City</label>
                                            <select 
                                                autocomplete="off" 
                                                type="text" 
                                                id="reciever_city" 
                                                v-model="delivery.$model.reciever_city" 
                                                parsley-trigger="change"  
                                                :class="`form-control ${!delivery.reciever_city.required ? 'is-invalid' : ''}`"
                                                @change="updateDeliveryCharges( delivery.$model )"
                                            >
                                                    <option v-for="city in delivery.$model.cities" :key="city.service_area_id"
                                                        :value="city.city"  
                                                    >
                                                        {{ city.city }}
                                                    </option>
                                            </select>

                                            <span class="invalid-feedback" role="alert" v-if="!delivery.reciever_city.required">
                                                <strong>Reciever City is required</strong>
                                            </span>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="weight">Weight</label>
                                            <input 
                                                autocomplete="off" 
                                                type="number" 
                                                id="weight" 
                                                v-model="delivery.$model.weight" 
                                                parsley-trigger="change"  
                                                placeholder="Enter weight"
                                                :class="`form-control ${!delivery.weight.required ? 'is-invalid' : 'is-valid'}`"
                                                @input="updateDeliveryCharges( delivery.$model )"
                                            >
                                            <span class="invalid-feedback" role="alert" v-if="!delivery.weight.required">
                                                <strong>Weight is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="reciever_phone">Reciever Phone</label>
                                            <input 
                                                autocomplete="off" 
                                                type="text" 
                                                id="reciever_phone" 
                                                v-model="delivery.$model.reciever_phone" 
                                                parsley-trigger="change"  
                                                placeholder="Enter  Reciever Phone Number"
                                                :class="`form-control ${!delivery.reciever_phone.required ? 'is-invalid' : 'is-valid'}`"
                                            >
                                            <span class="invalid-feedback" role="alert" v-if="!delivery.reciever_phone.required">
                                                <strong>Reciever Phone Number is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="reciever">Reciever Name<span class="text-danger">*</span></label>
                                            <input 
                                                autocomplete="off" 
                                                type="text" 
                                                id="reciever" 
                                                v-model="delivery.$model.reciever"  
                                                parsley-trigger="change"  
                                                placeholder="Enter Reciever Name"
                                                :class="`form-control ${!delivery.reciever.required ? 'is-invalid' : 'is-valid'}`"
                                            >

                                            <span class="invalid-feedback" role="alert" v-if="!delivery.reciever.required">
                                                <strong>Reciever Name is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="booking_date">Booking Date</label>
                                            <input 
                                                autocomplete="off" 
                                                type="date" 
                                                id="booking_date" 
                                                v-model="delivery.$model.booking_date" 
                                                parsley-trigger="change"  
                                                placeholder="Enter Booking Date"  
                                                :class="`form-control ${!delivery.booking_date.required ? 'is-invalid' : ''}`"
                                            >

                                            <span class="invalid-feedback" role="alert" v-if="!delivery.booking_date.required">
                                                <strong>Booking Date is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="delivery.delivery_charges"> Delivery Charges </label>
                                            <input autocomplete="off" type="number" id="delivery.delivery_charges" 
                                                v-model="delivery.$model.delivery_charges" 
                                                parsley-trigger="change"  
                                                class="form-control"
                                                readonly
                                            >
                                        </div>

                                        <div class="form-group col-md-3"
                                            v-if="delivery.$model.payment_method === 'COD'"
                                        >
                                            <label for="delivery.cod_amount"> COD Amount </label>
                                            <input autocomplete="off" type="number" id="delivery.cod_amount" 
                                                v-model="delivery.$model.cod_amount" 
                                                parsley-trigger="change"  
                                                class="form-control"
                                                @input="updateTotalCharges( delivery.$model )"
                                            >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="delivery.total_charges"> Total Charges </label>
                                            <input autocomplete="off" type="number" id="delivery.total_charges" 
                                                v-model="delivery.$model.total_charges" 
                                                parsley-trigger="change"  
                                                class="form-control"
                                                readonly
                                            >
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="destination"> Destination </label>
                                            <textarea 
                                                type="text" 
                                                rows="3" 
                                                id="destination" 
                                                v-model="delivery.$model.destination" 
                                                parsley-trigger="change"
                                                placeholder="Enter company destination" 
                                                :class="`form-control ${!delivery.destination.required ? 'is-invalid' : 'is-valid'}`"
                                            >
                                            </textarea>
                                            <span class="invalid-feedback" role="alert" v-if="!delivery.destination.required">
                                                <strong>Destination is required</strong>
                                            </span>
                                        </div>
                                    </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button 
                                class="btn btn-sm btn-danger float-right"
                                title="remove this delivery" 
                                @click="removeDelivery( delivery )"
                                > 
                                    <i 
                                        class="fa fa-trash" 
                                        aria-hidden="true" 
                                        >
                                    </i>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end card -->
            </div>

        </div>

        <div class="row mt-5 bottom-buttons-div">
            <div class="col-md-4">
                <a 
                :href="`${ user.roles[0].type != 'user' ? '/admin/deliveries' : '/client/deliveries' }`" 
                class="btn btn-md form-control btn-warning"
                > 
                    Cancel 
                </a>
            </div>
            <div class="col-md-4">
                <button 
                    type="button" 
                    class="btn btn-md form-control btn-success" 
                    @click="submitDeliveries()"
                    title="click to save deliveries"
                >
                     Book Delieveries 
                </button>
            </div>
            <div class="col-md-4">
                <button 
                    class="btn btn-primary btn-md form-control" 
                    @click="addNewDelivery()"
                    title="click to add another delivery in current form"
                    > 
                        Add another Delivery in form
                </button>
            </div>

        </div>

    </div>

</template>

<script>
import { uuid } from 'vue-uuid' // Import uuid  
import { required, minLength } from 'vuelidate/lib/validators'

export default {
    props: ['service_cities', 'services', 'branches', 'user'],
    data: () => ({
        loading: false,
        alert: {
            type: "success",
            message: "",
            active: false,
        },
        deliveries: [],
        delivery_obj: {
            branch_id: "",
            service_id: "",
            reciever_city: "",
            reciever: "",
            weight: "",
            reciever_phone: "",
            destination: "",
            payment_method: "",
            delivery_charges: '',
            cod_amount: '',
            total_charges: '',
            booking_date: new Date().toISOString().slice(0, 10),
            cities: [],
        },
        payment_methods: [
                'COD',
                'General',
            ],
        charges_per_weight: [],
        additional_charges: [],
    }),
    created(){
        this.addNewDelivery()
    },
    methods:{
        submitDeliveries()
        {   const vm = this;
            vm.$v.$touch()
            if ( !vm.$v.$invalid) {
                vm.loading = true;

                const url = `${process.env.MIX_BASE_URL}/${ vm.user.roles[0].type != 'user' ? 'admin/': 'client/' }deliveries`;
                axios.post(url, this.deliveries)
                .then( ({ data }) => {
                    vm.loading = false;
                    vm.alert.active =true;
                    vm.alert.type = "success";
                    vm.alert.message = data.message ;
                    vm.deliveries = [];
                    vm.addNewDelivery();
                })
                .catch( error => {
                    vm.loading = false;
                    this.alert.active =true;
                    this.alert.type = "danger";
                    this.alert.message =error;
                    console.log(`error: ${error}`)
                } )
                
            }
        },
        addNewDelivery()
        {
            const vm = this;
            let delivery = {
                ...this.delivery_obj,
                'id': uuid.v1(),
                'branch_id' : vm.branches[0].id,
                'service_id' : vm.services[0].id,
                'cities' : vm.service_cities,
            };
            delivery.reciever_city = delivery.cities[0].city;
            delivery.payment_method = vm.payment_methods[0];
            
            this.deliveries.push( delivery );
        },
        updateService( delivery )
        {
            const vm = this;
            const service = vm.services.filter( service => service.id === delivery.service_id )[0];
            if( service.slug === 'same-day' )
            {   
                delivery.cities =  vm.service_cities.filter( city => city.is_same_day === 'active' )
            }
            else  delivery.cities =  vm.service_cities;
            delivery.reciever_city = delivery.cities[0].city;

            vm.updateDeliveryCharges( delivery )       

        },
        getSameDayServiceCharges( reciever_area, sender_area )
        {
            const vm = this;
            vm.charges_per_weight = [];
            vm.additional_weight = [];
            let service_scope = [];
            let additional_weight = [];
            if( reciever_area.city === sender_area.city )
            {
                service_scope = vm.services.filter( service => service.slug === 'same-day' )[0].children.filter( scope => scope.slug === 'within-city' )[0];
            }
            else
            {
                service_scope = vm.services.filter( service => service.slug === 'same-day' )[0].children.filter( scope => scope.slug === 'city-to-city' )[0];
            }

            service_scope.children.map( child => {
                    if( child.service_level === 'weight' )  vm.charges_per_weight.push( { weight: child.slug, charges: child.charges });
            } )

            additional_weight = service_scope.children.filter( child => child.service_level === 'additional_weight_upto_10kg' )[0]
            vm.additional_charges[ 'additional_weight_upto_10kg' ] = additional_weight.charges
            additional_weight = service_scope.children.filter( child => child.service_level === 'additional_weight_upto_20kg' )[0]
            vm.additional_charges[ 'additional_weight_upto_20kg' ] = additional_weight.charges
            additional_weight = service_scope.children.filter( child => child.service_level === 'additional_weight_upto_30kg' )[0]
            vm.additional_charges[ 'additional_weight_upto_30kg' ] = additional_weight.charges

        },
        getOverNightServiceCharges( reciever_area, sender_area )
        {
            const vm = this;
            vm.charges_per_weight = [];
            vm.additional_weight = [];
            let service_scope = [];
            let additional_weight = [];
            if( reciever_area.city === sender_area.city )
            {
                service_scope = vm.services.filter( service => service.slug === 'over-night' )[0].children.filter( scope => scope.slug === 'within-city' )[0];
            }
            else
            {
                const province = vm.service_cities.filter( city => city.city_slug === reciever_area.city_slug )[0].province;
                service_scope = vm.services.filter( service => service.slug === 'over-night' )[0].children.filter( scope => scope.slug === province.toLowerCase() )[0];
            }

            service_scope.children.map( child => {
                    if( child.service_level === 'weight' )  vm.charges_per_weight.push( { weight: child.slug, charges: child.charges });
            } )

            additional_weight = service_scope.children.filter( child => child.service_level === 'additional_weight_upto_10kg' )[0]
            vm.additional_charges[ 'additional_weight_upto_10kg' ] = additional_weight.charges
            additional_weight = service_scope.children.filter( child => child.service_level === 'additional_weight_upto_20kg' )[0]
            vm.additional_charges[ 'additional_weight_upto_20kg' ] = additional_weight.charges
            additional_weight = service_scope.children.filter( child => child.service_level === 'additional_weight_upto_30kg' )[0]
            vm.additional_charges[ 'additional_weight_upto_30kg' ] = additional_weight.charges

        },
        setDeliveryCharges( delivery )
        {
            const vm = this;
            let total_charges = 0; let remaining_weight = 0;
            const actual_weight = vm.charges_per_weight.filter( w => parseFloat(w.weight) === parseFloat( delivery.weight ) )
            if( actual_weight.length !== 0 )
            {
                total_charges = actual_weight[0].charges;
            }
            else
            {
                total_charges = vm.charges_per_weight[ vm.charges_per_weight.length -1 ]['charges'] ;
                remaining_weight = parseFloat( delivery.weight) - parseFloat( vm.charges_per_weight[ vm.charges_per_weight.length - 1 ]['weight']);
                if( parseFloat((remaining_weight - Math.floor(remaining_weight)).toFixed(1)) > 0 ) remaining_weight = parseInt( remaining_weight ) + 1;

                if( remaining_weight <= 10 && remaining_weight > 0 )
                {
                    total_charges += remaining_weight * vm.additional_charges['additional_weight_upto_10kg'];
                }
                else if( remaining_weight > 10 && remaining_weight <=20 )
                {
                    total_charges +=  10 * vm.additional_charges['additional_weight_upto_10kg'];
                    remaining_weight -= 10;
                    total_charges += remaining_weight * vm.additional_charges['additional_weight_upto_20kg'];
                }
                else if( remaining_weight > 20  )
                {
                    total_charges += ( 10 * vm.additional_charges['additional_weight_upto_10kg'] );
                    remaining_weight -= 10;
                    total_charges +=  ( 10 * vm.additional_charges['additional_weight_upto_20kg'] );
                    remaining_weight -= 10;
                    total_charges += remaining_weight  * vm.additional_charges['additional_weight_upto_30kg'];

                }

            }
            
            delivery.delivery_charges = total_charges;
            vm.updateTotalCharges( delivery )

        },
        updateDeliveryCharges( delivery )
        {
            const vm = this;
            const service = vm.services.filter( service => service.id === delivery.service_id )[0];
            const reciever_area = vm.service_cities.filter( city => city.city === delivery.reciever_city )[0]
            const branch = vm.branches.filter( branch => branch.id === delivery.branch_id )[0]
            const sender_area = vm.service_cities.filter( city => city.city === branch.city )[0]

            if( parseFloat(delivery.weight) > 0 )
            {
                if( service.slug == 'same-day' ) 
                {
                    vm.getSameDayServiceCharges( reciever_area, sender_area );
                }
                else if( service.slug == 'over-night' )
                {
                    vm.getOverNightServiceCharges( reciever_area, sender_area );
                }
                vm.setDeliveryCharges( delivery )
            }
            else
            {
                delivery.delivery_charges = 0;
                delivery.total_charges =  parseFloat(delivery.delivery_charges) + parseFloat( delivery.cod_amount ) !== null ? parseFloat( delivery.cod_amount ) : 0;

            }
        },
        updatePaymentMethod( delivery )
        {
            if( delivery.payment_method !== 'COD' )
            {
                delivery.cod_amount = 0; 
            }
            if( parseFloat(delivery.weight) > 0 ) this.updateTotalCharges( delivery )
        },
        updateTotalCharges( delivery )
        {
            if( parseFloat(delivery.weight) > 0)  
            {
                let cod_amount = 0;
                if( delivery.cod_amount !== ''  )  cod_amount =  parseFloat(delivery.cod_amount);
                delivery.total_charges =  parseFloat(delivery.delivery_charges) + cod_amount ;
            }
            else
            {
                delivery.delivery_charges = 0;
                delivery.total_charges =  parseFloat(delivery.delivery_charges) + parseFloat( delivery.cod_amount ) !== null ? parseFloat( delivery.cod_amount ) : 0;
            }
        },
        removeDelivery( delivery )
        {
            const vm = this;
            if( vm.deliveries.length === 1 ) return false;
            vm.deliveries = vm.deliveries.filter( current => current.id !== delivery.$model.id )
        },
        closeAlert()
        {
            this.alert.active = false;
        }
    },
     validations: {
        deliveries: {
        required,
        minLength: minLength(1),
        $each: 
            {
                branch_id: {
                required,
                },
                service_id: {
                required,
                },
                reciever_city: {
                required,
                },
                reciever: {
                required,
                },
                reciever_phone: {
                required,
                },
                weight: {
                required,
                },
                payment_method: {
                required,
                },
                booking_date: {
                required,
                },
                destination: {
                required,
                }
            }
        }
    }
    
}
</script>
<style scoped>
.bottom-buttons-div{
    padding: 20px;
}
</style>