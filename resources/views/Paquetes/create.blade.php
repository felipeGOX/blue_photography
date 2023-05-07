    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Proveedore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('paquetes.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            <form>
                                <fieldset disabled>
                                    <legend>Crea un nuevo paquete</legend>
                                    <div class="mb-3">
                                        <label for="" class="form-label">nombre</label>
                                        <input type="input" placeholder="nombre">
                                    </div>
                                    
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </fieldset>
                            </form>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>