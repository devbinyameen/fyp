<template>
    <div>

        <vue-loader
        v-if="this.loading"
        />

        <div class="row">

            <div class="col-lg-12">
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
                                                v-model="$v.delivery.$model.branch_id" 
                                                parsley-trigger="change"
                                                :class="`form-control`"
                                            >
                                                <option v-for="branch in branches" :key="branch.id"
                                                        :value="branch.id"
                                                >
                                                        {{ branch.name }}
                                                </option>
                                            </select>

                                    
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="service_id"> Service </label>
                                            <select autocomplete="off" 
                                                type="text" 
                                                id="service_id" 
                                                v-model="$v.delivery.$model.service_id" 
                                                parsley-trigger="change"  
                                                :class="`form-control`"
                                                @change="updateService(),updateDeliveryCharges()"
                                            >

                                                <option v-for="service in services" :key="service.id" 
                                                    :value="service.id"
                                                >
                                                    {{ service.name }}
                                                </option>

                                            </select>

                                        
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="payment_method">Payment Method</label>
                                            <select autocomplete="off" 
                                                type="text" 
                                                id="payment_method" 
                                                v-model="$v.delivery.$model.payment_method" 
                                                parsley-trigger="change"  
                                                :class="`form-control`"
                                                @change="updatePaymentMethod()"
                                            >
                                                <option v-for="payment_method in payment_methods" :key="payment_method"
                                                    :value="payment_method"  
                                                >
                                                    {{ payment_method }}
                                                </option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="reciever_city">Reciever City</label>
                                            <select 
                                                autocomplete="off" 
                                                type="text" 
                                                id="reciever_city" 
                                                v-model="$v.delivery.$model.reciever_city" 
                                                parsley-trigger="change"  
                                                :class="`form-control`"
                                                @change="updateDeliveryCharges()"
                                            >
                                                    <option v-for="city in cities" :key="city.service_area_id"
                                                        :value="city.city"  
                                                    >
                                                        {{ city.city }}
                                                    </option>
                                            </select>

                                        
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="weight">Weight</label>
                                            <input 
                                                autocomplete="off" 
                                                type="number" 
                                                id="weight" 
                                                v-model="$v.delivery.weight.$model" 
                                                parsley-trigger="change"  
                                                placeholder="Enter weight"
                                                :class="`form-control ${!$v.delivery.weight.required ? 'is-invalid' : 'is-valid'}`"
                                                @input="updateDeliveryCharges()"
                                            >
                                            <span class="invalid-feedback" role="alert" v-if="!$v.delivery.weight.required">
                                                <strong>Weight is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="reciever_phone">Reciever Phone</label>
                                            <input 
                                                autocomplete="off" 
                                                type="text" 
                                                id="reciever_phone" 
                                                v-model="$v.delivery.reciever_phone.$model" 
                                                parsley-trigger="change"
                                                placeholder="Enter  Reciever Phone Number"
                                                :class="`form-control ${!$v.delivery.reciever_phone.required ? 'is-invalid' : 'is-valid'}`"
                                            >
                                            <span class="invalid-feedback" role="alert" v-if="!$v.delivery.reciever_phone.required">
                                                <strong>Reciever Phone Number is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="reciever">Reciever Name<span class="text-danger">*</span></label>
                                            <input 
                                                autocomplete="off" 
                                                type="text" 
                                                id="reciever" 
                                                v-model="$v.delivery.reciever.$model"  
                                                parsley-trigger="change"  
                                                placeholder="Enter Reciever Name"
                                                :class="`form-control ${!$v.delivery.reciever.required ? 'is-invalid' : 'is-valid'}`"
                                            >

                                            <span class="invalid-feedback" role="alert" v-if="!$v.delivery.reciever.required">
                                                <strong>Reciever Name is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="booking_date">Booking Date</label>
                                            <input 
                                                autocomplete="off" 
                                                type="date" 
                                                id="booking_date" 
                                                v-model="$v.delivery.booking_date.$model" 
                                                parsley-trigger="change"  
                                                placeholder="Enter Booking Date"  
                                                :class="`form-control ${!$v.delivery.booking_date.required ? 'is-invalid' : ''}`"
                                            >

                                            <span class="invalid-feedback" role="alert" v-if="!$v.delivery.booking_date.required">
                                                <strong>Booking Date is required</strong>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="delivery.delivery_charges"> Delivery Charges </label>
                                            <input autocomplete="off" type="number" id="delivery.delivery_charges" 
                                                v-model="$v.delivery.$model.delivery_charges" 
                                                parsley-trigger="change"  
                                                class="form-control"
                                                readonly
                                            >
                                        </div>

                                        <div class="form-group col-md-3"
                                            v-if="delivery.payment_method === 'COD'"
                                        >
                                            <label for="delivery.cod_amount"> COD Amount </label>
                                            <input autocomplete="off" type="number" id="delivery.cod_amount" 
                                                v-model="$v.delivery.$model.cod_amount" 
                                                parsley-trigger="change"  
                                                class="form-control"
                                                @input="updateTotalCharges()"
                                            >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="delivery.total_charges"> Total Charges </label>
                                            <input autocomplete="off" type="number" id="delivery.total_charges" 
                                                v-model="$v.delivery.$model.total_charges" 
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
                                                v-model="$v.delivery.destination.$model" 
                                                parsley-trigger="change"
                                                placeholder="Enter company destination" 
                                                :class="`form-control ${!$v.delivery.destination.required ? 'is-invalid' : 'is-valid'}`"
                                            >
                                            </textarea>
                                            <span class="invalid-feedback" role="alert" v-if="!$v.delivery.destination.required">
                                                <strong>Destination is required</strong>
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

        <div class="row mt-5 bottom-buttons-div">
            <div class="col-md-4 offset-2">
                <a 
                href="/admin/deliveries" 
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
                     Update Delieveries 
                </button>
            </div>

        </div>

    </div>

</template>

<script>
import { required } from 'vuelidate/lib/validators'

export default {
    props: ['service_cities', 'services', 'branches', 'user', 'delivery_prop'],
    data: () => ({
        loading: false,
        alert: {
            type: "success",
            message: "",
            active: false,
        },
        delivery: {},
        cities: {},
        payment_methods: [
                'COD',
                'General',
            ],
        charges_per_weight: [],
        additional_charges: [],
    }),
    created(){
        this.delivery = this.delivery_prop
        this.updateService()
    },
    methods:{
        submitDeliveries()
        {   const vm = this;
            vm.$v.$touch()
            if ( !vm.$v.$invalid) {
                vm.loading = true;

                const delivery = {
                    branch_id: vm.delivery.branch_id,
                    service_id: vm.delivery.service_id,
                    payment_method: vm.delivery.payment_method,
                    weight: vm.delivery.weight,
                    reciever: vm.delivery.reciever,
                    reciever_city: vm.delivery.reciever_city,
                    reciever_phone: vm.delivery.reciever_phone,
                    booking_date: vm.delivery.booking_date,
                    cod_amount: vm.delivery.cod_amount,
                    destination: vm.delivery.destination
                };

                const url = `${process.env.MIX_BASE_URL}/${ vm.user.roles[0].type != 'user' ? 'admin/': 'client/' }deliveries/${vm.delivery.id}`;
                axios.put(url,  delivery)
                .then( ({ data }) => {
                    vm.loading = false;
                    vm.alert.active =true;
                    vm.alert.type = "success";
                    vm.alert.message = data.message ;
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
        updateService()
        {
            const vm = this;
            const service = vm.services.filter( service => service.id === vm.delivery.service_id )[0];
            if( service.slug === 'same-day' )
            {   
                vm.cities = vm.service_cities.filter( city => city.is_same_day === 'active' )
            }
            else  vm.cities =  vm.service_cities;
            vm.delivery.reciever_city = vm.cities[0].city;        
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
        setDeliveryCharges( )
        {
            const vm = this;
            let total_charges = 0; let remaining_weight = 0;
            const actual_weight = vm.charges_per_weight.filter( w => parseFloat(w.weight) === parseFloat( vm.delivery.weight ) )
            if( actual_weight.length !== 0 )
            {
                total_charges = actual_weight[0].charges;
            }
            else
            {
                total_charges = vm.charges_per_weight[ vm.charges_per_weight.length -1 ]['charges'] ;
                remaining_weight = parseFloat( vm.delivery.weight) - parseFloat( vm.charges_per_weight[ vm.charges_per_weight.length - 1 ]['weight']);
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
            
            vm.delivery.delivery_charges = total_charges;
            vm.updateTotalCharges()

        },
        updateDeliveryCharges()
        {
            const vm = this;
            const service = vm.services.filter( service => service.id === vm.delivery.service_id )[0];
            const reciever_area = vm.service_cities.filter( city => city.city === vm.delivery.reciever_city )[0]
            const branch = vm.branches.filter( branch => branch.id === vm.delivery.branch_id )[0]
            const sender_area = vm.service_cities.filter( city => city.city === branch.city )[0]
            if( parseFloat(vm.delivery.weight) > 0 )
            {
                if( service.slug == 'same-day' ) 
                {
                    vm.getSameDayServiceCharges( reciever_area, sender_area );
                }
                else if( service.slug == 'over-night' )
                {
                    vm.getOverNightServiceCharges( reciever_area, sender_area );
                }
                vm.setDeliveryCharges()
            }
            else
            {
                vm.delivery.delivery_charges = 0;
                vm.delivery.total_charges =  parseFloat(vm.delivery.delivery_charges) + parseFloat( vm.delivery.cod_amount ) !== null ? parseFloat( vm.delivery.cod_amount ) : 0;

            }
        },
        updatePaymentMethod()
        {
            const vm = this;
            if( vm.delivery.payment_method !== 'COD' )
            {
                vm.delivery.cod_amount = 0; 
            }
            if( parseFloat(vm.delivery.weight) > 0 ) vm.updateTotalCharges(  )
        },
        updateTotalCharges()
        {
            const vm = this;
            if( parseFloat(vm.delivery.weight) > 0)  
            {
                let cod_amount = 0;
                if( vm.delivery.cod_amount !== ''  )  cod_amount =  parseFloat(vm.delivery.cod_amount);
                vm.delivery.total_charges =  parseFloat(vm.delivery.delivery_charges) + cod_amount ;
            }
            else
            {
                vm.delivery.delivery_charges = 0;
                vm.delivery.total_charges =  parseFloat(vm.delivery.delivery_charges) + parseFloat( vm.delivery.cod_amount ) !== null ? parseFloat( vm.delivery.cod_amount ) : 0;
            }
        },
        closeAlert()
        {
            this.alert.active = false;
        }
    },
     validations: {
        delivery: {
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
</script>
<style scoped>
.bottom-buttons-div{
    padding: 20px;
}
</style>