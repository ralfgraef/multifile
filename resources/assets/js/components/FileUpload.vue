<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <legend>Form Title</legend>
                        <div class="form-group">
                            <label for="">Upload Files</label>
                            <input type="file" class="form-control" @change="fieldChange">
                        </div>
                        <button class="btn btn-primary" @click="uploadFile">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                attachment: null,
                form: new FormData()
            }
        },
        methods:{
            fieldChange(e){
                let selectedField = e.target.files[0];
                this.attachment = selectedField;
            },
            uploadFile(){
                this.form.append('pic', this.attachment);
                
                const config = { headers:{'Content-Type': 'multipart/form-data'}};
                
                axios.post('/upload', this.form, config)
                .then(response=>{
                    //success
                })
                .catch(response=>{
                    //error
                });

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
