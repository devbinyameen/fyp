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
                            booking component
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
    name: "booking",
    data:() => ({
        loading: false,
        alert: {
            type: "success",
            message: "",
            active: false,
        },


    }),
    created()
    {
    },
    methods:{
        closeAlert()
        {
            this.alert.active = false;
        }
    }
}
</script>
