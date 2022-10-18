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
                                        <label for="service"> Service  <span class="text-danger">*</span></label>
                                        <input autocomplete="off" type="text" v-model="service" id="service"  parsley-trigger="change"  placeholder="Enter Service Name"
                                               class="form-control">

                                            <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                            </span>
                                    
                                    </div>

                                    
                                    <div class="form-group col-md-3">
                                        <label for="service_status"> Status </label>
                                        <select autocomplete="off" type="text" id="service_status"  v-model="status" parsley-trigger="change"  class="form-control">


                                            <option value="active"> Active </option>
                                            <option value="in-active"> In-Active </option>

                                        </select>


                                            <span class="invalid-feedback" role="alert">
                                            <strong></strong>
                                             </span>
                                   
                                    </div> 


                                </div>  


                                    <div class="row">
                                        <h5 class="col-md-9 mb-3"> Service Scopes </h5>
                                        <div class="col-md-3 mb-3">
                                            <button class="btn btn-btn btn-success" @click="addScope()">
                                                Add Scope
                                            </button>
                                        </div>
                                    </div>
                                    

                                    <div v-for="scope in scopes" :key="scope.id">

                                        <div class="row">

                                                <div class="form-group col-md-3">
                                                <label> Title  <span class="text-danger">*</span></label>
                                                <input autocomplete="off" type="text" v-model="scope.title" parsley-trigger="change" required placeholder="Enter Service Scope Name"
                                                class="form-control">

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>

                                                </div>

                                            
                                                <div class="form-group col-md-3">
                                                <label> Status </label>
                                                <select autocomplete="off" type="text" v-model="scope.status" parsley-trigger="change"  class="form-control">


                                                <option value="active"> Active </option>
                                                <option value="in-active"> In-Active </option>

                                                </select>


                                                <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                                </span>

                                                </div>

                                                <div class="col-md-3">
                                                    <button class="btn btn-sm btn-danger" @click="removeScope(scope.id)">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-9 pl-5">
                                                <h5> Weights </h5>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                            <button class="btn btn-btn btn-success" @click="addWeight( scope.id )">
                                                Add Weight
                                            </button>
                                        </div>
                                        </div>

                                        <div class="row" v-for="weight in scope.weights" :key="weight.id" >
                                          
                                            <div class="form-group col-md-3 ml-5">
                                                <label> Weight  <span class="text-danger">*</span></label>

                                                 <div class="input-group mb-3">
                                                   <input autocomplete="off" type="number" v-model="weight.weight" parsley-trigger="change" required placeholder="Enter Weight"
                                                    class="form-control">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                 </div>

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                           

                                            <div class="form-group col-md-3 ml-5">
                                                <label> Charges  <span class="text-danger">*</span></label>
                                                <input autocomplete="off" type="number" v-model="weight.charges" parsley-trigger="charges" required placeholder="Enter Charges"
                                                class="form-control">

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                            <div class="col-md-3">
                                                <button class="btn btn-sm btn-danger" @click="removeWeight( scope.id ,weight.id)">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6> Additional Weight </h6>
                                            </div>

                                        </div>

                                        <div class="row">

                                             <div class="form-group col-md-3 ml-5">
                                                <label> Weight Limit ( 10 kg )  <span class="text-danger">*</span></label>

                                                 <div class="input-group mb-3">
                                                   <input autocomplete="off" type="number" v-model="scope.additional_weight_upto_10kg.weight_limit" parsley-trigger="change" required placeholder="Enter Weight Limit"
                                                    class="form-control">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                 </div>

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                            <div class="form-group col-md-3 ml-5">
                                                <label> Charges  <span class="text-danger">*</span></label>
                                                <input autocomplete="off" type="number" v-model="scope.additional_weight_upto_10kg.charges_per_kg" parsley-trigger="charges" required placeholder="Enter Charges"
                                                class="form-control">

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="form-group col-md-3 ml-5">
                                                <label> Weight Limit ( 20 kg )  <span class="text-danger">*</span></label>

                                                    <div class="input-group mb-3">
                                                    <input autocomplete="off" type="number" v-model="scope.additional_weight_upto_20kg.weight_limit" parsley-trigger="change" required placeholder="Enter Weight Limit"
                                                    class="form-control">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                    </div>

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                            <div class="form-group col-md-3 ml-5">
                                                <label> Charges  <span class="text-danger">*</span></label>
                                                <input autocomplete="off" type="number" v-model="scope.additional_weight_upto_20kg.charges_per_kg" parsley-trigger="charges" required placeholder="Enter Charges"
                                                class="form-control">

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-3 ml-5">
                                                <label> Weight Limit ( 30 kg )  <span class="text-danger">*</span></label>

                                                 <div class="input-group mb-3">
                                                   <input autocomplete="off" type="number" v-model="scope.additional_weight_upto_30kg.weight_limit" parsley-trigger="change" required placeholder="Enter Weight Limit"
                                                    class="form-control">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg</span>
                                                    </div>
                                                 </div>

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                            <div class="form-group col-md-3 ml-5">
                                                <label> Charges  <span class="text-danger">*</span></label>
                                                <input autocomplete="off" type="number" v-model="scope.additional_weight_upto_30kg.charges_per_kg" parsley-trigger="charges" required placeholder="Enter Charges"
                                                class="form-control">

                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                        </div>

                                    </div>
                                                          
                                <div class="row mt-5">
                                    <div class="form-group btns-div col-12">
                                         <a href="/admin/services" class="btn btn-md btn-light mr-5"> Cancel </a>
                                        <button type="button" class="btn btn-md btn-primary " @click="submitForm()"> Save </button>
                                    </div>
                                </div>

                        </div>
                    </div>


                </div>

            </div>
            <!-- end card -->

        </div>
    </div>

    </div>
</template>

<script>
import { uuid } from 'vue-uuid' // Import uuid  

export default {
    data:() => ({
        loading: false,
        alert: {
            type: "success",
            message: "",
            active: false,
        },
        service: "",
        status: "active",
        scopes: [],
        scope_obj: {
            title: "",
            status: "active",
            weights: [],
        },
        weight_obj: {
            weight: "",
            charges: "",
        },
        additional_weight_upto_10kg_obj: {
            weight_limit: "",
            charges_per_kg: "",
        },
        additional_weight_upto_20kg_obj: {
            weight_limit: "",
            charges_per_kg: "",
        },
        additional_weight_upto_30kg_obj: {
            weight_limit: "",
            charges_per_kg: "",
        },
    }),
    created()
    {
        this.addScope();
    },
    methods:{
        removeScope(id)
        {
            this.scopes = this.scopes.filter( scope => scope.id !== id )
        },
        addScope()
        {
            let scope = { 
                ...this.scope_obj,
                'id': uuid.v1(), 
                weights: [ { ...this.weight_obj, id: uuid.v1() } ],
                additional_weight_upto_10kg : { ...this.additional_weight_upto_10kg_obj, id: uuid.v1() },
                additional_weight_upto_20kg : { ...this.additional_weight_upto_20kg_obj, id: uuid.v1() },
                additional_weight_upto_30kg : { ...this.additional_weight_upto_30kg_obj, id: uuid.v1() },
                };
            this.scopes.push( scope );
        },
        removeWeight(scope_id, weight_id)
        {
            this.scopes.map( scope => {
                if( scope.id === scope_id )
                {
                    scope.weights = scope.weights.filter( weight => weight.id !== weight_id )
                }
            } )
        },
        addWeight( id )
        {
            this.scopes.map( scope => {
                if( scope.id === id )
                {
                    scope.weights = [ ...scope.weights, { ...this.weight_obj, id: uuid.v1() } ]
                }
            } )
        },
        submitForm()
        {
            const vm = this;
            vm.loading = true;
            const data = {
                service: this.service,
                status: this.status,
                scopes: this.scopes,
            }
            vm.resetForm()
            axios.post(`${process.env.MIX_BASE_URL}/admin/services`, data)
            .then( ({ data }) => {
                    vm.loading = false;
                    this.alert.active =true;
                    this.alert.type = "success";
                    this.alert.message = data.message ;
                    // vm.resetForm()
            })
            .catch( error => {
                vm.loading = false;
                    this.alert.active =true;
                    this.alert.type = "danger";
                    this.alert.active =error;
                console.log(`error: ${error}`)
            } );
        },
        resetForm()
        {
            this.service = "";
            this.status = "active";
            this.scopes = [];
            this.addScope();
        },
        closeAlert()
        {
            this.alert.active = false;
        }
    }
}
</script>
