<?= $this->extend('layout') ?>
<?= $this->section('content') ?>






<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cargar documentacion</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Documentacion</li>
                <li class="breadcrumb-item active">Cargar documentacion</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
            
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agregar documentacion</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" id="insertarDocumentacion"
                                action="<?= base_url('/insertarDocumentacion') ?>" method="POST">
                                <div class="col-12">
                                    <label for="nombre" class="form-label">Nombre de la
                                        tarjeta/identificacion</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                                <div class="col-12">
                                    <label for="numero" class="form-label">Numero de tarjeta/dni/ID</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_emision" class="form-label">Fecha emision</label>
                                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                                </div>
                                <div class="col-12">
                                    <label for="fecha_vencimiento" class="form-label">Fecha vencimiento</label>
                                    <input type="date" class="form-control" id="fecha_vencimiento"
                                        name="fecha_vencimiento">
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <button type="reset" class="btn btn-secondary">Reiniciar campos</button>
                                </div>
                            </form>
                            <!-- Vertical Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
         
    </section>

</main><!-- End #main -->

<?= $this->endSection() ?>